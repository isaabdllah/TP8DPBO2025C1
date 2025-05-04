<?php
class Dosen {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function semua() {
        return $this->conn->query("SELECT * FROM dosen");
    }
    public function cari($id) {
        return $this->conn->query("SELECT * FROM dosen WHERE id=$id")->fetch_assoc();
    }
    public function tambah($data) {
        $stmt = $this->conn->prepare("INSERT INTO dosen (nama_dosen, nip, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $data['nama_dosen'], $data['nip'], $data['email']);
        return $stmt->execute();
    }
    public function ubah($id, $data) {
        $stmt = $this->conn->prepare("UPDATE dosen SET nama_dosen=?, nip=?, email=? WHERE id=?");
        $stmt->bind_param("sssi", $data['nama_dosen'], $data['nip'], $data['email'], $id);
        return $stmt->execute();
    }
    public function hapus($id) {
        return $this->conn->query("DELETE FROM dosen WHERE id=$id");
    }
}
?>