<?php
require '../../config.php';

$id_pemesan = $_GET['id'] ?? '';
$cek_pemesan = mysqli_query($koneksi, "SELECT foto FROM tabel_pemesan WHERE id = '$id_pemesan'");
if( mysqli_num_rows($cek_pemesan) > 0 ) {
    $data_pemesan = mysqli_fetch_assoc($cek_pemesan);
    @unlink('../../assets/img/pemesan/' . $data_pemesan['foto']);
}

mysqli_query($koneksi, "DELETE FROM tabel_pemesan WHERE id = '$id_pemesan'");
header('Location: data-pemesan.php');