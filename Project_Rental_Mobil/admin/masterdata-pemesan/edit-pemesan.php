<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$id_pemesan = $_GET['id'] ?? '';
$cek_pemesan = mysqli_query($koneksi, "SELECT * FROM tabel_pemesan WHERE id = '$id_pemesan'");
$data_pemesan = mysqli_fetch_assoc($cek_pemesan);

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $telp = trim($_POST['telp']);
    $foto = $data_pemesan['foto'];

    if( !empty($_FILES['foto']['name']) ) {
        @unlink('../../assets/img/pemesan/' . $foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/img/pemesan/' . $_FILES['foto']['name']);
        $foto = $_FILES['foto']['name'];
    }

    $edit_pemesan = mysqli_query($koneksi, "UPDATE tabel_pemesan SET nama = '$nama', alamat = '$alamat', telp = '$telp', foto = '$foto' WHERE id = '$id_pemesan'");
    if( $edit_pemesan ) {
        echo "<script>
            alert('Data pemesan berhasil diperbarui');
            location.href = 'data-pemesan.php';
        </script>";

    } else {
        echo "<script>alert('Data pemesan gagal diperbarui!!');</script>";
    }
}

$isActive = 'masterdata-pemesan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-7">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Edit Data pemesan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-pemesan/data-pemesan.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" class="form-control" value="<?= $id_pemesan ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama pemesan</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama pemesan" value="<?= $data_pemesan['nama'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telp">No Telepon</label>
                        <input type="number" id="telp" name="telp" class="form-control" placeholder="No Telepon" value="<?= $data_pemesan['telp'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto Profile</label>
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="5" class="form-control" placeholder="Alamat" required><?= $data_pemesan['alamat'] ?></textarea>
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