<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$id_merk = $_GET['id'] ?? '';
$cek_merk = mysqli_query($koneksi, "SELECT * FROM tabel_merk WHERE id = '$id_merk'");
$data_merk = mysqli_fetch_assoc($cek_merk);

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $merk = trim($_POST['merk']);

    $edit_merk = mysqli_query($koneksi, "UPDATE tabel_merk SET merk = '$merk' WHERE id = '$id_merk'");
    if( $edit_merk ) {
        echo "<script>
            alert('Data merk berhasil diperbarui');
            location.href = 'data-merk.php';
        </script>";

    } else {
        echo "<script>alert('Data merk gagal diperbarui!!');</script>";
    }
}

$isActive = 'masterdata-merk';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-6">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Edit Data Merk</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-merk/data-merk.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" class="form-control" value="<?= $id_merk ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" id="merk" name="merk" class="form-control" value="<?= $data_merk['merk'] ?>" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Simpan Perubahan
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