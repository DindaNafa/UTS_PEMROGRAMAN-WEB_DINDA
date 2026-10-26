<?php
// Hubungkan ke database
require_once 'connection.php';

// Jika form disubmit (proses update data)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'] ?? '';
    $namalengkap = $_POST['namalengkap'] ?? '';
    $nilaiakhir = $_POST['nilaiakhir'] ?? '';

    if (empty(trim($nim)) || empty(trim($namalengkap)) || $nilaiakhir === '') {
        echo "Error: Semua kolom wajib diisi!";
        exit;
    }

    // Hitung ulang nilai huruf dan predikat berdasarkan nilai akhir baru
    $nilaiakhir_float = floatval($nilaiakhir);
    $nilaihuruf = '';
    $predikat = '';

    if ($nilaiakhir_float >= 3.51) {
        $nilaihuruf = 'A';
        $predikat = 'Dengan Pujian';
    } elseif ($nilaiakhir_float >= 2.76) {
        $nilaihuruf = 'B';
        $predikat = 'Sangat Memuaskan';
    } elseif ($nilaiakhir_float >= 2.00) {
        $nilaihuruf = 'C';
        $predikat = 'Memuaskan';
    } elseif ($nilaiakhir_float >= 1.00) {
        $nilaihuruf = 'D';
        $predikat = 'Cukup';
    } else {
        $nilaihuruf = 'E';
        $predikat = 'Kurang';
    }

    // Query update menggunakan Prepared Statement
    $sql = "UPDATE nilaimhsw SET namalengkap = ?, nilaiakhir = ?, nilaihuruf = ?, predikat = ? WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sdsss", $namalengkap, $nilaiakhir_float, $nilaihuruf, $predikat, $nim);
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            // Kirim parameter nim dan nama melalui URL
            header("Location: readnilaimhsw.php?status=sukses_edit&nim=" . urlencode($nim) . "&nama=" . urlencode($namalengkap));
            exit;
        } else {
            echo "Error saat memperbarui data: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
    exit;
}

// Jika diakses via URL dengan parameter NIM (menampilkan form edit)
$nim = $_GET['nim'] ?? '';
if (empty($nim)) {
    header("Location: readnilaimhsw.php");
    exit;
}

$sql = "SELECT * FROM nilaimhsw WHERE nim = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nim);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "Data mahasiswa tidak ditemukan!";
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; color: #333; }
        .container { max-width: 400px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[readonly] { background-color: #e9e9e9; cursor: not-allowed; }
        input[type="submit"] { background-color: #27ae60; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        input[type="submit"]:hover { background-color: #219653; }
        .back-link { display: inline-block; margin-top: 10px; color: #3498db; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Nilai Mahasiswa</h2>
    <form method="post" action="editnilaimhsw.php">
        <label for="nim">NIM (Primary Key - Tidak dapat diubah):</label>
        <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($row['nim']); ?>" readonly>
        
        <label for="namalengkap">Nama Lengkap:</label>
        <input type="text" id="namalengkap" name="namalengkap" value="<?php echo htmlspecialchars($row['namalengkap']); ?>" maxlength="50" required>
        
        <label for="nilaiakhir">Nilai Akhir (1 - 100):</label>
        <input type="number" id="nilaiakhir" name="nilaiakhir" value="<?php echo htmlspecialchars($row['nilaiakhir']); ?>" step="0.01" min="1" max="100" required>
        
        <input type="submit" value="Perbarui Data">
    </form>
    <a href="readnilaimhsw.php" class="back-link">&larr; Batal / Kembali</a>
</div>

</body>
</html>
<?php $conn->close(); ?>