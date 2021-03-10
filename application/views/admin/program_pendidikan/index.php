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
                            <th width="5%">No</th>
                            <th width="12%">kode</th>
                            <th width="20%">Nama Program</th>
                            <th width="38%">Keterangan</th>
                            <th width="15%">Logo</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($program as $p) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p['kode']; ?></td>
                                <td><?= $p['nama_pendidikan']; ?></td>
                                <td><?= word_limiter($p['keterangan_pendidikan'], 4); ?></td>
                                <td><img src="<?= base_url('assets/admin/img/program_pendidikan/' . $p['logo']) ?>" alt="foto program" class="img-fluid" width="50%"></td>
                                <td>
                                    <a href="<?= base_url('admin/program_pendidikan/detail_program_pendidikan/' . $p['id_program']) ?>" class="badge badge-info">detail</a>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_program_pendidikan<?= $p['id_program']; ?>">edit</a>
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

<!-- EDIT -->
<?php
$no = 0;
foreach ($program as $p) : $no++; ?>
    <div class="modal fade" id="edit_program_pendidikan<?= $p['id_program']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_program_pendidikanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_program_pendidikanLabel">Edit Program Pendidikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/program_pendidikan/edit_program_pendidikan/<?= $p['id_program']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $p['id_program']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" name="kode" id="kode" value="<?= $p['kode']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pendidikan">Nama Program Pendidikan</label>
                                    <input type="text" class="form-control" name="nama_pendidikan" id="nama_pendidikan" value="<?= $p['nama_pendidikan']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>logo</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/admin/img/program_pendidikan/') . $p['logo']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input" id="logo">
                                                <label class="custom-file-label" for="logo">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan_pendidikan">Keterangan Program Pendidikan</label>
                                    <textarea name="keterangan_pendidikan" id="keterangan_pendidikan" cols="20" rows="10" class="form-control"><?= $p['keterangan_pendidikan']; ?></textarea>
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