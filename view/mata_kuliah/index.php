<?php
require_once '../../connection.php';
require_once '../../model/MataKuliah.php';
$model = new MataKuliah($conn);
$data = $model->semua();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mata Kuliah</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Daftar Mata Kuliah</h2>
            <a href="../../index.php" class="btn btn-outline-dark mb-3">&larr; Kembali ke Beranda</a>
            <a href="tambah.php" class="btn btn-outline-primary mb-3">Tambah Mata Kuliah</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered bg-white rounded shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Kode MK</th>
                            <th>Dosen Pengampu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $data->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_mk'] ?></td>
                            <td><?= $row['kode_mk'] ?></td>
                            <td><?= $row['nama_dosen'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-outline-success btn-sm me-1 mb-1">Edit</a>
                                <a href="../../controller/MataKuliahController.php?hapus=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../assets/jquery.min.js"></script>
    <script src="../../assets/bootstrap.bundle.min.js"></script>
</body>
</html>