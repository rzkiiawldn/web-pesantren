<!-- Slider -->
<div class="hero-wrap">
    <div class="home-slider owl-carousel">
        <?php foreach ($slider as $s) { ?>
            <div class="slider-item img-fluid" style="background-image:url(../assets/admin/img/slider/<?= $s['foto']; ?>);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-end">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Akhir slider -->
<!-- Sambutan -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-3 mb-2">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Sambutan</h2>
            </div>
        </div>
        <?php foreach ($sambutan as $s) { ?>
            <div class="row dept">
                <div class="col-md-5 img" style="background-image: url(../assets/admin/img/sambutan/<?= $s['foto'] ?>);"></div>
                <div class="col-md-7 pl-md-5 order-md-last">
                    <p style="font-size: 16px;"><?= nl2br($s['isi_sambutan']); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Akhir sambutan -->

<!-- Informasi sekolah -->
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
        </div>
    </div>
</section>

<!-- Awal Berita dan Galeri -->
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-8 ftco-animate mb-5 pr-md-3 py-md-3">
                <div class="row justify-content-start py-5">
                    <div class="d-block d-flex">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4">Berita <?= $informasi['nama_website']; ?></h2><br>
                            <div class="row justify-content-start">
                                <div class="col-md-12">
                                    <?php foreach ($berita as $b) { ?>
                                        <div class="media">
                                            <a href="<?= base_url('madrasah/berita/lihat_berita/' . $b['id_berita']) ?>"><img src="<?= base_url('assets/admin/img/berita/' . $b['foto_berita']); ?>" class="mr-4" alt="foto berita" width="100px"></a>
                                            <div class="media-body">
                                                <h5 class="heading mt-0 text-capitalize"><?= $b['judul_berita']; ?></h5>
                                                <p class="mb-0"><?= nl2br(word_limiter($b['isi_berita'], 4)); ?></p>
                                                <p><a href="<?= base_url('madrasah/berita/lihat_berita/' . $b['id_berita']); ?>" class="btn-custom">Selengkapnya..</a></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pr-md-3 py-md-3">
                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">Galeri <?= $informasi['nama_website']; ?></h2>
                        <div class="row">
                            <div class="col">
                                <?php foreach ($galeri as $g) { ?>
                                    <img src="<?= base_url('assets/admin/img/galeri/' . $g['foto']) ?>" class="img-fluid ml-1 mb-2" width="150px" alt="">
                                <?php } ?>
                            </div>
                        </div>
                        <a href="<?= base_url('madrasah/galeri') ?>">Selengkapnya..</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Akhir Berita dan Galeri -->