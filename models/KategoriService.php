<?php
class KategoriService{
    //member1 var
    public $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

    public function getAll(){
        // Membuat query select untuk memampilkan data kategori service
        $sql = "SELECT * FROM kategori_service";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

}