<section class="hero-wrap hero-wrap-2" style="background-image:url(../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
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

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php foreach ($prestasi as $p) { ?>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a class="block-20 rounded" style="background-image: url('../assets/admin/img/siswa_prestasi/<?= $p['foto'] ?>');">
                        </a>
                        <div class="text mt-3">
                            <h3 class="heading text-capitalize"><a href="<?= base_url('ponpes/siswa_prestasi/detail/' . $p['id_prestasi']); ?>"><?= $p['nama_siswa']; ?></a></h3>
                            <p><?= nl2br(word_limiter($p['keterangan'], 6)); ?>.</p>
                            <p><a href="<?= base_url('ponpes/siswa_prestasi/detail/' . $p['id_prestasi']); ?>" class="btn btn-primary">Selengkapnya</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>