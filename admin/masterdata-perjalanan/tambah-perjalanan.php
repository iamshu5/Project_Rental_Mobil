<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $asal  = trim($_POST['asal']);
    $tujuan  = trim($_POST['tujuan']);
    $jarak  = trim($_POST['jarak']);

        $tambah_perjalanan = mysqli_query($koneksi, "INSERT INTO tabel_perjalanan VALUES (NULL, '$asal', '$tujuan', '$jarak')");
        if($tambah_perjalanan) {
            header('Location: data-perjalanan.php');
            die;

        } else {
            echo "<script>alert('Data perjalanan gagal ditambahkan!!');</script>";
        }

}

$isActive = 'masterdata-perjalanan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-sm-10 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Tambah Data Perjalanan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-perjalanan/data-perjalanan.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="asal">Asal</label>
                        <input type="text" id="asal" name="asal" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jarak">Jarak</label>
                        <input type="number" id="jarak" min="1" name="jarak" class="form-control" required>
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