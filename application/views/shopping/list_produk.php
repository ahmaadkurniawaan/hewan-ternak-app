<!-- ================ trending product section start ================= -->
<section class="section-margin calc-60px">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <a class="badge badge-pill  badge-secondary p-3 mr-2 active" href="<?= base_url() ?>shopping">Semua</a>
                <?php
                foreach ($kategori as $row) {
                ?>
                    <a class="badge badge-pill  badge-secondary p-3 mr-2 active" href="<?php echo base_url() ?>shopping/index/<?= $row['id']; ?>"><?= $row['nama_kategori']; ?></a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($hewan)) {
                foreach ($hewan as $hwn) {
            ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <form method="post" action="<?php echo base_url(); ?>shopping/tambah" method="post" accept-charset="utf-8">
                                    <img class="card-img" src="<?= base_url() ?>uploads/hewan/<?= $hwn['img_hewan'] ?>" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li><a class="btn btn-light" href="<?= base_url() ?>shopping/detail_produk/<?= $hwn['idhewan']; ?>"><i class="ti-eye"></i></a></li>
                                        <li><button type="submit" class="btn btn-primary"><i class="ti-shopping-cart"></i></button></li>
                                        <!-- <li><a class="btn btn-primary" href=""><i class="ti-shopping-cart"></i></a></li> -->
                                        <li><a class="btn btn-light" href="<?= $hwn['link_alamat']; ?>"><i class="ti-map-alt"></i></a></li>
                                    </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="card-product__title"><a href="#"><?= $hwn['nama_hewan']; ?></a></h4>
                                <small><?= word_limiter($hwn['deskripsi'], 15); ?></small>
                                <p class="card-product__price">Rp.<?= $hwn['harga']; ?></p>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $hwn['idhewan']; ?>" />
                            <input type="hidden" name="nama" value="<?php echo $hwn['nama_hewan']; ?>" />
                            <input type="hidden" name="harga" value="<?php echo $hwn['harga']; ?>" />
                            <input type="hidden" name="gambar" value="<?php echo $hwn['img_hewan']; ?>" />
                            <input type="hidden" name="qty" value="1" />
                            </form>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "";
            }
            ?>
        </div>
    </div>
</section>
<!-- ================ trending product section end ================= -->