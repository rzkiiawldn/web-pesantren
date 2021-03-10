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
                            <th width="25%">Logo Web</th>
                            <td>: <img src="<?= base_url('assets/admin/img/informasi_web/' . $informasi['logo_website']) ?>" alt="Logo Web" class="img-fluid" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="25%">Background Web</th>
                            <td>: <img src="<?= base_url('assets/admin/img/informasi_web/' . $informasi['background']) ?>" alt="Background Web" class="img-fluid" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="25%">Nama Website</th>
                            <td>: <?= $informasi['nama_website']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Moto</th>
                            <td>: <?= $informasi['moto']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Email</th>
                            <td>: <?= nl2br($informasi['email']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Nomor Telepon</th>
                            <td>: <?= nl2br($informasi['nomor_telepon']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Nomor Whatsapp</th>
                            <td>: <?= nl2br($informasi['nomor_whatsapp']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Alamat</th>
                            <td>: <?= nl2br($informasi['alamat']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>