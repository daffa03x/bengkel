<div class="container-xxl py-5">
<div class="container">
<a href="index.php?hal=home"><img src="img/back.png" alt="" width="5%"></a>
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    <p class="d-inline-block bg-secondary text-primary py-1 px-4">Booking</p>
    <h1 class="text-uppercase">Daftar Booking Bengkel Daffa</h1>
</div>
<table class="table table-primary text-center">
  <thead>
    <tr>
      <th scope="col">No Antrian</th>
      <th scope="col">Motor</th>
      <th scope="col">Service</th>
      <th scope="col" colspan="2">Kategori Service</th>
    </tr>
  </thead>
  <tbody>
        <?php
        // Membuat object booking
        $obj = new Booking();

        // Memanggil function untuk menampilkan data booking
        $rs = $obj->getBooking();
        $no = 1;
        // Looping data object
        foreach($rs as $b){
        ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $b['motor'] ?></td>
      <td><?= $b['service'] ?></td>
      <td><?= $b['kategori_service'] ?></td>
      <?php
                    if(isset($user)){
                      if($id == $b['user_id'] || $role == 'admin' || $role == 'owner'){
                    ?>
      <td><a class="badge bg-primary" href="index.php?hal=booking/booking_detail&id=<?= $b['id'] ?>">Details</a></td>
      <?php }} ?>
    </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>
<?php if(isset($user)){ 
  ?>
<div class="d-flex justify-content-center mt-5">
    <a href="index.php?hal=booking/booking_form" class="justify-content-center btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-inline me-5">Booking Sekarang &nbsp;<i class="fas fa-arrow-alt-circle-right"></i>
 </a>
</div>
<?php } ?>
</div>
</div>