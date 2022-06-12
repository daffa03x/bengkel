<?php
    // Membuat object booking
    $obj = new Booking();
    $rsbok = $obj->getBooking();

    $baris = count($rsbok)+1;
// Logic untuk user login dan berdasarkan role
 if(isset($user)){
 ?>

<div class="container-xxl py-5">
        <div class="container">
        <a href="index.php?hal=booking/booking"><img src="img/back.png" alt="" width="5%"></a>
            <div class="row g-0 d-flex justify-content-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5">
                        <p class="d-flex bg-dark text-primary py-1 px-4 justify-content-center">Form Booking</p>
                        <form action="controller/bookingController.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="hidden" class="form-control bg-transparent" name="nota" id="nota" value="N<?= $id.$baris.mt_rand(1,999) ?>">
                                        <input type="hidden" class="form-control bg-transparent" name="id_user" id="id_user" value="<?= $id ?>">
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-transparent" name="tgl_transaksi" id="tgl_transaksi" placeholder="Tanggal Transaksi" required>
                                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select form-control bg-transparent text-center" id="service" name="service">
                                            <option selected>----- Pilih Service -----</option>
                                            <?php 
                                            // Membuat object motor
                                            $ser = new Service();

                                            // Memanggil function tampil data
                                            $rsser = $ser->getAll();

                                            // Looping data object motor
                                            foreach($rsser as $s){
                                            ?>

                                            <!-- Value kategori berdasarkan id dan tampilan berdasarkan nama kategori -->
                                            <option value="<?= $s['id'] ?>"><?= $s['service'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select form-control bg-transparent text-center" id="motor" name="motor">
                                            <option selected>----- Pilih Motor -----</option>
                                            <?php 
                                            // Membuat object motor
                                            $mot = new Motor();

                                            // Memanggil function tampil data
                                            $rsmot = $mot->getAll();

                                            // Looping data object motor
                                            foreach($rsmot as $m){
                                            ?>

                                            <!-- Value kategori berdasarkan id dan tampilan berdasarkan nama kategori -->
                                            <option value="<?= $m['id'] ?>"><?= $m['motor'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="proses" value="simpan" type="submit">Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php     
 }else{
    include_once 'views/terlarang.php';    
 }   
 ?>