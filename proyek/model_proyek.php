<?php

class ProyekModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // =========================
    // TAMPIL SEMUA
    // =========================
    public function getAll() {
        $result = $this->conn->query("CALL sp_proyek_tampil_23312108()");
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $result->close();
            $this->conn->next_result();
        }

        return $data;
    }

    // =========================
    // TAMBAH
    // =========================
    public function insert($nama, $deskripsi, $teknologi, $tahun, $gambar) {
        $stmt = $this->conn->prepare(
            "CALL sp_proyek_tambah_23312108(?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssis", $nama, $deskripsi, $teknologi, $tahun, $gambar);
        $stmt->execute();
        $stmt->close();
        $this->conn->next_result();

        return true;
    }

    // =========================
    // AMBIL BY ID
    // =========================
    public function findById($id) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM tbproyek_23312108 WHERE id_proyek = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        return $data;
    }

    // =========================
    // UPDATE
    // =========================
    public function update($id, $nama, $deskripsi, $teknologi, $tahun, $gambar) {
        $stmt = $this->conn->prepare(
            "CALL sp_proyek_ubah_23312108(?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("isssis", $id, $nama, $deskripsi, $teknologi, $tahun, $gambar);
        $stmt->execute();
        $stmt->close();
        $this->conn->next_result();

        return true;
    }

    // =========================
    // HAPUS
    // =========================
    public function delete($id) {
        $stmt = $this->conn->prepare(
            "CALL sp_proyek_hapus_23312108(?)"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->conn->next_result();

        return true;
    }
}
