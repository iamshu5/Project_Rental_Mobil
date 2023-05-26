<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$isActive = 'masterdata-mobil';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Data Mobil</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-mobil/tambah-mobil.php" class="btn btn-success btn-sm shadow">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Nama Mobil</th>
                                <th>Harga</th>
                                <th>No - Polisi</th>
                                <th>Warna</th>
                                <th>Tahun Mobil</th>
                                <th>Jumlah Kursi</th>
                                <th>Merk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php
                            $cek_mobil = mysqli_query($koneksi, "SELECT tabel_mobil.*, tabel_merk.merk FROM tabel_mobil JOIN tabel_merk ON tabel_mobil.id_merk = tabel_merk.id");
                            while( $data_mobil = mysqli_fetch_assoc($cek_mobil) ) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data_mobil['id'] ?></td>
                                    <td><img src="<?= URL_WEB ?>assets/img/mobil/<?= $data_mobil['gambar'] ?>" height="50" alt="<?= $data_mobil['nama'] ?>"> </td>
                                    <td><?= $data_mobil['nama'] ?></td>
                                    <td><?= $data_mobil['harga'] ?></td>
                                    <td><?= $data_mobil['no_polisi'] ?></td>
                                    <td><?= $data_mobil['warna'] ?></td>
                                    <td><?= $data_mobil['tahun_mobil'] ?></td>
                                    <td><?= $data_mobil['jumlah_kursi'] ?></td>
                                    <td><?= $data_mobil['merk'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownAction" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                                <a class="dropdown-item text-primary" href="<?= URL_WEB ?>admin/masterdata-mobil/edit-mobil.php?id=<?= $data_mobil['id'] ?>">Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:hapusData('masterdata-mobil/delete-mobil.php?id=<?= $data_mobil['id'] ?>', 'mobil');">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
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