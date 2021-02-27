<main class="site-main">

    <!--================ Hero banner start =================-->
    <section>
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                foreach ($slider as $key => $value) {
                    $active = ($key == 0) ? 'active' : '';
                    echo '<li data-target="#slider" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                $i = 0;
                if (isset($slider)) {
                    foreach ($slider as $slide) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        } {
                ?>
                            <div class="carousel-item <?= $actives ?>">
                                <img class="img-fluid" src="<?= base_url() ?>uploads/slider/<?= $slide['img_slider']; ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php $i++;
                        } ?>
                <?php
                    }
                } else {
                    echo "";
                } ?>

            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!--================ Hero banner start =================-->


    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Dapatkan Pilihan Hewan Ternak Terbaru</p>
                <h2>Hewan Ternak <span class="section-intro__style">Popular</span></h2>
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
                                            <li><button type="submit" class="btn btn-light"><i class="ti-shopping-cart"></i></button></li>
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

    <!-- ================ Subscribe section start ================= -->
    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">SUBSCIBE</h3>
                <p>Masukan Email Anda Untuk Mendapatkan Update</p>

                <div id="mc_embed_sign">
                    <form action="<?= base_url() ?>shopping/subscribe" method="POST" class="subscribe-form form-inline mt-5 pt-1">
                        <div class="form-group ml-sm-auto">
                            <input class="form-control mb-1" type="email" name="email" placeholder="Masukan Email...">
                            <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                        </div>
                        <button class="button button-subscribe mr-auto mb-1" type="submit">Ikuti Sekarang</button>

                    </form>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ================ Subscribe section end ================= -->



</main>