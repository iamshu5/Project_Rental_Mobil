<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( empty($_FILES['foto']['name']) ) {
        echo "<script>alert('foto Pemesan wajib di upload!!');</script>";
    } else {
        $nama = trim($_POST['nama']);
        $alamat = trim($_POST['alamat']);
        $telp = trim($_POST['telp']);
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/img/pemesan/' . $_FILES['foto']['name']);
        $foto = $_FILES['foto']['name'];

        $tambah_pemesan = mysqli_query($koneksi, "INSERT INTO tabel_pemesan VALUES (NULL, '$nama', '$alamat', '$telp', '$foto')");
        if( $tambah_pemesan ) {
            header('Location: data-pemesan.php');
            die;
        } else {
            echo "<script>alert('Data Pemesan gagal ditambahkan!!');</script>";
        }
    }
}

$isActive = 'masterdata-pemesan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-7">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Tambah Data pemesan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-pemesan/data-pemesan.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama">Nama pemesan</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama pemesan" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="5" class="form-control" placeholder="Alamat" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" id="telp" name="telp" class="form-control" placeholder="No Telepon" required>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto Pemesan</label>
                        <input type="file" id="foto" name="foto" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Submit Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
</body>
</html>