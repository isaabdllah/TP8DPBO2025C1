<?php
class Mahasiswa {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function semua() {
        return $this->conn->query("SELECT * FROM mahasiswa");
    }
    public function cari($id) {
        return $this->conn->query("SELECT * FROM mahasiswa WHERE id=$id")->fetch_assoc();
    }
    public function tambah($data) {
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nama, nim, telepon, email, tanggal_masuk) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $data['nama'], $data['nim'], $data['telepon'], $data['email'], $data['tanggal_masuk']);
        return $stmt->execute();
    }
    public function ubah($id, $data) {
        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama=?, nim=?, telepon=?, email=?, tanggal_masuk=? WHERE id=?");
        $stmt->bind_param("sssssi", $data['nama'], $data['nim'], $data['telepon'], $data['email'], $data['tanggal_masuk'], $id);
        return $stmt->execute();
    }
    public function hapus($id) {
        return $this->conn->query("DELETE FROM mahasiswa WHERE id=$id");
    }
}
?>