<?php
require_once '../connection.php';
require_once '../model/MataKuliah.php';

$mataKuliahModel = new MataKuliah($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $mataKuliahModel->tambah($_POST);
        header("Location: ../view/mata_kuliah/index.php");
    } elseif (isset($_POST['ubah'])) {
        $mataKuliahModel->ubah($_POST['id'], $_POST);
        header("Location: ../view/mata_kuliah/index.php");
    }
} elseif (isset($_GET['hapus'])) {
    $mataKuliahModel->hapus($_GET['hapus']);
    header("Location: ../view/mata_kuliah/index.php");
}
?>