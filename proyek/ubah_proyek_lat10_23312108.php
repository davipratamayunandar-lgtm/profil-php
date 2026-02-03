<?php
require_once "../koneksi_23312108.php";
require_once "controller_proyek.php";

$controller = new ProyekController($koneksi);

// Validasi ID
if (!isset($_GET['id'])) {
    echo "<script>
        alert('ID proyek tidak ditemukan!');
        window.location='lat10_proyek_23312108.php';
    </script>";
    exit;
}

$id = (int)$_GET['id'];
$data = $controller->edit($id);

if (!$data) {
    echo "<script>
        alert('Data proyek tidak ditemukan!');
        window.location='lat10_proyek_23312108.php';
    </script>";
    exit;
}

// Proses update
if (isset($_POST['ubah'])) {
    $_POST['gambar_lama'] = $data['gambar'];
    $controller->update($id, $_POST, $_FILES);

    echo "<script>
        alert('Data proyek berhasil diubah!');
        window.location='lat10_proyek_23312108.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Proyek</title>
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
         class="block hover:bg-gray-700 px-3 py-2 rounded">🏠 Profil</a>

      <a href="lat10_proyek_23312108.php"
         class="block bg-gray-700 px-3 py-2 rounded">📁 Proyek</a>

      <a href="../keahlian/lat10_keahlian_23312108.php"
         class="block hover:bg-gray-700 px-3 py-2 rounded">💼 Keahlian</a>
    </nav>
  </aside>

  <!-- CONTENT -->
  <main class="flex-1 p-8">
    <div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

      <h2 class="text-xl font-semibold mb-4">Ubah Proyek</h2>

      <form method="POST" enctype="multipart/form-data" class="space-y-4">

        <div>
          <label class="block mb-1 font-medium">Nama Proyek</label>
          <input type="text" name="nama_proyek"
                 value="<?= htmlspecialchars($data['nama_proyek']) ?>"
                 class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
          <label class="block mb-1 font-medium">Teknologi</label>
          <input type="text" name="teknologi"
                 value="<?= htmlspecialchars($data['teknologi']) ?>"
                 class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
          <label class="block mb-1 font-medium">Tahun</label>
          <input type="number" name="tahun"
                 value="<?= htmlspecialchars($data['tahun_proyek']) ?>"
                 class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
          <label class="block mb-1 font-medium">Deskripsi</label>
          <textarea name="deskripsi" rows="4"
            class="w-full border px-3 py-2 rounded" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>

        <div>
          <label class="block mb-1 font-medium">Gambar (opsional)</label>
          <input type="file" name="gambar"
                 class="w-full border px-3 py-2 rounded">
          <p class="text-sm text-gray-500 mt-1">
            Kosongkan jika tidak ingin mengganti gambar
          </p>
        </div>

        <div class="flex justify-between">
          <a href="lat10_proyek_23312108.php"
             class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
             Batal
          </a>

          <button type="submit" name="ubah"
            class="px-4 py-2 rounded bg-gray-800 text-white hover:bg-gray-900">
            Simpan Perubahan
          </button>
        </div>

      </form>

    </div>
  </main>
</div>

<footer class="bg-gray-800 text-white text-center py-3">
  © 2025 Davi Pratama Yunandar
</footer>

</body>
</html>
