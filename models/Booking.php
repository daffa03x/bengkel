<?php
class Booking{
    //member1 var
    public $koneksi;

    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi  
    }

    public function getSlug($id){
        // Membuat query select dan inner join untuk menggabungkan single data tabel yang akan ditampilkan
        $sql = "SELECT user.nama AS Customer, booking.user_id AS id_user ,booking.nota ,booking.id , booking.tgl_transaksi, service.nama AS service, service.harga, kategori_service.nama AS kategori_service, motor.nama AS motor, service.keterangan, kategori_motor.nama AS kategori_motor FROM booking
        INNER JOIN service ON service.id = booking.service_id
        INNER JOIN motor ON motor.id = booking.motor_id
        INNER JOIN kategori_service ON kategori_service.id = service.kategori_service_id
        INNER JOIN kategori_motor ON kategori_motor.id = motor.kategori_motor_id
        INNER JOIN user ON user.id = booking.user_id WHERE booking.id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getBooking(){
        // Membuat query select untuk tabel booking dan menampilkan all data
        $sql = "SELECT user.nama AS Customer , booking.user_id,booking.nota, booking.tgl_transaksi, service.nama AS service, service.harga, kategori_service.nama AS kategori_service, motor.nama AS motor, kategori_motor.nama AS kategori_motor, booking.id FROM booking
        INNER JOIN service ON service.id = booking.service_id
        INNER JOIN motor ON motor.id = booking.motor_id
        INNER JOIN kategori_service ON kategori_service.id = service.kategori_service_id
        INNER JOIN kategori_motor ON kategori_motor.id = motor.kategori_motor_id
        INNER JOIN user ON user.id = booking.user_id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    } 

    public function simpan($data){
        $sql = "INSERT INTO booking (nota,tgl_transaksi,service_id,motor_id,user_id) VALUES (?,?,?,?,?)";
        
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($data){
        $sql = "DELETE FROM booking WHERE id=?";

        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}