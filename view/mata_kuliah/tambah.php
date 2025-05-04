<?php
require_once '../../connection.php';
require_once '../../model/Dosen.php';
$dosenModel = new Dosen($conn);
$dosenData = $dosenModel->semua();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Tambah Mata Kuliah</h2>
            <form action="../../controller/MataKuliahController.php" method="post">
                <input type="hidden" name="tambah" value="1">
                <div class="mb-3">
                    <label>Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kode MK</label>
                    <input type="text" name="kode_mk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Dosen Pengampu</label>
                    <select name="id_dosen" class="form-control" required>
                        <option value="">Pilih Dosen</option>
                        <?php while ($row = $dosenData->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama_dosen'] ?></option>
                        <?php endwhile; ?>
                    </select>
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