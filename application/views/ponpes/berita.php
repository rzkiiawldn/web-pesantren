<section class="hero-wrap hero-wrap-2" style="background-image:url(../assets/admin/img/informasi_web/<?= $informasi['background'] ?>);" data-stellar-background-ratio="0.5">
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

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php foreach ($berita as $b) { ?>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="#" class="block-20 rounded" style="background-image: url(../assets/admin/img/berita/<?= $b['foto_berita']; ?>);">
                        </a>
                        <div class="text mt-3">
                            <div class="posted mb-3 d-flex">
                                <div class="desc pl-3">
                                    <span>Penulis : <?= $b['pengirim_berita']; ?></span>
                                    <span><?= $b['tanggal_input']; ?></span>
                                    <span>Views : <?= $b['views']; ?></span>
                                </div>
                            </div>
                            <h3 class="heading text-capitalize"><?= $b['judul_berita']; ?></h3>
                            <p><?= nl2br(word_limiter($b['isi_berita'], 6)); ?>.</p>
                            <p><a href="<?= base_url('ponpes/berita/lihat_berita/' . $b['id_berita']); ?>" class="btn btn-primary">Selengkapnya</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>