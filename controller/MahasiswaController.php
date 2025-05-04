<?php
require_once '../connection.php';
require_once '../model/Mahasiswa.php';

$mahasiswaModel = new Mahasiswa($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $mahasiswaModel->tambah($_POST);
        header("Location: ../view/mahasiswa/index.php");
    } elseif (isset($_POST['ubah'])) {
        $mahasiswaModel->ubah($_POST['id'], $_POST);
        header("Location: ../view/mahasiswa/index.php");
    }
} elseif (isset($_GET['hapus'])) {
    $mahasiswaModel->hapus($_GET['hapus']);
    header("Location: ../view/mahasiswa/index.php");
}
?>