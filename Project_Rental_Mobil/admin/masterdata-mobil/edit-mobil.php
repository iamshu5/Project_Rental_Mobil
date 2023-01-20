<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$id_mobil = $_GET['id'] ?? '';
$cek_mobil = mysqli_query($koneksi, "SELECT * FROM tabel_mobil WHERE id = '$id_mobil'");
$data_mobil = mysqli_fetch_assoc($cek_mobil);

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $nama = trim($_POST['nama']);
    $harga = trim($_POST['harga']);
    $no_polisi = trim($_POST['no_polisi']);
    $warna = trim($_POST['warna']);
    $tahun_mobil = trim($_POST['tahun_mobil']);
    $jumlah_kursi = trim($_POST['jumlah_kursi']);
    $gambar= trim($_POST['gambar']);
    $id_merk= trim($_POST['merk']);

    $gambar = $data_mobil['gambar'];
    if( !empty($_FILES['gambar']['name']) ) {
        @unlink('../../assets/img/mobil/' . $data_mobil['gambar']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/img/mobil/' . $_FILES['gambar']['name']);
        $gambar = $_FILES['gambar']['name'];
    }

    $edit_mobil = mysqli_query($koneksi, "UPDATE tabel_mobil SET nama = '$nama', harga='$harga', no_polisi = '$no_polisi', warna = '$warna', tahun_mobil = '$tahun_mobil', jumlah_kursi = '$jumlah_kursi', gambar = '$gambar', id_merk = '$id_merk' WHERE id = '$id_mobil'");
    if( $edit_mobil ) {
        echo "<script>
            alert('Data mobil berhasil diperbarui');
            location.href = 'data-mobil.php';
        </script>";

    } else {
        echo mysqli_error($koneksi);
        echo "<script>alert('Data mobil gagal diperbarui!!');</script>";
    }
}

$isActive = 'masterdata-mobil';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-6">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Edit Data Mobil</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-mobil/data-mobil.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" class="form-control" value="<?= $id_mobil ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk Mobil</label>
                        <select id="merk" name="merk" class="form-control">
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_merk = mysqli_query($koneksi, "SELECT * FROM tabel_merk");
                            while( $data_merk = mysqli_fetch_assoc($cek_merk) ) {
                            ?>
                                <option value="<?= $data_merk['id'] ?>" <?= $data_merk['id'] == $data_mobil['id_merk'] ? 'selected' : '' ?>><?= $data_merk['merk'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mobil</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?= $data_mobil['nama'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" id="harga" name="harga" class="form-control" value="<?= $data_mobil['harga'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="no_polisi">No. Polisi</label>
                        <input type="text" id="no_polisi" name="no_polisi" class="form-control" value="<?= $data_mobil['no_polisi'] ?>" placeholder="No Polisi" required>
                    </div>

                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" id="warna" name="warna" class="form-control" value="<?= $data_mobil['warna'] ?>" placeholder="warna" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tahun_mobil">Tahun Mobil</label>
                        <input type="number" id="tahun_mobil" name="tahun_mobil" class="form-control" placeholder="Tahun Mobil" value="<?= $data_mobil['tahun_mobil'] ?>" required></input>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_kursi">Jumlah Kursi</label>
                        <input type="number" id="jumlah_kursi" name="jumlah_kursi"  class="form-control" placeholder="Jumlah Kursi" value="<?= $data_mobil['jumlah_kursi']?>" required></input>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar" rows="5" class="form-control" placeholder="gambar"></input>
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