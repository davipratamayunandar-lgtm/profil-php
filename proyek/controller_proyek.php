<?php
require_once __DIR__ . "/../koneksi_23312108.php";
require_once __DIR__ . "/model_proyek.php";

class ProyekController {
    private $model;

    public function __construct($conn) {
        $this->model = new ProyekModel($conn);
    }

    public function index() {
        return $this->model->getAll();
    }

    public function store($data, $files) {
        $gambar = $this->uploadFile($files['gambar']);
        return $this->model->insert(
            $data['nama_proyek'],
            $data['deskripsi'],
            $data['teknologi'],
            $data['tahun'],
            $gambar
        );
    }

    public function edit($id) {
        return $this->model->findById($id);
    }

    public function update($id, $data, $files) {
        $gambar = $this->uploadFile($files['gambar'], $data['gambar_lama']);
        return $this->model->update(
            $id,
            $data['nama_proyek'],
            $data['deskripsi'],
            $data['teknologi'],
            $data['tahun'],
            $gambar
        );
    }

    public function destroy($id) {
        $data = $this->model->findById($id);
        if ($data && $data['gambar'] && file_exists("../" . $data['gambar'])) {
            unlink("../" . $data['gambar']);
        }
        return $this->model->delete($id);
    }

    private function uploadFile($file, $old = null) {
        if ($file['error'] === 4) return $old;

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg','jpeg','png'])) return $old;

        $folder = __DIR__ . "/../images/";
        if (!is_dir($folder)) mkdir($folder, 0777, true);

        $name = uniqid('proyek_') . "." . $ext;
        move_uploaded_file($file['tmp_name'], $folder . $name);

        if ($old && file_exists("../".$old)) unlink("../".$old);

        return "images/".$name;
    }
}
