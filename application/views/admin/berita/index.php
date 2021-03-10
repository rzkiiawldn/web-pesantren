<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_berita"><i class="fas fa-plus"></i> Tambah data</a>
        </div>
    </div>
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
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Judul Berita</th>
                            <th>Tanggal Input</th>
                            <th>Tampilkan Berita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($berita as $b) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['kategori']; ?></td>
                                <td><?= $b['judul_berita']; ?></td>
                                <td><?= $b['tanggal_input']; ?></td>
                                <td>
                                    <?php if ($b['tampilkan_berita'] == 0) { ?>
                                        <span class="badge badge-danger">Tidak Tampil</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Tampil</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/berita/detail_berita/' . $b['id_berita']) ?>" class="badge badge-info">detail</a>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_berita<?= $b['id_berita']; ?>">edit</a>
                                    <a href="<?= base_url('admin/berita/hapus_berita/' . $b['id_berita']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a>
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

<div class="modal fade" id="tambah_berita" tabindex="-1" role="dialog" aria-labelledby="tambah_beritaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_beritaLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/berita/tambah_berita'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Berita</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">--pilih--</option>
                                <?php foreach ($kategori_berita as $kb) { ?>
                                    <option value="<?= $kb['id_kategori']; ?>"><?= $kb['kategori']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Program Pendidikan</label>
                            <select name="id_program" class="form-control" required>
                                <option value="">--pilih--</option>
                                <?php foreach ($program as $p) { ?>
                                    <option value="<?= $p['id_program']; ?>"><?= $p['kode']; ?> (<?= $p['nama_pendidikan']; ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul_berita" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="pengirim_berita" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Berita</label>
                            <input type="file" name="foto_berita" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tampilkan Berita ?</label>
                        <div class="form-group form-check">
                            <label class="form-check-label" for="1">
                                <input type="radio" class="form-check-input" name="tampilkan_berita" id="1" value="1">Tampilkan</label>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label" for="0">
                                <input type="radio" class="form-check-input" name="tampilkan_berita" id="0" value="0">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="isi_berita">Isi Berita</label>
                            <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- EDIT -->
<?php
$no = 0;
foreach ($berita as $b) : $no++; ?>
    <div class="modal fade" id="edit_berita<?= $b['id_berita']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_beritaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_beritaLabel">Edit Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/berita/edit_berita/<?= $b['id_berita']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $b['id_berita']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori Berita</label>
                                    <select name="id_kategori" class="form-control" required>
                                        <option value="">--pilih--</option>
                                        <?php foreach ($kategori_berita as $kb) { ?>
                                            <?php if ($b['id_kategori'] == $kb['id_kategori']) { ?>
                                                <option value="<?= $kb['id_kategori']; ?>" selected><?= $kb['kategori']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $kb['id_kategori']; ?>"><?= $kb['kategori']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Pendidikan</label>
                                    <select name="id_program" class="form-control" required>
                                        <option value="">--pilih--</option>
                                        <?php foreach ($program as $p) { ?>
                                            <?php if ($b['id_program'] == $p['id_program']) { ?>
                                                <option value="<?= $p['id_program']; ?>" selected><?= $p['kode']; ?> (<?= $p['nama_pendidikan']; ?>)</option>
                                            <?php } else { ?>
                                                <option value="<?= $p['id_program']; ?>"><?= $p['kode']; ?> (<?= $p['nama_pendidikan']; ?>)</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul Berita</label>
                                    <input type="text" name="judul_berita" class="form-control" required value="<?= $b['judul_berita'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pengirim</label>
                                    <input type="text" name="pengirim_berita" class="form-control" required value="<?= $b['pengirim_berita'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Foto berita</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/admin/img/berita/') . $b['foto_berita']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" name="foto_berita" class="custom-file-input" id="foto_berita">
                                            <label class="custom-file-label" for="foto_berita">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tampilkan Berita ?</label>
                                <?php if ($b['tampilkan_berita'] == 1) { ?>
                                    <div class="form-group form-check">
                                        <label class="form-check-label" for="1">
                                            <input type="radio" class="form-check-input" name="tampilkan_berita" id="1" value="1" checked>Tampilkan</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label" for="0">
                                            <input type="radio" class="form-check-input" name="tampilkan_berita" id="0" value="0">Tidak</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group form-check">
                                        <label class="form-check-label" for="1">
                                            <input type="radio" class="form-check-input" name="tampilkan_berita" id="1" value="1">Tampilkan</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label" for="0">
                                            <input type="radio" class="form-check-input" name="tampilkan_berita" id="0" value="0" checked>Tidak</label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="isi_berita">Isi Berita</label>
                                    <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control"><?= $b['isi_berita']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>