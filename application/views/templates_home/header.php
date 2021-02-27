<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hewan Ternak Indonesia</title>
    <link rel="icon" href="<?= base_url() ?>vendor/assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/library/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/library/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/library/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/library/nice-select/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/library/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/library/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>vendor/Assets/css/style.css">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="<?= base_url() ?>"><img src="<?= base_url() ?>vendor/assets/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    $uri = $this->uri->segment(1);
                    ?>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto ">
                            <li class="nav-item <?php if ($uri == 'home') { ?>active<?php } ?>"><a class="nav-link" href="<?= base_url() ?>home">Home</a></li>
                            <li class="nav-item <?php if ($uri == 'shopping') { ?>active<?php } ?>"><a class="nav-link" href="<?= base_url() ?>shopping">Hewan Ternak</a></li>
                            <li class="nav-item <?php if ($uri == 'kontak') { ?>active<?php } ?>"><a class="nav-link" href="<?= base_url() ?>kontak">Kontak</a></li>

                        </ul>
                        <!-- Hitung Cart Item -->
                        <?php
                        $cart = $this->cart->contents();
                        if (empty($cart)) {
                            $cart = 0;
                        ?>
                            <?php
                        } else {
                            $item_cart = 0;
                            foreach ($cart as $item) {
                                $item_cart = $item_cart + $item['qty'];
                            ?>
                            <?php
                            }
                            ?>

                        <?php
                        }
                        ?>
                        <!-- End Hitung Cart Item -->

                        <ul class="nav-shop">
                            <li class="nav-item "> <button><a href="<?= base_url() ?>shopping/tampil_cart"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">
                                            <?php
                                            if ($cart != 0) { ?>

                                                <?= $item_cart; ?>

                                            <?php
                                            } else {
                                            ?>
                                                <?= $cart; ?>
                                            <?php
                                            }
                                            ?>


                                        </span></a></button>
                            </li>
                        </ul>
                    </div>

                </div>
        </div>
        </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->