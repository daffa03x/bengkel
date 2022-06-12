<?php
// Logic untuk user login dan berdasarkan role
 if(isset($user)){
     if($role != 'customer'){
 ?>

<div class="container-xxl py-5">
        <div class="container">
        <a href="index.php?hal=motor/motor"><img src="img/back.png" alt="" width="5%"></a>
            <div class="row g-0 d-flex justify-content-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5">
                        <p class="d-flex bg-dark text-primary py-1 px-4 justify-content-center">Form Tambah Data Motor</p>
                        <form action="controller/motorController.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" name="motor" id="motor" placeholder="Motor" required>
                                        <label for="motor">Motor</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-transparent text-center" name="tgl" id="tgl" placeholder="Tanggal Pembuatan" required>
                                        <label for="tgl">Tanggal Pembuatan</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select form-control bg-transparent text-center" id="kategori" name="kategori">
                                            <option selected>----- Pilih Kategori Motor -----</option>
                                            <?php 
                                            // Membuat object motor
                                            $obj = new KategoriMotor();

                                            // Memanggil function tampil data
                                            $rs = $obj->getAll();

                                            // Looping data object motor
                                            foreach($rs as $m){
                                            ?>

                                            <!-- Value kategori berdasarkan id dan tampilan berdasarkan nama kategori -->
                                            <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="proses" value="simpan" type="submit">Tambah Motor</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    }
        else{ include_once 'views/terlarang.php'; }
 }
 else{
    include_once 'views/terlarang.php';    
 }   
 ?>