<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $nama_pemesan = trim($_POST['nama_pemesan']);
    $harga = trim($_POST['harga']);
    $dari = trim($_POST['dari']);
    $sampai = trim($_POST['sampai']);
    $nama_pemesan = trim($_POST['nama_pemesan']);
    $merk = trim($_POST['merk']);
    $perjalanan = trim($_POST['perjalanan']);
    $payment = trim($_POST['payment']);

        $tambah_pesanan = mysqli_query($koneksi, "INSERT INTO tabel_pesanan VALUES (NULL,'$harga', '$dari', '$sampai', '$nama_pemesan', '$merk', '$perjalanan', '$payment')");
        if($tambah_pesanan) {
            header('Location: data-pesanan.php');
            die;

        } else {
            echo mysqli_error($koneksi);
            echo "<script>alert('Data pesanan gagal ditambahkan!!');</script>";
        }
}

$isActive = 'masterdata-pesanan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-9 col-md-6 mb-5">
        <div class="card shadow-lg">
            <div class="card-header bg-info d-flex justify-content-between align-content-center">
                <h5 class="card-title mb-0 text-white">Input Data Pesanan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-pesanan/data-pesanan.php" class="btn btn-danger btn-sm shadow">Kembali</a>
            </div>
            <div class="card-body">
                <form method="POST">
                
                    <div class="form-group">
                        <label for="nama_pemesan">Nama Pemesan</label>
                        <select id="nama_pemesan" name="nama_pemesan" class="form-control">
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_pemesan = mysqli_query($koneksi, "SELECT * FROM tabel_pemesan");
                            while( $data_pemesan = mysqli_fetch_assoc($cek_pemesan) ) {
                            ?>
                                <option value="<?= $data_pemesan['id'] ?>"><?= $data_pemesan['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" name="dari" id="dari">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" name="sampai" id="sampai">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk dan Tipe Yang Dipilih</label>
                        <select id="merk" name="merk" class="form-control" onchange="gantiHarga(this.value);">
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_merk = mysqli_query($koneksi, "SELECT tabel_mobil.*, tabel_merk.merk FROM tabel_merk JOIN tabel_mobil ON tabel_merk.id = tabel_mobil.id_merk");
                            while( $data_merk = mysqli_fetch_assoc($cek_merk) ) {
                            ?>
                                <option value="<?= $data_merk['id'] ?>" data-harga="<?= $data_merk['harga'] ?>"><?= $data_merk['merk'] ?> - <?= $data_merk['nama']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" readonly>
                    </div>

                    <div class="form-group">
                        <label for="perjalanan">Perjalanan Yang Dipilih</label>
                        <select id="perjalanan" name="perjalanan" class="form-control">
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_perjalanan = mysqli_query($koneksi, "SELECT * FROM tabel_perjalanan");
                            while( $data_perjalanan = mysqli_fetch_assoc($cek_perjalanan) ) {
                            ?>
                                <option value="<?= $data_perjalanan['id'] ?>"><?= $data_perjalanan['asal'] ?> - <?= $data_perjalanan['tujuan'] ?> - <?= $data_perjalanan['jarak'] ?> KM</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment">Tipe Pembayaran</label>
                        <select id="payment" name="payment" class="form-control">
                            <option value="" selected disabled>- Pilih Salah Satu -</option>
                            <?php
                            $cek_payment = mysqli_query($koneksi, "SELECT * FROM tabel_jenis_payment");
                            while( $data_payment = mysqli_fetch_assoc($cek_payment) ) {
                            ?>
                                <option value="<?= $data_payment['id'] ?>"><?= $data_payment['jenis_payment'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success shadow">Submit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../partials/footer.php'; ?>
<script>
function gantiHarga(merk) {
    const harga = $(`[name=merk] option[value=${merk}]`).attr('data-harga');
    $('#harga').val(harga);
}
</script>
</body>
</html>