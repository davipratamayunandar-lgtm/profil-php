<?php

class KeahlianModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // =========================
    // TAMPIL SEMUA
    // =========================
    public function getAll() {
        $result = $this->conn->query("CALL sp_keahlian_tampil_23312108()");
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
    public function insert($nama, $tingkat, $deskripsi) {
        $stmt = $this->conn->prepare(
            "CALL sp_keahlian_tambah_23312108(?, ?, ?)"
        );
        $stmt->bind_param("sss", $nama, $tingkat, $deskripsi);
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
            "SELECT * FROM tbkeahlian_23312108 WHERE id_keahlian = ?"
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
    public function update($id, $nama, $tingkat, $deskripsi) {
        $stmt = $this->conn->prepare(
            "CALL sp_keahlian_ubah_23312108(?, ?, ?, ?)"
        );
        $stmt->bind_param("isss", $id, $nama, $tingkat, $deskripsi);
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
            "CALL sp_keahlian_hapus_23312108(?)"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->conn->next_result();
        return true;
    }

    // =========================
    // CARI
    // =========================
    public function search($keyword) {
        $stmt = $this->conn->prepare(
            "CALL sp_keahlian_cari_23312108(?)"
        );
        $stmt->bind_param("s", $keyword);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();
        $this->conn->next_result();
        return $data;
    }
}
