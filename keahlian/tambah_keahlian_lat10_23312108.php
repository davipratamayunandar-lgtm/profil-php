<?php
require_once "../koneksi_23312108.php";
require_once "controller_keahlian.php";

$controller = new KeahlianController($koneksi);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->store($_POST);
    echo "<script>alert('Keahlian berhasil ditambahkan'); window.location='lat10_keahlian_23312108.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Keahlian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-gray-800 text-white py-4 text-center text-xl font-semibold">
    Tambah Keahlian
</header>

<div class="flex min-h-screen">

    <aside class="w-64 bg-gray-900 text-white p-6">
        <nav class="space-y-3">
            <a href="../lat10_profil_23312108.html" class="block hover:bg-gray-700 px-3 py-2 rounded">🏠 Profil</a>
            <a href="../lat10_proyek_23312108.php" class="block hover:bg-gray-700 px-3 py-2 rounded">📁 Proyek</a>
            <a href="lat10_keahlian_23312108.php" class="block bg-gray-700 px-3 py-2 rounded">💼 Keahlian</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">

            <form method="post" class="space-y-4">

                <div>
                    <label class="block font-semibold mb-1">Nama Keahlian</label>
                    <input type="text" name="nama_keahlian" required
                           class="w-full border px-3 py-2 rounded">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Tingkat Keahlian</label>
                    <select name="tingkat_keahlian" required
                            class="w-full border px-3 py-2 rounded">
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="Pemula">Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Ahli">Ahli</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                              class="w-full border px-3 py-2 rounded"></textarea>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="lat10_keahlian_23312108.php"
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
