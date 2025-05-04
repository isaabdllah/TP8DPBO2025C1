<?php
require_once '../../connection.php';
require_once '../../model/Dosen.php';
$model = new Dosen($conn);
$data = $model->cari($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Dosen</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Edit Dosen</h2>
            <form action="../../controller/DosenController.php" method="post">
                <input type="hidden" name="ubah" value="1">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label>Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" value="<?= $data['nama_dosen'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
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