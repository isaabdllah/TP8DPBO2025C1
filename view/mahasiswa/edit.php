<?php
require_once '../../connection.php';
require_once '../../model/Mahasiswa.php';
$model = new Mahasiswa($conn);
$data = $model->cari($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Edit Mahasiswa</h2>
            <form action="../../controller/MahasiswaController.php" method="post">
                <input type="hidden" name="ubah" value="1">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= $data['nim'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $data['telepon'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" value="<?= $data['tanggal_masuk'] ?>" required>
                </div>
                <button type="submit" class="btn btn-outline-success me-2">Update</button>
                <a href="index.php" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
    <script src="../../assets/jquery.min.js"></script>
    <script src="../../assets/bootstrap.bundle.min.js"></script>
</body>
</html>