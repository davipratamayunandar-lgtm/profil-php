<?php
require_once "../koneksi_23312108.php";
require_once "controller_proyek.php";

$controller = new ProyekController($koneksi);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->store($_POST, $_FILES);
    echo "<script>
        alert('Proyek berhasil ditambahkan');
        window.location='lat10_proyek_23312108.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-gray-800 text-white py-4 text-center text-xl font-semibold">
    Tambah Proyek
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

    <!-- KONTEN -->
    <main class="flex-1 p-8">
        <div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

            <form method="post" enctype="multipart/form-data" class="space-y-4">

                <div>
                    <label class="block font-semibold mb-1">Nama Proyek</label>
                    <input type="text" name="nama_proyek" required
                           class="w-full border px-3 py-2 rounded">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                              class="w-full border px-3 py-2 rounded"></textarea>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Teknologi</label>
                    <input type="text" name="teknologi" required
                           class="w-full border px-3 py-2 rounded">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Tahun</label>
                    <input type="number" name="tahun" required
                           class="w-full border px-3 py-2 rounded">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Gambar Proyek</label>
                    <input type="file" name="gambar" accept="image/*" required
                           class="w-full border px-3 py-2 rounded">
                </div>

                <div class="flex justify-between mt-6">
                    <a href="lat10_proyek_23312108.php"
                       class="bg-gray-400 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                    <button class="bg-gray-800 text-white px-5 py-2 rounded">
                        Simpan
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
