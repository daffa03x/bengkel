<div class="container-xxl py-5">
<div class="container">
<a href="index.php?hal=home"><img src="img/back.png" alt="" width="5%"></a>
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    <p class="d-inline-block bg-secondary text-primary py-1 px-4">Motor</p>
    <h1 class="text-uppercase">Daftar Motor Bengkel Daffa</h1>
</div>
    <div class="row g-0">
        <?php
        // Membuat object class motor
        $obj = new Motor();

        // Memanggil function getAll
        $rs = $obj->getAll();

        // Looping data object berupa array
        foreach($rs as $m){
        ?>
        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
            <div class="card text-white bg-secondary mb-3 mx-4">
            <div class="card-header"><?= $m['motor'] ?></div>
            <div class="card-body">
                <h5 class="card-title">Kategori : <?= $m['kategori'] ?></h5>
                <p class="card-text">Tanggal Pembuatan : <?= $m['tgl_pembuatan'] ?></p>
                <?php
                // Logic untuk user login dan berdasarkan role
                if(isset($user)){
                    if($role != 'customer' && $role != 'staff'){
                ?>
                <form method="POST" action="controller/motorController.php">
                <a id="edit_motor" class="badge bg-info" style="border: 1px aqua solid;" href="index.php?hal=motor/motor_form_edit&id=<?= $m['id'] ?>"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                <button class="badge bg-primary" style="border: 1px red solid;" type="submit" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data dihapus?')"><i class="fas fa-trash-alt"></i></button>
                <input type="hidden" name="idx" value="<?= $m['id'] ?>" />
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
    <div class="d-flex justify-content-center mt-3">
    <a href="index.php?hal=motor/motor_form_input" class="justify-content-center btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-inline me-5">Tambah Motor &nbsp;<i class="fas fa-plus"></i>
    </a>
    </div>
<?php }} ?>
</div>
</div>