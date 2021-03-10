<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus"></i> Tambah data</a>
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
                            <th width="25%">Nama</th>
                            <th width="25%">Username</th>
                            <th width="30%">Password</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tb_user as $u) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['username']; ?></td>
                                <td><?= $u['password']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_user<?= $u['id_user']; ?>">edit</a>
                                    <a href="<?= base_url('admin/user/hapus/' . $u['id_user']) ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">hapus</a>
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

<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="tambah_userLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_userLabel">Tambah user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/user/tambah_user'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input required type="text" name="nama" class="form-control" required>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input required type="text" name="username" class="form-control" required>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input required type="password" name="password" class="form-control" required>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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
foreach ($tb_user as $u) : $no++; ?>
    <div class="modal fade" id="edit_user<?= $u['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_userLabel">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/user/edit_user/<?= $u['id_user']; ?>" method="post" enctype="multipart/form-data">
                    <input required type="hidden" name="id" value="<?= $u['id_user']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input required type="text" name="nama" class="form-control" value="<?= $u['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input required type="text" name="username" class="form-control" value="<?= $u['username'] ?>" readonly>
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required type="password" name="password" class="form-control" value="<?= $u['password'] ?>">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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