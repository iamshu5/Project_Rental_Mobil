<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

// konfigurasi database
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'project_rental_mobil';

// konfigurasi alamat web
const URL_WEB = 'http://Project_Rental_Mobil.test/';

// koneksi ke database
$koneksi = mysqli_connect('localhost', DB_USER, DB_PASSWORD, DB_NAME);
if( !$koneksi ) {
    echo 'Koneksi ke database gagal!!';
    die;
}
?>