<?php
// Koneksi database
require_once __DIR__ . "/connection.php";

// Panggil latihan.php untuk fungsi hitungNilai()
if (file_exists(__DIR__ . "/latihan.php")) {
    require_once __DIR__ . "/latihan.php";
} else {
    require_once __DIR__ . "/../latihan.php";
}

// Ambil data dari metode POST dengan aman
$nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';
$namamhsw = isset($_POST['namamhsw']) ? trim($_POST['namamhsw']) : (isset($_POST['namalengkap']) ? trim($_POST['namalengkap']) : '');
$nilaiakhir = isset($_POST['nilaiakhir']) ? floatval($_POST['nilaiakhir']) : 0;
$redirect = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : 'viewdata.php';

// Validasi sisi server: pastikan field utama tidak kosong
if (empty($nim) || empty($namamhsw) || $_POST['nilaiakhir'] === '') {
    echo "<b>Error:</b> Semua kolom wajib diisi!<br><br>";
    echo "<a href='" . htmlspecialchars($redirect) . "'>Kembali</a>";
    exit;
}

// Hitung nilai huruf dan predikat dari fungsi di latihan.php
$hasil = hitungNilai($nilaiakhir);
$nilaihuruf = $hasil['nilaihuruf'];
$predikat = $hasil['predikat'];

// Proses upload foto jika ada
$file_path = NULL;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $target_dir = __DIR__ . "/uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $filename = basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (in_array($imageFileType, $allowed_types)) {
        $clean_name = preg_replace("/[^a-zA-Z0-9\._-]/", "", $filename);
        $new_filename = time() . "_" . $clean_name;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $file_path = "uploads/" . $new_filename;
        }
    }
}

// Sanitasi string untuk query
$safe_nim = mysqli_real_escape_string($conn, $nim);
$safe_nama = mysqli_real_escape_string($conn, $namamhsw);

// SESUAIKAN DENGAN NAMA KOLOM DI DATABASE: nim, namalengkap, nilaiakhir, nilaihuruf, predikat
$column_sql = "nim, namalengkap, nilaiakhir, nilaihuruf, predikat";
$value_sql = "'$safe_nim', '$safe_nama', '$nilaiakhir', '$nilaihuruf', '$predikat'";

// Tambahkan file_path jika diunggah dan kolomnya ada di tabel
if ($file_path !== NULL && mysqli_num_rows(mysqli_query($conn, "SHOW COLUMNS FROM " . DB_TABLE_NAME . " LIKE 'file_path'")) > 0) {
    $column_sql .= ", file_path";
    $value_sql .= ", '" . mysqli_real_escape_string($conn, $file_path) . "'";
}

$sql = "INSERT INTO " . DB_TABLE_NAME . " (" . $column_sql . ") VALUES (" . $value_sql . ")";

// Eksekusi query dengan proteksi penanganan error duplikasi NIM (Kode 1062)
try {
    if (mysqli_query($conn, $sql)) {
        header('Location: ' . $redirect);
        exit();
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "<b>Error:</b> NIM <b>" . htmlspecialchars($nim) . "</b> sudah terdaftar di database!<br>";
        echo "Silakan gunakan NIM yang berbeda.<br><br>";
        echo "<a href='" . htmlspecialchars($redirect) . "'>Kembali</a>";
    } else {
        echo "Error saat menyimpan data: " . $e->getMessage() . "<br>";
        echo "<a href='" . htmlspecialchars($redirect) . "'>Kembali</a>";
    }
}

$conn->close();
?>