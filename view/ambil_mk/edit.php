<?php
require_once '../../connection.php';
require_once '../../model/AmbilMK.php';
require_once '../../model/Mahasiswa.php';
require_once '../../model/MataKuliah.php';

$model = new AmbilMK($conn);
$mahasiswaModel = new Mahasiswa($conn);
$mataKuliahModel = new MataKuliah($conn);

$data = $model->cari($_GET['id']);
$mahasiswaData = $mahasiswaModel->semua();
$mataKuliahData = $mataKuliahModel->semua();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengambilan Mata Kuliah</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Edit Pengambilan Mata Kuliah</h2>
            <form action="../../controller/AmbilMKController.php" method="post">
                <input type="hidden" name="ubah" value="1">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label>Mahasiswa</label>
                    <select name="id_mahasiswa" class="form-control" required>
                        <option value="">Pilih Mahasiswa</option>
                        <?php while ($row = $mahasiswaData->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['id_mahasiswa'] ? 'selected' : '' ?>>
                                <?= $row['nama'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Mata Kuliah</label>
                    <select name="id_mk" class="form-control" required>
                        <option value="">Pilih Mata Kuliah</option>
                        <?php while ($row = $mataKuliahData->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['id_mk'] ? 'selected' : '' ?>>
                                <?= $row['nama_mk'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Semester</label>
                    <input type="text" name="semester" class="form-control" value="<?= $data['semester'] ?>" required>
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