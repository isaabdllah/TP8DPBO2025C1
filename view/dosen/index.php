<?php
require_once '../../connection.php';
require_once '../../model/Dosen.php';
$model = new Dosen($conn);
$data = $model->semua();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Dosen</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Daftar Dosen</h2>
            <a href="../../index.php" class="btn btn-outline-dark mb-3">&larr; Kembali ke Beranda</a>
            <a href="tambah.php" class="btn btn-outline-primary mb-3">Tambah Dosen</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered bg-white rounded shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Dosen</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $data->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_dosen'] ?></td>
                            <td><?= $row['nip'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-outline-success btn-sm me-1 mb-1">Edit</a>
                                <a href="../../controller/DosenController.php?hapus=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin?')">Hapus</a>
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