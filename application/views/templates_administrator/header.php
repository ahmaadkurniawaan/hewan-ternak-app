<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>vendor/assets/img/favicon.png" type="image/png">
    <title> <?= $title; ?> </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js">
    <link rel="stylesheet" href=" <?= base_url(); ?>./vendor/css/dashboard.css">
    <link rel="stylesheet" href=" <?= base_url(); ?>./vendor/css/custom.css">
    <script src="<?= base_url(); ?>./vendor/js/dashboard.js"></script>
    <script src="<?= base_url(); ?>./vendor/js/feather.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 ">
        <a class="navbar-brand text-dark bg-white col-md-3 col-lg-2 mr-0 px-3" href=" <?= base_url(); ?> ">
            <img src=" <?= base_url() ?>./vendor/Assets/img/logo.png" alt="">
        </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed text-dark" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="text-dark" data-feather="align-right"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <small class="mr-2 " data-feather="bell"> </small>
                <!-- <img src="<?= base_url() ?>./vendor/Assets/img/login.jpg" class="mr-3" alt="image"> -->
                <small>&rarr;Kang Jhoe</small>
            </li>
        </ul>

    </nav>