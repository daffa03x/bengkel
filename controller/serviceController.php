<?php
// Require koneksi dan model
require_once '../koneksi.php';
require_once '../models/Service.php';

// tangkap request dari form
$service = $_POST['service'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];
$kategori = $_POST['kategori'];
$tombol = $_POST['proses']; //tangkap tombol

// masukkan ke data array
$data = [
  $service, // ? 1  
  $harga, // ? 2
  $keterangan,  // ? 3
  $kategori
];

// ciptakan object dari class Motor
$obj = new Service();

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
    header('location:../index.php?hal=service/service');
}

// landing page
header('location:../index.php?hal=service/service');