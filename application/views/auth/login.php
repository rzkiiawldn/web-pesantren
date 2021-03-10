<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Login</h1>
                        <p class="text-muted">Masukan Username dan Password</p>
                    </div>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <?php echo form_open('Auth/login'); ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-lock"></i>
                        </span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url('welcome'); ?>" type="submit" class="btn btn-success ">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4 ">Login</button>
                    </div>
                </div>
                <?php echo form_close();  ?>
                <hr>
            </div>
        </div>
    </div>
</div>
</div>