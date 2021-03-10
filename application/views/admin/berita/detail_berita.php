<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-graduate"> <?= $title; ?></i></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-responsive">
                        <tr>
                            <td colspan="2"><img src="<?= base_url('assets/admin/img/berita/' . $berita['foto_berita']) ?>" alt="foto berita" class="img-fluid" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="25%">Judul Berita</th>
                            <td>: <?= $berita['judul_berita']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Kategori Berita</th>
                            <td>: <?= $berita['kategori']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Isi Berita</th>
                            <td>: <?= nl2br($berita['isi_berita']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Program</th>
                            <td>:
                                <?php if ($berita['id_program'] == 1) {
                                    echo "Berita Pesantren";
                                } else {
                                    echo "Berita Madrasah";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">Tanggal Input</th>
                            <td>: <?= $berita['tanggal_input']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Pengirim</th>
                            <td>: <?= $berita['pengirim_berita']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Tampilkan Berita</th>
                            <td>:
                                <?php if ($berita['tampilkan_berita'] == 1) {
                                    echo "Tampil";
                                } else {
                                    echo "Tidak Tampil";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">Views</th>
                            <td>: <?= $berita['views']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>