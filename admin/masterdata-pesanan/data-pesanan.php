<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$isActive = 'masterdata-pesanan';
include '../partials/header.php';
$id_pesanan= trim($_GET['tabel_pesanan'] ?? '');
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Data Pesanan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-pesanan/tambah-pesanan.php" class="btn btn-success btn-sm shadow">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Harga</th>
                                <th>Dari- Sampai</th>
                                <th>Nama Pemesan</th>
                                <th>Merk</th>
                                <th>Perjalanan</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cek_pesanan = mysqli_query($koneksi, "SELECT tabel_mobil.harga, tabel_pesanan.*, tabel_pemesan.nama, tabel_mobil.nama AS nama_mobil, tabel_perjalanan.asal, tabel_perjalanan.tujuan, tabel_perjalanan.jarak, tabel_jenis_payment.jenis_payment FROM tabel_pesanan JOIN tabel_pemesan ON tabel_pesanan.id_pemesan = tabel_pemesan.id JOIN tabel_mobil ON tabel_pesanan.id_mobil = tabel_mobil.id JOIN tabel_perjalanan ON tabel_pesanan.id_perjalanan = tabel_perjalanan.id JOIN tabel_jenis_payment ON tabel_pesanan.id_jenis_payment = tabel_jenis_payment.id" );
                            while( $data_pesanan = mysqli_fetch_assoc($cek_pesanan) ) {
                            ?>
                                <tr>
                                    <td><?= $data_pesanan['id'] ?></td>
                                    <td><?= $data_pesanan['harga'] ?></td>
                                    <td><?= $data_pesanan['dari'] ?> - <?= $data_pesanan['sampai'] ?></td>
                                    <td><?= $data_pesanan['nama'] ?></td>
                                    <td><?= $data_pesanan['nama_mobil'] ?></td>
                                    <td><?= $data_pesanan['asal'] ?> - <?= $data_pesanan['tujuan'] ?> (<?= $data_pesanan['jarak'] ?> KM)</td>
                                    <td><?= $data_pesanan['jenis_payment'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownAction" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                                <a class="dropdown-item text-danger" onclick="javascript:hapusData('masterdata-pesanan/delete-pesanan.php?id=<?= $data_pesanan['id'] ?>', 'pesanan');">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
</body>
</html>