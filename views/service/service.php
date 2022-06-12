<!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
        <a href="index.php?hal=home"><img src="img/back.png" alt="" width="5%"></a>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Services</p>
                <h1 class="text-uppercase">Daftar Service Bengkel Daffa</h1>
            </div>
            <div class="row g-4">
                <?php
                // Membuat object service
                $obj = new Service();

                // Memanggil function getAll
                $rs = $obj->getAll();

                // Looping data service
                foreach($rs as $s){
                ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3"><?= $s['service'] ?></h3>
                            <h3 class="text-uppercase mb-3"><?= $s['kategori'] ?></h3>
                            <p><?= $s['keterangan'] ?></p>
                            <?php
                            // Logic untuk user login dan berdasarkan role
                            if(isset($user)){
                                if($role != 'customer' && $role != 'staff'){
                            ?>
                            <form method="POST" action="controller/serviceController.php">
                            <a id="edit_motor" class="badge bg-info" style="border: 1px aqua solid;" href="index.php?hal=service/service_form_edit&id=<?= $s['id'] ?>"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                            <button class="badge bg-primary" style="border: 1px red solid;" type="submit" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data dihapus?')"><i class="fas fa-trash-alt"></i></button>
                            <input type="hidden" name="idx" value="<?= $s['id'] ?>" />
                            </form>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php
            // Logic untuk user login dan berdasarkan role
            if(isset($user)){
                if($role != 'customer' && $role != 'staff'){
            ?>
            <div class="d-flex justify-content-center mt-5">
            <a href="index.php?hal=service/service_form_input" class="justify-content-center btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-inline me-5">Tambah Service &nbsp;<i class="fas fa-plus"></i>
            </a>
            </div>
            <?php }} ?>
        </div>
    </div>
    <!-- Service End -->