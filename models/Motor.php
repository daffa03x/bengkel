<?php
class Motor{
    //member1 var
    public $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

    public function getAll(){
        // Membuat query select untuk memampilkan data motor
        $sql = "SELECT motor.id, motor.kategori_motor_id AS id_kategori, motor.nama AS motor, motor.tgl_pembuatan,kategori_motor.nama AS kategori FROM motor
        INNER JOIN kategori_motor ON kategori_motor.id = motor.kategori_motor_id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data){
        // Membuat query untuk insert data motor
        $sql = "INSERT INTO motor (nama,tgl_pembuatan,kategori_motor_id) VALUES (?,?,?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }   

    public function getMotor($id){
        // Query select untuk mengambil single menggunakan WHERE
        $sql = "SELECT motor.id, motor.kategori_motor_id AS id_kategori, motor.nama AS motor, motor.tgl_pembuatan,kategori_motor.nama AS kategori FROM motor
        INNER JOIN kategori_motor ON kategori_motor.id = motor.kategori_motor_id WHERE motor.id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function ubah($data){
        // Membuat query update data motor
        $sql = "UPDATE motor SET nama=?, tgl_pembuatan=?, kategori_motor_id=? WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }    

        public function hapus($data){
        // Membuat query hapus data motor
        $sql = "DELETE FROM motor WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }   
}