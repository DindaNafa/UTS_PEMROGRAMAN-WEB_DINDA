<?php
// Koneksi ke database dengan require_once
require_once __DIR__ . "/connection.php";

// require_once latihan.php untuk memanggil function hitungNilai()
if (file_exists(__DIR__ . "/latihan.php")) {
    require_once __DIR__ . "/latihan.php";
} else {
    require_once __DIR__ . "/../latihan.php";
}

// Periksa apakah request dikirim melalui method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = isset($_POST['nim']) ? mysqli_real_escape_string($conn, trim($_POST['nim'])) : '';
    $namamhsw = isset($_POST['namamhsw']) ? mysqli_real_escape_string($conn, trim($_POST['namamhsw'])) : '';
    $nilaiakhir = isset($_POST['nilaiakhir']) ? floatval($_POST['nilaiakhir']) : 0;
    $redirect = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : 'viewdata.php';

    if (!empty($nim)) {
        // Hitung ulang nilai huruf dan predikat otomatis dari function hitungNilai()
        $hasil = hitungNilai($nilaiakhir);
        $nilaihuruf = $hasil['nilaihuruf'];
        $predikat = $hasil['predikat'];

        // Tanggal modified otomatis saat ini
        $modified_date = date('Y-m-d H:i:s');

        // Cek apakah ada foto baru yang diunggah
        $foto_update_sql = "";
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
                    $new_file_path = "uploads/" . $new_filename;
                    $foto_update_sql = ", file_path = '" . mysqli_real_escape_string($conn, $new_file_path) . "'";
                }
            }
        }

        $sql = "UPDATE " . DB_TABLE_NAME . " SET 
                namalengkap = '$namamhsw', 
                nilaiakhir = '$nilaiakhir', 
                nilaihuruf = '$nilaihuruf', 
                predikat = '$predikat', 
                modified_date = '$modified_date'
                $foto_update_sql 
                WHERE NIM = '$nim'";

        if ($conn->query($sql) === TRUE) {
            header("Location: " . $redirect);
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Error: NIM tidak boleh kosong.";
    }
} else {
    header("Location: viewdata.php");
    exit();
}
?>