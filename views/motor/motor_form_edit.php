<?php
// Logic untuk user login dan berdasarkan role
 if(isset($user)){
     if($role != 'customer'){

$id = $_REQUEST['id'];

// Membuat object motor
$obj = new Motor();

// Memanggil function tampil data
$data = $obj->getMotor($id);


 ?>

<div class="container-xxl py-5">
        <div class="container">
        <a href="index.php?hal=motor/motor"><img src="img/back.png" alt="" width="5%"></a>
            <div class="row g-0 d-flex justify-content-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5">
                        <p class="d-flex bg-dark text-primary py-1 px-4 justify-content-center">Form Edit <?= $data['motor'] ?></p>
                        <form action="controller/motorController.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" name="motor" id="motor" value="<?= $data['motor'] ?>" placeholder="Motor" required>
                                        <label for="motor">Motor</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-transparent text-center" name="tgl" id="tgl" placeholder="Tanggal Pembuatan" value="<?= $data['tgl_pembuatan'] ?>" required>
                                        <label for="tgl">Tanggal Pembuatan</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select form-control bg-transparent text-center" id="kategori" name="kategori">
                                            <option >----- Pilih Kategori Motor -----</option>
                                            <option selected value="<?= $data['id_kategori'] ?>"><?= $data['kategori'] ?></option>
                                            <?php
                                            $ktg = new KategoriMotor();
                                            $rslt = $ktg->getAll();
                                            foreach($rslt as $km){
                                            if($km['id'] == $data['id_kategori']){
                                            ?>
                                            <?php }else{ ?>
                                            <option value="<?= $km['id'] ?>"><?= $km['nama'] ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="proses" value="ubah" type="submit">Update Motor</button>
                                    <input type="hidden" name="idx" value="<?= $id ?>">
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