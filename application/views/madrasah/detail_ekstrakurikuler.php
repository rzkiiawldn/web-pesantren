<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <p>
                        <img src="<?= base_url('assets/admin/img/eskul/' . $eskul['foto']) ?>" alt="foto eskul" class="img-fluid" width="100%">
                    </p>
                    <h2 class="mb-3 text-capitalize"><?= $eskul['nama_eskul']; ?></h2>
                    <p style="font-size: 16px" class="text-justify"><?= nl2br($eskul['keterangan']); ?>.</p>
                </div>
            </div>
        </div>
    </div>
</section>