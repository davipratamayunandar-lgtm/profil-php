<?php
require_once "../koneksi_23312108.php";
require_once "controller_proyek.php";

if (!isset($_GET['id'])) {
    header("Location: lat10_proyek_23312108.php");
    exit;
}

$controller = new ProyekController($koneksi);
$id = $_GET['id'];

$result = $controller->destroy($id);

if ($result) {
    echo "<script>
        alert('Data proyek berhasil dihapus!');
        window.location='lat10_proyek_23312108.php';
    </script>";
} else {
    echo "<script>alert('Gagal menghapus data!');</script>";
}
