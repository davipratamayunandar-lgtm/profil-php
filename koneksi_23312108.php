<?php
// ==========================================================
// Koneksi Database untuk Proyek Profil Mahasiswa
// ==========================================================

// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dbprofil_23312108";

// Aktifkan laporan error MySQLi untuk debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi
    $koneksi = new mysqli($host, $user, $pass, $db);

    // Set charset agar mendukung UTF-8
    $koneksi->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    // Tangani error koneksi
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
