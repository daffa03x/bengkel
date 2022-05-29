<?php
class User{
    //member1 var
    public $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

        // Membuat function cek login dengan menggunakan WHERE untuk single data
    public function cekLogin($data){
        $sql = "SELECT * FROM user WHERE username = ? AND password = SHA1(?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }   
    
    // Membuat function query select dan menampilkan semua data
    public function getAll(){
        $sql = "SELECT * FROM user";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }         
}

?>