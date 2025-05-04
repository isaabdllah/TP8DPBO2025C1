<?php
class MataKuliah {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function semua() {
        return $this->conn->query("SELECT mk.*, d.nama_dosen FROM mata_kuliah mk LEFT JOIN dosen d ON mk.id_dosen = d.id");
    }
    public function cari($id) {
        return $this->conn->query("SELECT * FROM mata_kuliah WHERE id=$id")->fetch_assoc();
    }
    public function tambah($data) {
        $stmt = $this->conn->prepare("INSERT INTO mata_kuliah (nama_mk, kode_mk, id_dosen) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $data['nama_mk'], $data['kode_mk'], $data['id_dosen']);
        return $stmt->execute();
    }
    public function ubah($id, $data) {
        $stmt = $this->conn->prepare("UPDATE mata_kuliah SET nama_mk=?, kode_mk=?, id_dosen=? WHERE id=?");
        $stmt->bind_param("ssii", $data['nama_mk'], $data['kode_mk'], $data['id_dosen'], $id);
        return $stmt->execute();
    }
    public function hapus($id) {
        return $this->conn->query("DELETE FROM mata_kuliah WHERE id=$id");
    }
}
?>