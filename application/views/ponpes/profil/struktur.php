<section class="hero-wrap hero-wrap-2" style="background-image:url(../../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url('welcome'); ?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span><?= $title; ?> <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <?php foreach ($profil as $p) : ?>
            <div class="row d-flex no-gutters">
                <div class="col-md-10 d-flex">
                    <img src="<?= base_url('assets/admin/img/profil/' . $p['struktur_organisasi']) ?>" alt="foto pengasuh" class="img-fluid my-3" width="80%">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>