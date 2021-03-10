  <!-- Begin Page Content -->
  <div class="container-fluid">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-graduate"> <?= $title; ?></i></li>
          </ol>
      </nav>
      <div class="card col-md-12">
          <div class="card-body">
              <?= form_open_multipart(); ?>
              <input type="hidden" name="id" value="<?= $profil['id'] ?>">
              <input type="hidden" name="id_program" value="<?= $profil['id_program'] ?>">
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label for="sejarah">Sejarah Singkat</label>
                          <textarea class="form-control" name="sejarah" style="height: 200px"><?= $profil['sejarah']; ?></textarea>
                          <small class="form-text text-danger"><?= form_error('sejarah'); ?></small>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="visi">Visi</label>
                          <textarea class="form-control" name="visi" style="height: 200px"><?= $profil['visi']; ?></textarea>
                          <small class="form-text text-danger"><?= form_error('visi'); ?></small>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="misi">Misi</label>
                          <textarea class="form-control" name="misi" style="height: 200px"><?= $profil['misi']; ?></textarea>
                          <small class="form-text text-danger"><?= form_error('misi'); ?></small>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="profil_pengasuh">Profil Pengasuh</label>
                          <textarea class="form-control" name="profil_pengasuh" style="height: 200px"><?= $profil['profil_pengasuh']; ?></textarea>
                          <small class="form-text text-danger"><?= form_error('profil_pengasuh'); ?></small>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <label>Foto Pengasuh</label>
                      <div class="row">
                          <div class="col-sm-3">
                              <img src="<?= base_url('assets/admin/img/profil/') . $profil['foto_pengasuh']; ?>" class="img-thumbnail">
                          </div>
                          <div class="col-sm-9">
                              <div class="custom-file">
                                  <input type="file" name="foto_pengasuh" class="custom-file-input" id="foto_pengasuh">
                                  <label class="custom-file-label" for="foto_pengasuh">Choose file</label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <label>Struktur Organisasi</label>
                      <div class="row">
                          <div class="col-sm-3">
                              <img src="<?= base_url('assets/admin/img/profil/') . $profil['struktur_organisasi']; ?>" class="img-thumbnail">
                          </div>
                          <div class="col-sm-9">
                              <div class="custom-file">
                                  <input type="file" name="struktur_organisasi" class="custom-file-input" id="struktur_organisasi">
                                  <label class="custom-file-label" for="struktur_organisasi">Choose file</label>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <button type="submit" class="btn btn-primary float-right my-5">Simpan</button>
                      <a href="<?= base_url('admin/profil'); ?>" type="submit" class="btn btn-warning float-right my-5 mr-3" onclick="return confirm('Yakin ingin Kembali ?');">Kembali</a>
                  </div>
              </div>
              <?= form_close(); ?>
          </div>
      </div>
      <!-- Content Row -->

  </div>
  </div>