<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">



        <form action="<?= base_url() ?>shopping/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
            <div class="cart_inner">
                <?php
                if ($cart = $this->cart->contents()) {
                ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Hewan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col" class="text-center">Batalkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grand_total = 0;
                                $total_item = 0;
                                foreach ($cart as $item) {
                                    $grand_total = $grand_total + $item['subtotal'];
                                    $total_item = $total_item + $item['qty'];

                                ?>

                                    <!-- Input Cart -->
                                    <input type="hidden" name="cart[<?= $item['id']; ?>][id]" value="<?= $item['id']; ?>" />
                                    <input type="hidden" name="cart[<?= $item['id']; ?>][rowid]" value="<?= $item['rowid']; ?>" />
                                    <input type="hidden" name="cart[<?= $item['id']; ?>][name]" value="<?= $item['name']; ?>" />
                                    <input type="hidden" name="cart[<?= $item['id']; ?>][price]" value="<?= $item['price']; ?>" />
                                    <input type="hidden" name="cart[<?= $item['id']; ?>][gambar]" value="<?= $item['gambar']; ?>" />
                                    <input type="hidden" name="cart[<?= $item['id']; ?>][qty]" value="<?= $item['qty']; ?>" />
                                    <!-- End Input Cart -->

                                    <!-- Hitung Qty Dan jumlahkan -->
                                    <tr class="d-none">
                                        <a class="list-group-item d-none"><?= $item['name']; ?> (<?= $item['qty']; ?> x <?= number_format($item['price'], 0, ",", "."); ?>)=<?= number_format($item['subtotal'], 0, ",", "."); ?></a>
                                    </tr>
                                    <!-- End Hitung Qty Dan jumlahkan -->
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img style="width: 75px;" src="<?= base_url() ?>uploads/hewan/<?= $item['gambar'] ?>" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $item['name']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= number_format($item['price'], 0, ",", "."); ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="text" name="cart[<?= $item['id']; ?>][qty]" id="qty" maxlength="12" value="<?= $item['qty']; ?>" title="Quantity:" class="input-text qty">
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= number_format($item['subtotal'], 0, ",", ".") ?></h5>
                                        </td>
                                        <td class="text-center"> <a class="badge badge-danger p-2 text-light" href="<?= base_url() ?>shopping/hapus/<?= $item['rowid']; ?>"><i class="ti-close"></i></a> </td>
                                    </tr>


                                <?php
                                }
                                ?>
                                <tr class="bottom_button">
                                    <td>
                                        <button class="button" type="submit">Update Cart</button>
                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5 class="pl-4"><?= $total_item; ?></h5>
                                    </td>
                                    <td>
                                        <h5>Rp.<?= number_format($grand_total, 0, ",", "."); ?></h5>
                                    </td>
                                    <td>

                                    </td>
                                </tr>





                                <tr class="out_button_area">
                                    <td class="d-none-l"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex justify-content-end">
                                            <a class="gray_btn text-danger" href="<?= base_url() ?>shopping/hapus/all" onclick="return confirm('Apakah anda yakin ingin menghapus !');">Hapus Keranjang</a>
                                            <a class="primary-btn ml-2" href="<?= base_url() ?>shopping/check_out">Proses checkout</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php

                } else {
                    echo "<h3>Keranjang Belanja masih kosong</h3>";
                }
                ?>
            </div>
        </form>
    </div>
</section>
<!--================End Cart Area =================-->