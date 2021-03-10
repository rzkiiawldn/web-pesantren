<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah data</a>
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
                            <th>Foto</th>
                            <th>Nama Guru</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($guru as $g) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('' . $g['foto']) ?>" alt="" class="img-fluid"></td>
                                <td><?= $g['nama_guru']; ?></td>
                                <td><?= $g['alamat']; ?></td>
                                <td>

                                    <a href="<?= base_url('admin/guru/detail_guru/' . $g['id_guru']) ?>" class="badge badge-info">detail</a>
                                    <a href="" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus ?');">hapus</a>
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