<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="7%">No</th>
                            <th width="10%">Program</th>
                            <th width="15%">Sejarah</th>
                            <th width="15%">Profil Pengasuh</th>
                            <th width="15%">Visi</th>
                            <th width="15%">Misi</th>
                            <th width="15%">Foto Pengasuh</th>
                            <th width="15%">Struktur Organisasi</th>
                            <th width="8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($profil as $p) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p['kode']; ?></td>
                                <td><?= word_limiter($p['sejarah'], 4); ?></td>
                                <td><?= word_limiter($p['profil_pengasuh'], 4); ?></td>
                                <td><?= word_limiter($p['visi'], 4); ?></td>
                                <td><?= word_limiter($p['misi'], 4); ?></td>
                                <td><img src="<?= base_url('assets/admin/img/profil/' . $p['foto_pengasuh']) ?>" alt="Profil Pengasuh" class="img-fluid" width="50%"></td>
                                <td><img src="<?= base_url('assets/admin/img/profil/' . $p['struktur_organisasi']); ?>" alt="struktur organisasi" class="img-fluid" width="50%"></td>
                                <td>

                                    <a href="<?= base_url('admin/profil/detail_profil/' . $p['id']) ?>" class="badge badge-info">detail</a>
                                    <a href="<?= base_url('admin/profil/edit_profil/' . $p['id']) ?>" class="badge badge-success">edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>