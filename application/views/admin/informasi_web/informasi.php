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
                            <th width="15%">Nama Website</th>
                            <th width="15%">Email</th>
                            <th width="15%">Moto</th>
                            <th width="15%">No Telp</th>
                            <th width="15%">No Wa</th>
                            <th width="15%">Program Pendidikan</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($informasi as $info) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $info['nama_website']; ?></td>
                                <td><?= $info['email']; ?></td>
                                <td><?= $info['moto']; ?></td>
                                <td><?= $info['nomor_telepon']; ?></td>
                                <td><?= $info['nomor_whatsapp']; ?></td>
                                <td><?= $info['kode']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/informasi_web/detail_informasi/' . $info['id']) ?>" class="badge badge-info">detail</a>
                                    <!-- <a href="<?= base_url('admin/informasi_web/edit_informasi/' . $info['id']) ?>" class="badge badge-success">edit</a> -->
                                    <a href="" data-toggle="modal" data-target="#edit_informasi<?= $info['id']; ?>" class="badge badge-success">edit</a>
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

<?php
$no = 0;
foreach ($informasi as $info) : $no++; ?>
    <div class="modal fade" id="edit_informasi<?= $info['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_informasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_informasiLabel">Edit Informasi Website</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/informasi_web/edit_informasi/<?= $info['id']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $info['id']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_website">Nama Website</label>
                                    <input type="text" class="form-control" id="nama_website" name="nama_website" value="<?= $info['nama_website'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="moto">Moto</label>
                                    <input type="text" class="form-control" id="moto" name="moto" value="<?= $info['moto'] ?>" />
                                </div>
                            </div>
                            <input type="hidden" name="id_program" value="<?= $info['id_program'] ?>">
                            <div class="col-md-6">
                                <label>Logo Website</label>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/admin/img/informasi_web/') . $info['logo_website']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" name="logo_website" class="custom-file-input" id="logo_website">
                                            <label class="custom-file-label" for="logo_website">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Background Website</label>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/admin/img/informasi_web/') . $info['background']; ?>" class="img-thumbnail" alt="background">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" name="background" class="custom-file-input" id="background">
                                            <label class="custom-file-label" for="background">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $info['email'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $info['nomor_telepon'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_whatsapp">Nomor Whatsapp</label>
                                    <input type="text" class="form-control" id="nomor_whatsapp" name="nomor_whatsapp" value="<?= $info['nomor_whatsapp'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $info['alamat'] ?>" />
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