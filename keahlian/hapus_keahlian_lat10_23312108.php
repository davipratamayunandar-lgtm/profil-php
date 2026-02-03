<?php
require_once "../koneksi_23312108.php";
require_once "controller_keahlian.php";

$controller = new KeahlianController($koneksi);

if (!isset($_GET['id'])) {
    echo "<script>
        alert('ID tidak ditemukan!');
        window.location='lat10_keahlian_23312108.php';
    </script>";
    exit;
}

$id = (int) $_GET['id'];

if ($controller->destroy($id)) {
    echo "<script>
        alert('Data berhasil dihapus!');
        window.location='lat10_keahlian_23312108.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data!');
        window.location='lat10_keahlian_23312108.php';
    </script>";
}
