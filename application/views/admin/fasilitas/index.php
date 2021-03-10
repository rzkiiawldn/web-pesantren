<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_fasilitas"><i class="fas fa-plus"></i> Tambah data</a>
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
                            <th width="5%">No</th>
                            <th width="18%">Foto</th>
                            <th width="30%">Nama Fasilitas</th>
                            <th width="50%">Keterangan</th>
                            <th width="15%">Program Pendidikan</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($fasilitas as $f) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('assets/admin/img/fasilitas/' . $f['foto']) ?>" alt="" class="img-fluid"></td>
                                <td><?= $f['nama_fasilitas']; ?></td>
                                <td><?= word_limiter($f['keterangan'], 4); ?></td>
                                <td><?= $f['kode']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/fasilitas/detail_fasilitas/' . $f['id_fasilitas']) ?>" class="badge badge-info">detail</a>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_fasilitas<?= $f['id_fasilitas']; ?>">edit</a>
                                    <a href="<?= base_url('admin/fasilitas/hapus_fasilitas/' . $f['id_fasilitas']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a>
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


<div class="modal fade" id="tambah_fasilitas" tabindex="-1" role="dialog" aria-labelledby="tambah_fasilitasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_fasilitasLabel">Tambah Fasilitas Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/fasilitas/tambah_fasilitas'); ?>
            <div class="modal-body">
                <div class="row">
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
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Fasilitas</label>
                            <input type="text" name="nama_fasilitas" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan Fasilitas</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
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
foreach ($fasilitas as $f) : $no++; ?>
    <div class="modal fade" id="edit_fasilitas<?= $f['id_fasilitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_fasilitasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_fasilitasLabel">Edit Fasilitas Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/fasilitas/edit_fasilitas/<?= $f['id_fasilitas']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $f['id_fasilitas']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Pendidikan</label>
                                    <select name="id_program" class="form-control" required>
                                        <option value="">--pilih--</option>
                                        <?php foreach ($program as $p) { ?>
                                            <?php if ($f['id_program'] == $p['id_program']) { ?>
                                                <option value="<?= $p['id_program']; ?>" selected><?= $p['kode']; ?> (<?= $p['nama_pendidikan']; ?>)</option>
                                            <?php } else { ?>
                                                <option value="<?= $p['id_program']; ?>"><?= $p['kode']; ?> (<?= $p['nama_pendidikan']; ?>)</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Foto fasilitas</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/admin/img/fasilitas/') . $f['foto']; ?>" class="img-thumbnail">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Fasilitas</label>
                                    <input type="text" name="nama_fasilitas" class="form-control" required value="<?= $f['nama_fasilitas'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Fasilitas</label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?= $f['keterangan']; ?></textarea>
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