<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( empty($_FILES['gambar']['name']) ) {
        echo "<script>alert('Gambar Pemesan wajib di upload!!');</script>";
    } else {
        
        $merk  = trim($_POST['merk']);
        $nama = trim($_POST['nama']);
        $harga = trim($_POST['harga']);
        $no_polisi = trim($_POST['no_polisi']);
        $warna = trim($_POST['warna']);
        $tahun_mobil = trim($_POST['tahun_mobil']);
        $jumlah_kursi = trim($_POST['jumlah_kursi']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/img/mobil/' . $_FILES['gambar']['name']);
        $gambar = $_FILES['gambar']['name'];

        $tambah_mobil = mysqli_query($koneksi, "INSERT INTO tabel_mobil VALUES (NULL, '$nama', '$harga', '$no_polisi', '$warna', '$tahun_mobil', '$jumlah_kursi', '$gambar', '$merk')");
        if($tambah_mobil) {
            header('Location: data-mobil.php');
            die;

        } else {
            echo mysqli_error($koneksi);
            echo "<script>alert('Data mobil gagal ditambahkan.');</script>";
        }
    }
}

$isActive = 'masterdata-mobil';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-sm-10 col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Tambah Data Mobil</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-mobil/data-mobil.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="merk">Merk Mobil</label>
                        <select id="merk" name="merk" class="form-control" required>
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_merk = mysqli_query($koneksi, "SELECT * FROM tabel_merk");
                            while( $data_merk = mysqli_fetch_assoc($cek_merk) ) {
                            ?>
                                <option value="<?= $data_merk['id'] ?>"><?= $data_merk['merk'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mobil</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Mobil" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Sewa</label>
                        <input type="number" min="100000" id="harga" name="harga" class="form-control" placeholder="Minimal 100K" required>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="harga">Harga</label>
                        <select id="harga" name="harga" class="form-control">
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_harga = mysqli_query($koneksi, "SELECT * FROM tabel_harga");
                            while( $data_harga = mysqli_fetch_assoc($cek_harga) ) {
                            ?>
                                <option value="<?= $data_harga['id'] ?>"><?= $data_harga['harga'] ?></option>
                            <?php } ?>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label for="no_polisi">No. Polisi</label>
                        <input type="text" id="no_polisi" name="no_polisi" class="form-control" placeholder="No Polisi" required>
                    </div>

                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" id="warna" name="warna" class="form-control" placeholder="Warna" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tahun_mobil">Tahun Mobil</label>
                        <input type="number" id="tahun_mobil" name="tahun_mobil" rows="5" class="form-control" placeholder="Tahun Mobil" required></input>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_kursi">Jumlah Kursi</label>
                        <input type="number" id="jumlah_kursi" name="jumlah_kursi" class="form-control" placeholder="5-8" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control" required>
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