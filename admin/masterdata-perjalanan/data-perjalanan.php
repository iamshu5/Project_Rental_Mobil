<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$isActive = 'masterdata-perjalanan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Data Perjalanan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-perjalanan/tambah-perjalanan.php" class="btn btn-success btn-sm shadow">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Jarak (Kilometer)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cek_perjalanan = mysqli_query($koneksi, "SELECT * FROM tabel_perjalanan");
                            while( $data_perjalanan = mysqli_fetch_assoc($cek_perjalanan) ) {
                            ?>
                                <tr>
                                    <td><?= $data_perjalanan['id'] ?></td>
                                    <td><?= $data_perjalanan['asal'] ?></td>
                                    <td><?= $data_perjalanan['tujuan'] ?></td>
                                    <td><?= number_format( $data_perjalanan['jarak']) ?> KM</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownAction" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                                <a class="dropdown-item text-primary" href="<?= URL_WEB ?>admin/masterdata-perjalanan/edit-perjalanan.php?id=<?= $data_perjalanan['id'] ?>">Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:hapusData('masterdata-perjalanan/delete-perjalanan.php?id=<?= $data_perjalanan['id'] ?>', 'perjalanan');">Delete</a>
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