<?php
require_once "../koneksi_23312108.php";
require_once "controller_keahlian.php";

$controller = new KeahlianController($koneksi);


// Hapus data
if (isset($_GET['hapus'])) {
    $controller->destroy($_GET['hapus']);
    echo "<script>alert('Keahlian berhasil dihapus'); window.location='lat10_keahlian_23312108.php';</script>";
    exit;
}

// Cari data
$keyword = $_GET['keyword'] ?? null;
$dataKeahlian = $controller->index($keyword);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Keahlian</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-gray-800 text-white py-4 text-center text-xl font-semibold">
  Kelola Keahlian
</header>

<div class="flex min-h-screen">

  <aside class="w-64 bg-gray-900 text-white p-6">
    <nav class="space-y-3">
  <a href="../lat10_profil_23312108.html"
     class="block hover:bg-gray-700 px-3 py-2 rounded">🏠 Profil</a>

  <a href="../proyek/lat10_proyek_23312108.php"
     class="block hover:bg-gray-700 px-3 py-2 rounded">📁 Proyek</a>

  <a href="lat10_keahlian_23312108.php"
     class="block bg-gray-700 px-3 py-2 rounded">💼 Keahlian</a>
</nav>
  </aside>

  <main class="flex-1 p-8">
    <div class="bg-white p-6 rounded-xl shadow max-w-5xl mx-auto">

      <div class="flex justify-between mb-4">
        <form method="get" class="flex">
          <input type="text" name="keyword" placeholder="Cari keahlian..."
            class="border px-3 py-2 rounded-l">
          <button class="bg-gray-800 text-white px-4 rounded-r">Cari</button>
        </form>

        <a href="tambah_keahlian_lat10_23312108.php"
          class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900">
          + Tambah Keahlian
        </a>
      </div>

      <table class="w-full border">
        <thead class="bg-gray-700 text-white">
          <tr>
            <th class="p-2">Nama</th>
            <th class="p-2">Tingkat</th>
            <th class="p-2">Deskripsi</th>
            <th class="p-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($dataKeahlian)) : ?>
            <tr>
              <td colspan="4" class="text-center py-4">Data belum tersedia</td>
            </tr>
          <?php else : ?>
            <?php foreach ($dataKeahlian as $row) : ?>
              <tr class="border-t text-center">
                <td><?= htmlspecialchars($row['nama_keahlian']) ?></td>
                <td><?= htmlspecialchars($row['tingkat_keahlian']) ?></td>
                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                <td>
                  <a href="ubah_keahlian_lat10_23312108.php?id=<?= $row['id_keahlian'] ?>"
                     class="text-blue-600">Ubah</a> |
                  <a href="?hapus=<?= $row['id_keahlian'] ?>"
                     onclick="return confirm('Hapus keahlian ini?')"
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