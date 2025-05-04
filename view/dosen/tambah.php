<!DOCTYPE html>
<html>
<head>
    <title>Tambah Dosen</title>
    <link rel="stylesheet" href="../../assets/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 bg-light rounded">
            <h2 class="mb-4 fw-bold border-bottom pb-2">Tambah Dosen</h2>
            <form action="../../controller/DosenController.php" method="post">
                <input type="hidden" name="tambah" value="1">
                <div class="mb-3">
                    <label>Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
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