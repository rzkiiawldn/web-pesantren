<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_sambutan"><i class="fas fa-plus"></i> Tambah data</a>
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
                            <th width="7%">No</th>
                            <th width="23%">Foto Pimpinan</th>
                            <th width="40%">Isi Sambutan</th>
                            <th width="20%">Program Pendidikan</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sambutan as $s) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('assets/admin/img/sambutan/' . $s['foto']) ?>" alt="foto pendidikan" class="img-fluid" width="50%"></td>
                                <td><?= word_limiter($s['isi_sambutan'], 4); ?></td>
                                <td><?= $s['kode']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/sambutan/detail_sambutan/' . $s['id_sambutan']) ?>" class="badge badge-info">detail</a>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_sambutan<?= $s['id_sambutan']; ?>">edit</a>
                                    <a href="<?= base_url('admin/sambutan/hapus_sambutan/' . $s['id_sambutan']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a>
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


<div class="modal fade" id="tambah_sambutan" tabindex="-1" role="dialog" aria-labelledby="tambah_sambutanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_sambutanLabel">Tambah Sambutan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/sambutan/tambah_sambutan'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Program Pendidikan</label>
                            <select name="id_program" class="form-control" required>
                                <option value="">--pilih--</option>
                                <?php foreach ($program as $p) { ?>
                                    <option value="<?= $p['id_program']; ?>"><?= $p['nama_pendidikan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="isi_sambutan">Isi Sambutan</label>
                            <textarea name="isi_sambutan" id="isi_sambutan" cols="20" rows="10" class="form-control"></textarea>
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
foreach ($sambutan as $s) : $no++; ?>
    <div class="modal fade" id="edit_sambutan<?= $s['id_sambutan']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_sambutanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_sambutanLabel">Edit Sambutan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/sambutan/edit_sambutan/<?= $s['id_sambutan']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $s['id_sambutan']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Pendidikan</label>
                                    <select name="id_program" class="form-control" required>
                                        <option value="">--pilih--</option>
                                        <?php foreach ($program as $p) { ?>
                                            <?php if ($s['id_program'] == $p['id_program']) { ?>
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
                                    <label>Foto</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/admin/img/sambutan/') . $s['foto']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input" id="foto">
                                                <label class="custom-file-label" for="foto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="isi_sambutan">Isi Sambutan</label>
                                    <textarea name="isi_sambutan" id="isi_sambutan" cols="20" rows="10" class="form-control"><?= $s['isi_sambutan']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>