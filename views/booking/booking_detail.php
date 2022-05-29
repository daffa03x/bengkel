    <?php

    // Menangkap request id
    $id_bok = $_REQUEST['id'];

    // Membuat object booking
    $obj = new Booking();

    // Memanggil function untuk detail data
    $data = $obj->getSlug($id_bok);

    // Logic untuk harga service berdasarkan kategori motor
    $harga = $data['harga'];
    if($data['kategori_motor'] == 'Motor Sport'){
      $harga = $harga * 2;
    }
    
    ?>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <div class="w-50 bg-secondary p-5">
                            <h1 class="text-uppercase text-primary mb-3">Nota Booking</h1>
                            <h2 class="text-uppercase mb-0"><?= $data['nota'] ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">Detail Booking</p>
                    <h1 class="text-uppercase mb-4"><?= $data['service'] ?></h1>
                    <p>Customer : <?= $data['Customer'] ?></p>
                    <p>Tanggal Transaksi : <?= $data['tgl_transaksi'] ?></p>
                    <p>Biaya Service : Rp.<?= number_format($harga,2,",",".") ?></p>
                    <p class="mb-4">Estimasi Waktu : <?= $data['keterangan'] ?></p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3"><?= $data['kategori_service'] ?></h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3"><?= $data['kategori_motor'] ?></h3>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <?php if($id == $data['id_user'] || $role == 'admin'){ ?>
                                <form method="POST" action="controller/bookingController.php">
                                <button class="badge bg-primary me-2" style="border: 1px red solid; height: 40px" type="submit" name="proses" value="hapus" onclick="return confirm('Anda Yakin Akan Membatalkan Booking?')">Batalkan Booking</button>
                                <button class="badge bg-success" style="border: 1px green solid; height: 40px" type="submit" name="proses" value="hapus" onclick="return confirm('Anda Yakin Service Sudah Selesai?')">Selesai</button>
                                <input type="hidden" name="idx" value="<?= $id_bok ?>" />
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->