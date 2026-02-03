<?php
require_once __DIR__ . "/../koneksi_23312108.php";
require_once __DIR__ . "/model_keahlian.php";

class KeahlianController {
    private $model;

    public function __construct($conn) {
        $this->model = new KeahlianModel($conn);
    }

    public function index($keyword = null) {
        return $keyword
            ? $this->model->search($keyword)
            : $this->model->getAll();
    }

    public function store($data) {
        return $this->model->insert(
            $data['nama_keahlian'],
            $data['deskripsi'],
            $data['gambar']
        );
    }

    public function edit($id) {
        return $this->model->findById($id);
    }

    public function update($id, $data) {
        return $this->model->update(
            $id,
            $data['nama_keahlian'],
            $data['deskripsi'],
            $data['gambar']
        );
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
