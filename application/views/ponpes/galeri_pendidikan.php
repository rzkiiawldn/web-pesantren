<section class="hero-wrap hero-wrap-2" style="background-image:url(../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url('ponpes/program_pendidikan/index/' . $informasi['id_program']) ?>"><?= $informasi['nama_pendidikan']; ?> <i class="fa fa-chevron-right"></i></a></span> <span><?= $title; ?> <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container px-md-0">
        <div class="row no-gutters">
            <?php foreach ($galeri as $g) { ?>
                <div class="col-md-3 col-4 mr-2 mb-2 ftco-animate">
                    <div class="work img d-flex align-items-center" style="background-image: url(../assets/admin/img/galeri/<?= $g['foto'] ?>);">
                        <a href="<?= base_url('assets/admin/img/galeri/' . $g['foto']) ?>" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>