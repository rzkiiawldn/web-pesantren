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
                            <td>: <?= $profil['nama_pendidikan']; ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Sejarah</th>
                            <td>: <?= nl2br($profil['sejarah']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Profil Pengasuh</th>
                            <td>: <?= nl2br($profil['profil_pengasuh']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Visi</th>
                            <td>: <?= nl2br($profil['visi']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Misi</th>
                            <td>: <?= nl2br($profil['misi']); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Foto Pengasuh</th>
                            <td>: <img src="<?= base_url('assets/admin/img/profil/' . $profil['foto_pengasuh']) ?>" alt="Foto Pengasuh" class="img-fluid" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="25%">Struktur Organisasi</th>
                            <td>: <img src="<?= base_url('assets/admin/img/profil/' . $profil['struktur_organisasi']) ?>" alt="Struktur Organisasi" class="img-fluid" width="50%"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>