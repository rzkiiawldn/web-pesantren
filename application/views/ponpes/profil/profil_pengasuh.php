<section class="hero-wrap hero-wrap-2" style="background-image:url(../../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url('welcome') ?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span><?= $title; ?> <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <?php foreach ($profil as $p) : ?>
            <div class="row d-flex no-gutters">
                <div class="col-md-4 d-flex mr-5">
                    <img src="<?= base_url('assets/admin/img/profil/' . $p['foto_pengasuh']) ?>" alt="foto pengasuh" class="img-fluid my-3" width="80%">
                </div>
                <div class="col-md-6 pr-md-5 py-md-5">
                    <div class="row justify-content-start py-5">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4"><?= $title; ?></h2>
                            <p style="font-size: 16px" class="text-justify"><?= nl2br($p['profil_pengasuh']); ?>.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>