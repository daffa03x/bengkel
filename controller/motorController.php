<?php
// Require koneksi dan model
require_once '../koneksi.php';
require_once '../models/Motor.php';

// tangkap request dari form
$motor = $_POST['motor'];
$tgl = $_POST['tgl'];
$kategori = $_POST['kategori'];
$tombol = $_POST['proses']; //tangkap tombol

// masukkan ke data array
$data = [
  $motor, // ? 1  
  $tgl, // ? 2
  $kategori  // ? 3
];

// ciptakan object dari class Motor
$obj = new Motor();

//logic untuk tombol
switch ($tombol) {
    case 'simpan': $obj->simpan($data); break;    
    case 'ubah':
        $data[]=$_POST['idx'];
        $obj->ubah($data);
        break; 
    case 'hapus':
        unset($data);
        $data[]=$_POST['idx'];
        $obj->hapus($data);
        break;
        default:   
    header('location:../index.php?hal=motor/motor');
}

// landing page
header('location:../index.php?hal=motor/motor');