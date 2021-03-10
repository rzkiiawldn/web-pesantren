<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_prestasi"><i class="fas fa-plus"></i> Tambah data</a>
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
                            <th width="15%">Foto</th>
                            <th width="17%">Judul Prestasi</th>
                            <th width="18%">Nama Siswa</th>
                            <th width="10%">Jenis Prestasi</th>
                            <th width="25%">Keterangan</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prestasi as $p) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('assets/admin/img/siswa_prestasi/' . $p['foto']) ?>" alt="foto prestasi" class="img-fluid" width="50%"></td>
                                <td><?= $p['judul_prestasi']; ?></td>
                                <td><?= $p['nama_siswa']; ?></td>
                                <td><?= $p['jenis_prestasi']; ?></td>
                                <td><?= word_limiter($p['keterangan'], 4); ?></td>
                                <td>
                                    <a href="<?= base_url('admin/siswa_prestasi/detail_prestasi/' . $p['id_prestasi']) ?>" class="badge badge-info">detail</a>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_prestasi<?= $p['id_prestasi']; ?>">edit</a>
                                    <a href="<?= base_url('admin/siswa_prestasi/hapus_prestasi/' . $p['id_prestasi']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a>
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


<div class="modal fade" id="tambah_prestasi" tabindex="-1" role="dialog" aria-labelledby="tambah_prestasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_prestasiLabel">Tambah Siswa Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/siswa_prestasi/tambah_prestasi'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="judul_prestasi">Judul Prestasi</label>
                            <input type="text" class="form-control" name="judul_prestasi" id="judul_prestasi">
                        </div>
                    </div>
                </div>
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
                            <label for="jenis_prestasi">Jenis Prestasi</label>
                            <select name="jenis_prestasi" id="jenis_prestasi" class="form-control">
                                <option value="">--pilih--</option>
                                <?php foreach ($jenis_prestasi as $js) { ?>
                                    <option value="<?= $js ?>"><?= $js ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
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
                    <div class="col">
                        <div class="form-group">
                            <label for="keterangan">Keterangan Prestasi</label>
                            <textarea name="keterangan" id="keterangan" cols="20" rows="10" class="form-control"></textarea>
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
foreach ($prestasi as $p) : $no++; ?>
    <div class="modal fade" id="edit_prestasi<?= $p['id_prestasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_prestasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_prestasiLabel">Edit Siswa Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/siswa_prestasi/edit_prestasi/<?= $p['id_prestasi']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $p['id_prestasi']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="judul_prestasi">Judul Prestasi</label>
                                    <input type="text" class="form-control" name="judul_prestasi" id="judul_prestasi" value="<?= $p['judul_prestasi']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Program Pendidikan</label>
                                    <select name="id_program" class="form-control" required>
                                        <option value="">--pilih--</option>
                                        <?php foreach ($program as $pro) { ?>
                                            <?php if ($p['id_program'] == $pro['id_program']) { ?>
                                                <option value="<?= $pro['id_program']; ?>" selected><?= $pro['kode']; ?> (<?= $pro['nama_pendidikan']; ?>)</option>
                                            <?php } else { ?>
                                                <option value="<?= $pro['id_program']; ?>"><?= $pro['kode']; ?> (<?= $pro['nama_pendidikan']; ?>)</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_prestasi">Jenis Prestasi</label>
                                    <select name="jenis_prestasi" id="jenis_prestasi" class="form-control" value="<?= $p['jenis_prestasi']; ?>">
                                        <option value="">--pilih--</option>
                                        <?php foreach ($jenis_prestasi as $js) { ?>
                                            <?php if ($js == $p['jenis_prestasi']) { ?>
                                                <option value="<?= $js ?>" selected><?= $js ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $js ?>"><?= $js ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?= $p['nama_siswa']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Foto prestasi</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/admin/img/siswa_prestasi/') . $p['foto']; ?>" class="img-thumbnail">
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
                            <div class="col">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan Prestasi</label>
                                    <textarea name="keterangan" id="keterangan" cols="20" rows="10" class="form-control"><?= $p['keterangan']; ?></textarea>
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