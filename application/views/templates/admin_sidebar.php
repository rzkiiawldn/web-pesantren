<!-- Sidebar -->
<ul class="navbar-nav bg-ku sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Asshiddiqiyah <sup>10</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'beranda') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/beranda') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - User Admin -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'user') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/user') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi Sekolah
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'program_pendidikan' || $this->uri->segment(2) == 'profil' || $this->uri->segment(2) == 'sambutan' || $this->uri->segment(2) == 'guru' || $this->uri->segment(2) == 'brosur' || $this->uri->segment(2) == 'galeri' || $this->uri->segment(2) == 'fasilitas' || $this->uri->segment(2) == 'ekstrakurikuler' || $this->uri->segment(2) == 'siswa_prestasi') {
                            echo "active";
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Informasi Sekolah</span>
        </a>
        <div id="collapseTwo" class="collapse <?php if ($this->uri->segment(2) == 'program_pendidikan' || $this->uri->segment(2) == 'profil' || $this->uri->segment(2) == 'sambutan' || $this->uri->segment(2) == 'guru' || $this->uri->segment(2) == 'brosur' || $this->uri->segment(2) == 'galeri' || $this->uri->segment(2) == 'fasilitas' || $this->uri->segment(2) == 'ekstrakurikuler' || $this->uri->segment(2) == 'siswa_prestasi') {
                                                    echo "show";
                                                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Informasi sekolah :</h6>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'program_pendidikan') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/program_pendidikan'); ?>">Program Pendidikan</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'profil') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/profil'); ?>">Profil Sekolah</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'sambutan') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/sambutan'); ?>">Sambutan</a>
                <!-- <a class="collapse-item <?php if ($this->uri->segment(2) == 'guru') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('admin/guru'); ?>">Data Guru</a> -->
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'brosur') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/brosur'); ?>">Brosur Sekolah</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'galeri') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/galeri'); ?>">Galeri Sekolah</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'fasilitas') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/fasilitas'); ?>">Fasilitas Sekolah</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'ekstrakurikuler') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/ekstrakurikuler'); ?>">Ekstrakurikuler</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == 'siswa_prestasi') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/siswa_prestasi'); ?>">Siswa Berprestasi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Program Pendidikan -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'program_pendidikan') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/program_pendidikan'); ?>">
            <i class="fas fa-fw fa-school"></i>
            <span>Program Pendidikan</span></a>
    </li>

    <!-- Nav Item - Profil -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'profil') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/profil'); ?>">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Profil Sekolah</span></a>
    </li>

    <!-- Nav Item - Sambutan -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'sambutan') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/sambutan'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Sambutan-sambutan</span></a>
    </li>

    <!-- Nav Item - Guru -->
    <!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'guru') {
                                    echo "active";
                                } ?>">
        <a class="nav-link" href="<?= base_url('admin/guru'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Guru</span></a>
    </li> -->

    <!-- Nav Item - Brosur sekolah -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'brosur') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/brosur'); ?>">
            <i class="fas fa-fw fa-scroll"></i>
            <span>Brosur Sekolah</span></a>
    </li>

    <!-- Nav Item - Galeri sekolah -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'galeri') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/galeri'); ?>">
            <i class="fas fa-fw fa-images"></i>
            <span>Galeri Sekolah</span></a>
    </li>

    <!-- Nav Item - Fasilitas sekolah -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'fasilitas') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/fasilitas'); ?>">
            <i class="fas fa-fw fa-laptop-house"></i>
            <span>Fasilitas Sekolah</span></a>
    </li>

    <!-- Nav Item - ekstrakurikuler  || $this->uri->segment(2) == 'siswa_prestasi'-->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'ekstrakurikuler') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/ekstrakurikuler'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Ekstrakurikuler</span></a>
    </li>

    <!-- Nav Item - Siswa berprestasi sekolah -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'siswa_prestasi') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('admin/siswa_prestasi'); ?>">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Siswa Berprestasi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi Website
    </div>

    <!-- Nav Item - Informasi Website -->
    <li class="nav-item <?php if ($this->uri->segment(2) == 'informasi_web' || $this->uri->segment(3) == 'slider') {
                            echo "active";
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Informasi Website</span>
        </a>
        <div id="collapseThree" class="collapse <?php if ($this->uri->segment(3) == 'index' || $this->uri->segment(3) == 'slider') {
                                                    echo "show";
                                                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Informasi Website :</h6>
                <a class="collapse-item <?php if ($this->uri->segment(3) == 'index') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/informasi_web/index'); ?>">Informasi Web</a>
                <a class="collapse-item <?php if ($this->uri->segment(3) == 'slider') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/informasi_web/slider'); ?>">Slider</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Berita -->
    <li class="nav-item <?php if ($this->uri->segment(3) == 'view' || $this->uri->segment(3) == 'kategori_berita') {
                            echo "active";
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-cog"></i>
            <span>Berita Sekolah</span>
        </a>
        <div id="collapseFour" class="collapse <?php if ($this->uri->segment(3) == 'view' || $this->uri->segment(3) == 'kategori_berita') {
                                                    echo "show";
                                                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Berita Sekolah :</h6>
                <a class="collapse-item <?php if ($this->uri->segment(3) == 'kategori_berita') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/berita/kategori_berita'); ?>">Kategori Berita</a>
                <a class="collapse-item <?php if ($this->uri->segment(3) == 'view') {
                                            echo "active";
                                        } ?>" href="<?= base_url('admin/berita/view'); ?>">Berita</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/admin/img/logo_ponpes.png') ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->