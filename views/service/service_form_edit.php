<?php
// Logic untuk user login dan berdasarkan role
 if(isset($user)){
     if($role != 'customer'){

$id = $_REQUEST['id'];

// Membuat object motor
$obj = new Service();

// Memanggil function tampil data
$data = $obj->getService($id);


 ?>

<div class="container-xxl py-5">
        <div class="container">
        <a href="index.php?hal=service/service"><img src="img/back.png" alt="" width="5%"></a>
            <div class="row g-0 d-flex justify-content-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5">
                        <p class="d-flex bg-dark text-primary py-1 px-4 justify-content-center">Form Edit <?= $data['service'] ?></p>
                        <form action="controller/serviceController.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" name="service" id="service" placeholder="Service" value="<?= $data['service'] ?>" required>
                                        <label for="service">service</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" name="harga" id="harga" placeholder="Harga" value="<?= $data['harga'] ?>" required>
                                        <label for="harga">Harga</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                 <textarea style="height: 100px" name="keterangan" class="form-control bg-transparent mb-30" placeholder="Keterangan"><?= $data['keterangan'] ?></textarea>
                                 <label for="keterangan">Keterangan</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select form-control bg-transparent text-center" id="kategori" name="kategori">
                                        <option >----- Pilih Kategori Motor -----</option>
                                            <option selected value="<?= $data['kategori_service_id'] ?>"><?= $data['kategori'] ?></option>
                                            <?php
                                            $ktg = new KategoriService();
                                            $rslt = $ktg->getAll();
                                            foreach($rslt as $ks){
                                            if($ks['id'] == $data['kategori_service_id']){
                                            ?>
                                            <?php }else{ ?>
                                            <option value="<?= $ks['id'] ?>"><?= $ks['nama'] ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="proses" value="ubah" type="submit">Update Service</button>
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