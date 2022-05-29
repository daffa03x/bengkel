<?php
// Require koneksi dan model
require_once '../koneksi.php';
require_once '../models/Booking.php';

// tangkap request dari form
$nota = $_POST['nota'];
$tgl = $_POST['tgl_transaksi'];
$service = $_POST['service'];
$motor = $_POST['motor'];
$user = $_POST['id_user'];
$tombol = $_POST['proses']; //tangkap tombol

// masukkan ke data array
$data = [
  $nota, // ? 1  
  $tgl, // ? 2
  $service,  // ? 3
  $motor,
  $user
];

// ciptakan object dari class Motor
$obj = new Booking();

//logic untuk tombol
switch ($tombol) {
    case 'simpan': $obj->simpan($data); break; 
    case 'hapus':
      unset($data);
      $data[]=$_POST['idx'];   
      $obj->hapus($data);
      break;   
        default:   
    header('location:../index.php?hal=booking/booking');
}

// landing page
header('location:../index.php?hal=booking/booking');