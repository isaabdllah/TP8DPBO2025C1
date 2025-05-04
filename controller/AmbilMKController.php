<?php
require_once '../connection.php';
require_once '../model/AmbilMK.php';

$ambilMKModel = new AmbilMK($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $ambilMKModel->tambah($_POST);
        header("Location: ../view/ambil_mk/index.php");
    } elseif (isset($_POST['ubah'])) {
        $ambilMKModel->ubah($_POST['id'], $_POST);
        header("Location: ../view/ambil_mk/index.php");
    }
} elseif (isset($_GET['hapus'])) {
    $ambilMKModel->hapus($_GET['hapus']);
    header("Location: ../view/ambil_mk/index.php");
}
?>