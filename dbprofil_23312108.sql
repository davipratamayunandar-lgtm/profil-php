-- ==========================================================
-- DATABASE PROFIL MAHASISWA (NPM: 23312108)
-- ==========================================================

CREATE DATABASE IF NOT EXISTS dbprofil_23312108;
USE dbprofil_23312108;

-- ==========================================================
-- TABEL KEAHLIAN
-- ==========================================================
CREATE TABLE IF NOT EXISTS tbkeahlian_23312108 (
  id_keahlian INT AUTO_INCREMENT PRIMARY KEY,
  nama_keahlian VARCHAR(100) NOT NULL,
  tingkat_keahlian ENUM('Pemula', 'Menengah', 'Ahli') NOT NULL,
  deskripsi TEXT
);

-- Data Awal Keahlian
INSERT INTO tbkeahlian_23312108 (nama_keahlian, tingkat_keahlian, deskripsi) VALUES
('HTML & CSS', 'Ahli', 'Mampu membuat tampilan web responsif dan menarik.'),
('JavaScript', 'Menengah', 'Menguasai dasar-dasar DOM dan event handling.'),
('Flutter', 'Pemula', 'Sedang belajar membuat aplikasi mobile multiplatform.');

-- ==========================================================
-- TABEL PROYEK
-- ==========================================================
CREATE TABLE IF NOT EXISTS tbproyek_23312108 (
  id_proyek INT AUTO_INCREMENT PRIMARY KEY,
  nama_proyek VARCHAR(150) NOT NULL,
  tahun_proyek YEAR NOT NULL,
  deskripsi TEXT,
  teknologi VARCHAR(100),
  peran VARCHAR(100)
);

-- Data Awal Proyek
INSERT INTO tbproyek_23312108 (nama_proyek, tahun_proyek, deskripsi, teknologi, peran) VALUES
('Website Portofolio', 2024, 'Membuat website profil pribadi menggunakan HTML, CSS, dan JS.', 'HTML, CSS, JS', 'Front-End Developer'),
('Aplikasi Presensi Mobile', 2025, 'Membuat aplikasi presensi mahasiswa berbasis Flutter.', 'Flutter, Firebase', 'Fullstack Developer'),
('Sistem Informasi Kepegawaian', 2023, 'Aplikasi berbasis web untuk manajemen data pegawai.', 'PHP, MySQL', 'Backend Developer');

-- ==========================================================
-- VIEW
-- ==========================================================
CREATE OR REPLACE VIEW vwkeahlian_23312108 AS
SELECT * FROM tbkeahlian_23312108
ORDER BY nama_keahlian ASC;

CREATE OR REPLACE VIEW vwproyek_23312108 AS
SELECT * FROM tbproyek_23312108
ORDER BY tahun_proyek DESC, nama_proyek ASC;

-- ==========================================================
-- STORED PROCEDURE KEAHLIAN (CRUD + TAMPIL)
-- ==========================================================
DELIMITER //

-- Tambah keahlian
CREATE PROCEDURE sp_keahlian_tambah_23312108(
  IN p_nama VARCHAR(100),
  IN p_tingkat ENUM('Pemula','Menengah','Ahli'),
  IN p_deskripsi TEXT
)
BEGIN
  INSERT INTO tbkeahlian_23312108 (nama_keahlian, tingkat_keahlian, deskripsi)
  VALUES (p_nama, p_tingkat, p_deskripsi);
END //

-- Ubah keahlian
CREATE PROCEDURE sp_keahlian_ubah_23312108(
  IN p_id INT,
  IN p_nama VARCHAR(100),
  IN p_tingkat ENUM('Pemula','Menengah','Ahli'),
  IN p_deskripsi TEXT
)
BEGIN
  UPDATE tbkeahlian_23312108
  SET nama_keahlian = p_nama,
      tingkat_keahlian = p_tingkat,
      deskripsi = p_deskripsi
  WHERE id_keahlian = p_id;
END //

-- Hapus keahlian
CREATE PROCEDURE sp_keahlian_hapus_23312108(IN p_id INT)
BEGIN
  DELETE FROM tbkeahlian_23312108 WHERE id_keahlian = p_id;
END //

-- Cari keahlian
CREATE PROCEDURE sp_keahlian_cari_23312108(IN p_keyword VARCHAR(100))
BEGIN
  SELECT * FROM tbkeahlian_23312108
  WHERE nama_keahlian LIKE CONCAT('%', p_keyword, '%');
END //

-- Tampil semua keahlian
CREATE PROCEDURE sp_keahlian_tampil_23312108()
BEGIN
  SELECT * FROM tbkeahlian_23312108 ORDER BY nama_keahlian ASC;
END //

-- ==========================================================
-- STORED PROCEDURE PROYEK (CRUD + TAMPIL)
-- ==========================================================

-- Tambah proyek
CREATE PROCEDURE sp_proyek_tambah_23312108(
  IN p_nama VARCHAR(150),
  IN p_tahun YEAR,
  IN p_deskripsi TEXT,
  IN p_teknologi VARCHAR(100),
  IN p_peran VARCHAR(100)
)
BEGIN
  INSERT INTO tbproyek_23312108 (nama_proyek, tahun_proyek, deskripsi, teknologi, peran)
  VALUES (p_nama, p_tahun, p_deskripsi, p_teknologi, p_peran);
END //

-- Ubah proyek
CREATE PROCEDURE sp_proyek_ubah_23312108(
  IN p_id INT,
  IN p_nama VARCHAR(150),
  IN p_tahun YEAR,
  IN p_deskripsi TEXT,
  IN p_teknologi VARCHAR(100),
  IN p_peran VARCHAR(100)
)
BEGIN
  UPDATE tbproyek_23312108
  SET nama_proyek = p_nama,
      tahun_proyek = p_tahun,
      deskripsi = p_deskripsi,
      teknologi = p_teknologi,
      peran = p_peran
  WHERE id_proyek = p_id;
END //

-- Hapus proyek
CREATE PROCEDURE sp_proyek_hapus_23312108(IN p_id INT)
BEGIN
  DELETE FROM tbproyek_23312108 WHERE id_proyek = p_id;
END //

-- Cari proyek
CREATE PROCEDURE sp_proyek_cari_23312108(IN p_keyword VARCHAR(100))
BEGIN
  SELECT * FROM tbproyek_23312108
  WHERE nama_proyek LIKE CONCAT('%', p_keyword, '%')
     OR teknologi LIKE CONCAT('%', p_keyword, '%');
END //

-- Tampil semua proyek
CREATE PROCEDURE sp_proyek_tampil_23312108()
BEGIN
  SELECT * FROM tbproyek_23312108 ORDER BY tahun_proyek DESC, nama_proyek ASC;
END //

-- Ambil proyek berdasarkan ID
CREATE PROCEDURE sp_proyek_by_id_23312108(IN p_id INT)
BEGIN
  SELECT * 
  FROM tbproyek_23312108
  WHERE id_proyek = p_id;
END //

DELIMITER ;

-- ==========================================================
-- END OF DATABASE SCRIPT
-- ==========================================================
