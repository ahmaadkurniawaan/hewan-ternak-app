  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
      <div class="container">
          <?php
            if ($cart = $this->cart->contents()) {
            ?>
              <div class="billing_details">
                  <div class="row">
                      <div class="col-md-8">
                          <h3>Lengkapi Data Anda</h3>
                          <form action="<?php echo base_url() ?>shopping/proses_order" method="post" name="frmCO" id="frmCO">
                              <div class="form-group  has-success has-feedback">

                                  <div class="col-xs-9">
                                      <input type="email" class="form-control" name="email" id="email" placeholder="Email Aktif" required>
                                  </div>
                              </div>
                              <div class="form-group  has-success has-feedback">
                                  <div class="col-xs-9">
                                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                  </div>
                              </div>
                              <div class="form-group  has-success has-feedback">
                                  <div class="col-xs-9">
                                      <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                  </div>
                              </div>
                              <div class="form-group  has-success has-feedback">
                                  <div class="col-xs-9">
                                      <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telpone">
                                  </div>
                              </div>
                              <div class="form-group  has-success has-feedback">
                                  <div class="col-xs-9">
                                      <textarea type="tel" class="form-control" name="pesan" id="pesan" placeholder="Pesan tambahan.."></textarea>
                                  </div>
                              </div>

                              <div class="form-group  has-success has-feedback">
                                  <div class="col-xs-offset-3 col-xs-9">
                                      <button type="submit" class="btn btn-primary">Proses Order</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>

              </div>
      </div>
  <?php

            } else {
                echo "";
            }
    ?>
  </div>
  </section>
  <!--================End Checkout Area =================-->