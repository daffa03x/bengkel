<?php
// Memulai session
session_start();

// Memanggil koneksi dan model
require_once '../koneksi.php';
require_once '../models/User.php';

// tangkap request dari form
$user = $_POST['username'];
$pass = $_POST['password'];

// masukkan ke data array
$data = [
  $user, // ? 1
  $pass  // ? 2
];

//. ciptakan object dari class User
$obj = new User();

// Memanggil function cek login 
$rs = $obj->cekLogin($data);

// Melakukan logic object user
if(!empty($rs)){
    $_SESSION['USER'] = $rs;
    header('location:../index.php?hal=booking/booking');
}else{
    header('location:index.php?hal=gagal_login');
}    