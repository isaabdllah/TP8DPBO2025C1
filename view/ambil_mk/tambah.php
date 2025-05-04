<?php
require_once '../../connection.php';
require_once '../../model/Mahasiswa.php';
require_once '../../model/MataKuliah.php';

$mahasiswaModel = new Mahasiswa($conn);
$mataKuliahModel = new MataKuliah($conn);

$mahasiswaData = $mahasiswaModel->semua();
$mataKuliahData = $mataKuliahModel->semua();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengambilan Mata Kuliah</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Tambah Pengambilan Mata Kuliah</h2>
            <form action="../../controller/AmbilMKController.php" method="post">
                <input type="hidden" name="tambah" value="1">
                <div class="mb-3">
                    <label>Mahasiswa</label>
                    <select name="id_mahasiswa" class="form-control" required>
                        <option value="">Pilih Mahasiswa</option>
                        <?php while ($row = $mahasiswaData->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Mata Kuliah</label>
                    <select name="id_mk" class="form-control" required>
                        <option value="">Pilih Mata Kuliah</option>
                        <?php while ($row = $mataKuliahData->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama_mk'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Semester</label>
                    <input type="text" name="semester" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-outline-success me-2">Simpan</button>
                <a href="index.php" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
    <script src="../../assets/jquery.min.js"></script>
    <script src="../../assets/bootstrap.bundle.min.js"></script>
</body>
</html>