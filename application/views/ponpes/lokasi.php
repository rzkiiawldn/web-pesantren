<!-- <section class="hero-wrap hero-wrap-2" style="background-image:url(../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url('welcome'); ?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span><?= $title; ?> <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</section> -->


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-12 pr-md-5 py-md-5">
                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section ftco-animate text-center">
                        <h2 class="mb-4"><?= $title; ?></h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507452.47728319827!2d106.58586350089395!3d-6.4616674857551475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b3ad5a16b5c9%3A0xef1f7c1bf5bf4d99!2sPondok%20Pesantren%20Asshiddiqiyah%2010%20Cianjur!5e0!3m2!1sid!2sid!4v1614653671224!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="row justify-content-start py-5">
                    <div class="col-md-8 heading-section ftco-animate mb-4">
                        <h2 class="mb-3">Alamat</h2>
                        <p><?= $informasi['alamat']; ?></p>
                    </div>
                    <div class="col-md-4 heading-section ftco-animate">
                        <h2 class="mb-3">Scan Barcode</h2>
                        <img src="<?= base_url('assets/admin/img/1.jpg') ?>" alt="barcode" class="img-fluid" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>