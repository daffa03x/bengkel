<?php
class Service{
    //member1 var
    public $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

    public function getAll(){
        // Query select pada tabel service dan inner join kategori service
        $sql = "SELECT service.id, service.nama AS service, service.harga, service.keterangan , service.kategori_service_id, kategori_service.nama AS kategori FROM service
        INNER JOIN kategori_service ON kategori_service.id = service.kategori_service_id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    } 

    public function simpan($data){
        // Membuat query untuk insert data motor
        $sql = "INSERT INTO service (nama,harga,keterangan,kategori_service_id) VALUES (?,?,?,?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }   

    public function getService($id){
        // Query select pada tabel service dan inner join kategori service
        $sql = "SELECT service.id, service.nama AS service, service.harga, service.keterangan , service.kategori_service_id, kategori_service.nama AS kategori FROM service
        INNER JOIN kategori_service ON kategori_service.id = service.kategori_service_id WHERE service.id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function ubah($data){
        // Membuat query update data motor
        $sql = "UPDATE service SET nama=?, harga=?, keterangan=?, kategori_service_id=? WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }    

        public function hapus($data){
        // Membuat query hapus data motor
        $sql = "DELETE FROM service WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }   
}