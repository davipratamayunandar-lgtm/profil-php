<?php
require_once "../koneksi_23312108.php";
require_once "controller_proyek.php";

$controller = new ProyekController($koneksi);

// Hapus data
if (isset($_GET['hapus'])) {
    $controller->destroy($_GET['hapus']);
    echo "<script>alert('Proyek berhasil dihapus'); window.location='lat10_proyek_23312108.php';</script>";
    exit;
}

$dataProyek = $controller->index();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Proyek</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-gray-800 text-white py-4 text-center text-xl font-semibold">
  Kelola Proyek
</header>

<div class="flex min-h-screen">

  <!-- SIDEBAR -->
  <aside class="w-64 bg-gray-900 text-white p-6">
    <nav class="space-y-3">
      <a href="../lat10_profil_23312108.html"
         class="block hover:bg-gray-700 px-3 py-2 rounded">
         🏠 Profil
      </a>

      <a href="lat10_proyek_23312108.php"
         class="block bg-gray-700 px-3 py-2 rounded">
         📁 Proyek
      </a>

      <a href="../keahlian/lat10_keahlian_23312108.php"
         class="block hover:bg-gray-700 px-3 py-2 rounded">
         💼 Keahlian
      </a>
    </nav>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="flex-1 p-8">
    <div class="bg-white p-6 rounded-xl shadow max-w-5xl mx-auto">

      <div class="flex justify-end mb-4">
        <a href="tambah_proyek_lat10_23312108.php"
           class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900">
          + Tambah Proyek
        </a>
      </div>

      <table class="w-full border">
        <thead class="bg-gray-700 text-white">
          <tr>
            <th class="p-2">No</th>
            <th class="p-2">Nama Proyek</th>
            <th class="p-2">Teknologi</th>
            <th class="p-2">Tahun</th>
            <th class="p-2">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php if (empty($dataProyek)) : ?>
            <tr>
              <td colspan="5" class="text-center py-4">Data belum tersedia</td>
            </tr>
          <?php else : ?>
            <?php $no = 1; foreach ($dataProyek as $row) : ?>
              <tr class="border-t text-center">
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_proyek']) ?></td>
                <td><?= htmlspecialchars($row['teknologi']) ?></td>
                <td><?= htmlspecialchars($row['tahun_proyek']) ?></td>
                <td>
                  <a href="ubah_proyek_lat10_23312108.php?id=<?= $row['id_proyek'] ?>"
                     class="text-blue-600">Ubah</a> |
                  <a href="?hapus=<?= $row['id_proyek'] ?>"
                     onclick="return confirm('Hapus proyek ini?')"
                     class="text-red-600">Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>

    </div>
  </main>
</div>

<footer class="bg-gray-800 text-white text-center py-3">
  © 2025 Davi Pratama Yunandar
</footer>

</body>
</html>