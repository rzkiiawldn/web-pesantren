<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- LINK BAWAAN TEMPLATE -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- AKHIR LINK -->
    <link rel="icon" href="<?= base_url('assets/admin/img/logo_ponpes.png') ?>">
</head>

<body>
    <div class="top py-1">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <p class="mb-0"><a href="#"><?= $informasi['email']; ?></a></p>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="<?= base_url('auth/login') ?>" class="d-flex align-items-center justify-content-center"><span>Login</span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-youtube"><i class="sr-only">Youtube</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-3 mb-md-0 mb-4 d-flex align-items-center">
                    <a class="navbar-brand" href="#"><img src="<?= base_url('assets/admin/img/informasi_web/' . $informasi['logo_website']); ?>" width="80px"></a>
                    <div>
                        <a class="navbar-brand" href="#"><?= $informasi['nama_website']; ?></a>
                        <p style="font-size: 14px;"><small><?= $informasi['moto']; ?></small></p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-8 mb-md-0 mb-3">
                            <div class="top-wrap d-flex">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-location-arrow"></span></div>
                                <div class="text"><span>ALAMAT</span><span><?= $informasi['alamat']; ?></span></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="top-wrap d-flex">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-phone"></span></div>
                                <div class="text"><span>Kontak kami</span><span><?= $informasi['nomor_telepon']; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir header -->