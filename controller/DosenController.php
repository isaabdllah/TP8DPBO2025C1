<?php
require_once '../connection.php';
require_once '../model/Dosen.php';

$dosenModel = new Dosen($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $dosenModel->tambah($_POST);
        header("Location: ../view/dosen/index.php");
    } elseif (isset($_POST['ubah'])) {
        $dosenModel->ubah($_POST['id'], $_POST);
        header("Location: ../view/dosen/index.php");
    }
} elseif (isset($_GET['hapus'])) {
    $dosenModel->hapus($_GET['hapus']);
    header("Location: ../view/dosen/index.php");
}
?>