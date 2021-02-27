<!--================Single Product Area =================-->
<div class="product_image_area">
    <form method="post" action="<?php echo base_url(); ?>shopping/tambah" method="post" accept-charset="utf-8">
        <div class="container">

            <div class="row s_product_inner">

                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="<?= base_url() ?>uploads/hewan/<?= $detail['img_hewan'] ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3><?= $detail['nama_hewan']; ?></h3>
                        <h2>Rp. <?php echo number_format($detail['harga'], 0, ",", "."); ?></h2>
                        <ul class="list">
                            <li><a class="active" href=""><span>Kategori</span> : <?= $detail['nama_kategori']; ?></a></li>
                            <li><a href="#"><span>Ketersediaan</span> : <?= $detail['stok']; ?></a></li>
                        </ul>
                        <p><?= $detail['deskripsi']; ?></p>
                        <div class="product_count">

                        </div>
                        <input type="hidden" name="id" value="<?php echo $detail['idhewan']; ?>" />
                        <input type="hidden" name="nama" value="<?php echo $detail['nama_hewan']; ?>" />
                        <input type="hidden" name="harga" value="<?php echo $detail['harga']; ?>" />
                        <input type="hidden" name="gambar" value="<?php echo $detail['img_hewan']; ?>" />
                        <input type="hidden" name="qty" value="1" />
                        <button class="badge badge-pill badge-primary border-0 p-3 mt-3" type="submit">Masukan keranjang<i class="ti-shopping-cart pl-2"></i></button>
    </form>
</div>
</div>
</div>
</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Kondisi Hewan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#maps" role="tab" aria-controls="maps" aria-selected="false">Maps Alamat</a>
            </li>
        </ul>
        <div class="tab-content " id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p><?= $detail['deskripsi']; ?></p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Berat</h5>
                                </td>
                                <td>
                                    <h5><?= $detail['berat']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Umur</h5>
                                </td>
                                <td>
                                    <h5><?= $detail['umur']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Jenis Kelamin</h5>
                                </td>
                                <td>
                                    <h5><?= $detail['kelamin']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Kondisi</h5>
                                </td>
                                <td>
                                    <h5><?= $detail['kondisi']; ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Alamat</h5>
                                </td>
                                <td>
                                    <h5><?= $detail['alamat']; ?></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="maps" role="tabpanel" aria-labelledby="profile-tab">
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?<?= $detail['link_alamat']; ?>" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================End Product Description Area =================-->