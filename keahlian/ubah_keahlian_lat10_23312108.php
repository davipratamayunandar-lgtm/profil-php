<?php
require_once "../koneksi_23312108.php";
require_once "controller_keahlian.php";

$controller = new KeahlianController($koneksi);

if (!isset($_GET['id'])) {
    echo "<script>
        alert('ID keahlian tidak ditemukan!');
        window.location='lat10_keahlian_23312108.php';
    </script>";
    exit;
}

$id = (int)$_GET['id'];
$data = $controller->edit($id);

if (!$data) {
    echo "<script>
        alert('Data keahlian tidak ditemukan!');
        window.location='lat10_keahlian_23312108.php';
    </script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST['nama_keahlian']);
    $tingkat = trim($_POST['tingkat_keahlian']);
    $deskripsi = trim($_POST['deskripsi']);

    if ($nama === "" || $tingkat === "" || $deskripsi === "") {
        echo "<script>alert('Semua field wajib diisi!');</script>";
    } else {
        $controller->update($id, [
            'nama_keahlian' => $nama,
            'deskripsi'     => $deskripsi,
            'gambar'        => $data['gambar']
        ]);

        echo "<script>
            alert('Data keahlian berhasil diperbarui!');
            window.location='lat10_keahlian_23312108.php';
        </script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Keahlian</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-gray-800 text-white py-4 text-center text-xl font-semibold">
  Kelola Keahlian
</header>

<div class="flex min-h-screen">

  <!-- SIDEBAR -->
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

  <!-- CONTENT -->
  <main class="flex-1 p-8">
    <div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

      <h2 class="text-xl font-semibold mb-4">Ubah Keahlian</h2>

      <form method="POST" class="space-y-4">

        <div>
          <label class="block mb-1 font-medium">Nama Keahlian</label>
          <input type="text" name="nama_keahlian"
                 value="<?= htmlspecialchars($data['nama_keahlian']) ?>"
                 class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
          <label class="block mb-1 font-medium">Tingkat Keahlian</label>
          <select name="tingkat_keahlian"
                  class="w-full border px-3 py-2 rounded" required>
            <?php
            $levels = ['Pemula', 'Menengah', 'Ahli'];
            foreach ($levels as $lvl) {
                $selected = ($lvl === $data['tingkat_keahlian']) ? 'selected' : '';
                echo "<option value='$lvl' $selected>$lvl</option>";
            }
            ?>
          </select>
        </div>

        <div>
          <label class="block mb-1 font-medium">Deskripsi</label>
          <textarea name="deskripsi" rows="4"
            class="w-full border px-3 py-2 rounded" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>

        <div class="flex justify-between">
          <a href="lat10_keahlian_23312108.php"
             class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
             Batal
          </a>

          <button type="submit"
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
