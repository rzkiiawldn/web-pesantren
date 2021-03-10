<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_kategori_berita"><i class="fas fa-plus"></i> Tambah data</a>
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
                            <th>Kategori</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori_berita as $kb) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $kb['kategori']; ?></td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#edit_kategori_berita<?= $kb['id_kategori']; ?>">edit</a>
                                    <a href="<?= base_url('admin/berita/hapus_kategori_berita/' . $kb['id_kategori']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">Hapus</a>
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


<div class="modal fade" id="tambah_kategori_berita" tabindex="-1" role="dialog" aria-labelledby="tambah_kategori_beritaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_kategori_beritaLabel">Tambah Kategori Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/berita/tambah_kategori_berita'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" id="kategori" class="form-control" required name="kategori" />
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
foreach ($kategori_berita as $kb) : $no++; ?>
    <div class="modal fade" id="edit_kategori_berita<?= $kb['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_kategori_beritaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_kategori_beritaLabel">Edit Kategori Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/berita/edit_kategori_berita/<?= $kb['id_kategori']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $kb['id_kategori']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" id="kategori" class="form-control" required name="kategori" value="<?= $kb['kategori']; ?>" />
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