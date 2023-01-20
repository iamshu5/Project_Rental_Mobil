<?php
require '../../config.php';

if( !isset($_SESSION['login']) ) {
    header('Location: ../../logout.php');
    die;
}

$isActive = 'masterdata-pemesan';
include '../partials/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg">
            <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-white">Data pemesan</h5>
                <a href="<?= URL_WEB ?>admin/masterdata-pemesan/tambah-pemesan.php" class="btn btn-success btn-sm shadow">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama pemesan</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cek_pemesan = mysqli_query($koneksi, "SELECT * FROM tabel_pemesan");
                            while( $data_pemesan = mysqli_fetch_assoc($cek_pemesan) ) {
                            ?>
                                <tr>
                                    <td><?= $data_pemesan['id'] ?></td>
                                    <td><?= $data_pemesan['nama'] ?></td>
                                    <td><?= $data_pemesan['alamat'] ?></td>
                                    <td><?= $data_pemesan['telp'] ?></td>     
                                    <td><img src="<?= URL_WEB ?>assets/img/pemesan/<?= $data_pemesan['foto'] ?>" alt="<?= $data_pemesan['foto'] ?>" class="img-fluid" width="100"></td>
                               
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownAction" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                                <a class="dropdown-item text-primary" href="<?= URL_WEB ?>admin/masterdata-pemesan/edit-pemesan.php?id=<?= $data_pemesan['id'] ?>">Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:hapusData('masterdata-pemesan/delete-pemesan.php?id=<?= $data_pemesan['id'] ?>', 'pemesan');">Delete</a>
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