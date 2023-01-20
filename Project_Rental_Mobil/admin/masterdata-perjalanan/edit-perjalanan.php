<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$id_perjalanan = $_GET['id'] ?? '';
$cek_perjalanan = mysqli_query($koneksi, "SELECT * FROM tabel_perjalanan WHERE id = '$id_perjalanan'");
$data_perjalanan = mysqli_fetch_assoc($cek_perjalanan);

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $asal = trim($_POST['asal']);
    $tujuan = trim($_POST['tujuan']);
    $jarak = trim($_POST['jarak']);

    $edit_perjalanan = mysqli_query($koneksi, "UPDATE tabel_perjalanan SET asal = '$asal', tujuan='$tujuan', jarak='$jarak' WHERE id = '$id_perjalanan'");
    if( $edit_perjalanan) {
        echo "<script>
            alert('Data perjalanan berhasil diperbarui');
            location.href = 'data-perjalanan.php';
        </script>";

    } else {
        echo "<script>alert('Data Perjalanan gagal diperbarui!!');</script>";
    }
}

$isActive = 'masterdata-perjalanan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-6">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Edit Data Perjalanan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-perjalanan/data-perjalanan.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" id="id" class="form-control" value="<?= $id_perjalanan ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="asal">asal</label>
                        <input type="text" id="asal" name="asal" class="form-control" value="<?= $data_perjalanan['asal'] ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan" class="form-control" value="<?= $data_perjalanan['tujuan'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="jarak">Jarak</label>
                        <input type="number" id="jarak" name="jarak" class="form-control" value="<?= $data_perjalanan['jarak'] ?>" required>
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