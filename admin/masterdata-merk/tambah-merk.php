<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $merk  = trim($_POST['merk']);

        $tambah_merk = mysqli_query($koneksi, "INSERT INTO tabel_merk VALUES (NULL, '$merk')");
        if($tambah_merk) {
            header('Location: data-merk.php');
            die;

        } else {
            echo "<script>alert('Data merk gagal ditambahkan!!');</script>";
        }

}

$isActive = 'masterdata-merk';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-sm-10 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Tambah Data Merk</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-merk/data-merk.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="merk">Merk Mobil</label>
                        <input type="text" id="merk" name="merk" class="form-control" required>
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