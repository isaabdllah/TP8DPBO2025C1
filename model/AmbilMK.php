<?php
class AmbilMK {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function semua() {
        $sql = "SELECT am.*, m.nama AS nama_mahasiswa, mk.nama_mk AS nama_mk 
                FROM ambil_mk am 
                JOIN mahasiswa m ON am.id_mahasiswa = m.id 
                JOIN mata_kuliah mk ON am.id_mk = mk.id";
        return $this->conn->query($sql);
    }
    public function cari($id) {
        return $this->conn->query("SELECT * FROM ambil_mk WHERE id=$id")->fetch_assoc();
    }
    public function tambah($data) {
        $stmt = $this->conn->prepare("INSERT INTO ambil_mk (id_mahasiswa, id_mk, semester) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $data['id_mahasiswa'], $data['id_mk'], $data['semester']);
        return $stmt->execute();
    }
    public function ubah($id, $data) {
        $stmt = $this->conn->prepare("UPDATE ambil_mk SET id_mahasiswa=?, id_mk=?, semester=? WHERE id=?");
        $stmt->bind_param("iisi", $data['id_mahasiswa'], $data['id_mk'], $data['semester'], $id);
        return $stmt->execute();
    }
    public function hapus($id) {
        return $this->conn->query("DELETE FROM ambil_mk WHERE id=$id");
    }
}
?>