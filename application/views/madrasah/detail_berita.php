<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <p>
                        <img src="<?= base_url('assets/admin/img/berita/' . $berita['foto_berita']) ?>" alt="foto berita" class="img-fluid" width="100%">
                    </p>
                    <div class="text mt-3">
                        <div class="posted mb-3 d-flex">
                            <div class="desc pl-3">
                                <span>Penulis : <?= $berita['pengirim_berita']; ?></span>
                                <span><?= $berita['tanggal_input']; ?></span>
                                <span>Views : <?= $berita['views']; ?></span>
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-3 text-capitalize"><?= $berita['judul_berita']; ?></h2>
                    <p style="font-size: 16px" class="text-justify"><?= nl2br($berita['isi_berita']); ?>.</p>
                </div>
            </div>
            <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">

                <div class="sidebar-box ftco-animate">
                    <h3>Berita lainnya</h3>
                    <?php foreach ($berita_berita as $b) { ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(../../../assets/admin/img/berita/<?= $b['foto_berita'] ?>);"></a>
                            <div class="text">
                                <h3 class="heading text-capitalize"><a href="<?= base_url('madrasah/berita/lihat_berita/' . $b['id_berita']) ?>"><?= $b['judul_berita']; ?></a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span><?= $b['tanggal_input']; ?></a></div>
                                    <div><a href="#"><span class="icon-person"></span>Pengirim : <?= $b['pengirim_berita']; ?></a></div><br>
                                    <div><a href="#"><span class="icon-person"></span>Views : <?= $b['views']; ?></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>