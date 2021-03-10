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
                            <th width="25%">Logo Pendidikan</th>
                            <td>: <img src="<?= base_url('assets/admin/img/program_pendidikan/' . $program['logo']) ?>" alt="Logo Pendidikan" class="img-fluid" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="25%">Nama Program Pendidikan</th>
                            <td>: <?= $program['nama_pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Kode</th>
                            <td>: <?= $program['kode']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Keterangan</th>
                            <td>: <?= nl2br($program['keterangan_pendidikan']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>