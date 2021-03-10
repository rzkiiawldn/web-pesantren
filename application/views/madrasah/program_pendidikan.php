<section class="hero-wrap hero-wrap-2" style="background-image:url(../../../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2 text-capitalize"><span class="mr-2"><a href="<?= base_url('welcome') ?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span><?= $informasi['nama_website']; ?> <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread"><?= $informasi['nama_pendidikan']; ?></h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-8 pr-md-5 py-md-5">
                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Selamat datang</span>
                        <h2 class="mb-4"><?= $informasi['nama_pendidikan']; ?></h2>
                        <p><?= nl2br($informasi['keterangan_pendidikan']); ?>.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pr-md-5 py-md-5">
                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">Galeri <?= $informasi['nama_pendidikan']; ?></h2>
                        <div class="row">
                            <div class="col">
                                <?php foreach ($galeri as $g) { ?>
                                    <img src="<?= base_url('assets/admin/img/galeri/' . $g['foto']) ?>" class="img-fluid ml-1 mb-2" width="150px" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>