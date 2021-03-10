<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-graduate"> <?= $title; ?></i></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive">
                        <tr>
                            <th width="25%">Program Pendidikan</th>
                            <td>: <?= $prestasi['nama_pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Judul prestasi</th>
                            <td>: <?= $prestasi['judul_prestasi']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Jenis prestasi</th>
                            <td>: <?= $prestasi['jenis_prestasi']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Nama Siswa</th>
                            <td>: <?= $prestasi['nama_siswa']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">prestasi</th>
                            <td>: <?= nl2br($prestasi['keterangan']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Foto</th>
                            <td>: <img src="<?= base_url('assets/admin/img/siswa_prestasi/' . $prestasi['foto']) ?>" alt="Foto Prestasi" class="img-fluid" width="50%"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>