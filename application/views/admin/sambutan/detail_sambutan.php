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
                            <td>: <?= $sambutan['nama_pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Sambutan</th>
                            <td>: <?= nl2br($sambutan['isi_sambutan']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Foto Pimpinan</th>
                            <td>: <img src="<?= base_url('assets/admin/img/sambutan/' . $sambutan['foto']) ?>" alt="Foto Pimpinan" class="img-fluid" width="50%"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>