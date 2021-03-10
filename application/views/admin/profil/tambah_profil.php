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
              <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label>Program Pendidikan</label>
                          <select name="id_program" class="form-control" required>
                              <option value="">--pilih--</option>
                              <?php foreach ($program as $p) { ?>
                                  <option value="<?= $p['id_program']; ?>"><?= $p['nama_pendidikan']; ?></option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="sejarah">Sejarah Singkat</label>
                          <textarea class="form-control" name="sejarah" style="height: 200px"></textarea>
                          <small class="form-text text-danger"><?= form_error('sejarah'); ?></small>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="visi">Visi</label>
                          <textarea class="form-control" name="visi" style="height: 200px"></textarea>
                          <small class="form-text text-danger"><?= form_error('visi'); ?></small>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="misi">Misi</label>
                          <textarea class="form-control" name="misi" style="height: 200px"></textarea>
                          <small class="form-text text-danger"><?= form_error('misi'); ?></small>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                          <label for="profil_pengasuh">Profil Pengasuh</label>
                          <textarea class="form-control" name="profil_pengasuh" style="height: 200px"></textarea>
                          <small class="form-text text-danger"><?= form_error('profil_pengasuh'); ?></small>
                      </div>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="foto_pengasuh">Foto Pengasuh</label>
                          <input type="file" id="foto_pengasuh" class="form-control" name="foto_pengasuh">
                          <small class="form-text text-danger"><?= form_error('foto_pengasuh'); ?></small>
                      </div>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="struktur_organisasi">Struktur Organisasi</label>
                          <input type="file" id="struktur_organisasi" class="form-control" name="struktur_organisasi">
                          <small class="form-text text-danger"><?= form_error('struktur_organisasi'); ?></small>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <button type="submit" class="btn btn-primary float-right my-5">Simpan</button>
                      <a href="<?= base_url('admin/profil/'); ?>" type="submit" class="btn btn-warning float-right my-5 mr-3" onclick="return confirm('Yakin ingin Kembali ?');">Kembali</a>
                  </div>
              </div>
              <?= form_close(); ?>
          </div>
      </div>
      <!-- Content Row -->

  </div>
  </div>