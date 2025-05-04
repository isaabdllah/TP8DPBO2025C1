<?php
require_once '../../connection.php';
require_once '../../model/MataKuliah.php';
require_once '../../model/Dosen.php';

$model = new MataKuliah($conn);
$dosenModel = new Dosen($conn);
$data = $model->cari($_GET['id']);
$dosenData = $dosenModel->semua();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Edit Mata Kuliah</h2>
            <form action="../../controller/MataKuliahController.php" method="post">
                <input type="hidden" name="ubah" value="1">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label>Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" class="form-control" value="<?= $data['nama_mk'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Kode MK</label>
                    <input type="text" name="kode_mk" class="form-control" value="<?= $data['kode_mk'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Dosen Pengampu</label>
                    <select name="id_dosen" class="form-control" required>
                        <option value="">Pilih Dosen</option>
                        <?php while ($row = $dosenData->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['id_dosen'] ? 'selected' : '' ?>>
                                <?= $row['nama_dosen'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
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