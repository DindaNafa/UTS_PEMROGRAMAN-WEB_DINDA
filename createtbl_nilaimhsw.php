<?php
// Hubungkan ke server database melalui file connection.php
require_once 'connection.php';

// Query SQL untuk membuat tabel nilaimhsw dengan kolom-kolom yang sesuai
$sql = "CREATE TABLE IF NOT EXISTS nilaimhsw (
    nim CHAR(10) PRIMARY KEY,
    namalengkap VARCHAR(50) NOT NULL,
    nilaiakhir DECIMAL(5,2) NOT NULL,
    nilaihuruf CHAR(1),
    predikat VARCHAR(20),
    modified_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    file_path` varchar(255) DEFAULT NULL, 
    PRIMARY KEY (`NIM`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabel 'nilaimhsw' berhasil dibuat!";
} else {
    echo "Error saat membuat tabel: " . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>