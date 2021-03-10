    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light sticky-top" id="ftco-navbar">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a href="<?= base_url('madrasah/beranda'); ?>" class="nav-link">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('madrasah/profil/sejarah'); ?>">Sejarah Singkat</a>
                            <a class="dropdown-item" href="<?= base_url('madrasah/profil/visi_misi'); ?>">Visi & Misi</a>
                            <a class="dropdown-item" href="<?= base_url('madrasah/profil/profil_pengasuh'); ?>">Profil Pengasuh</a>
                            <a class="dropdown-item" href="<?= base_url('madrasah/profil/struktur'); ?>">Struktur Organisasi</a>
                            <a class="dropdown-item" href="<?= base_url('madrasah/siswa_prestasi'); ?>">Siswa Berprestasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Layanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('madrasah/ekstrakurikuler'); ?>">Ekstrakurikuler</a>
                            <a class="dropdown-item" href="<?= base_url('madrasah/lokasi'); ?>">Lokasi Pesantren</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="<?= base_url('madrasah/sarana_prasarana'); ?>" class="nav-link">Sarana & Prasarana</a></li>
                    <li class="nav-item"><a href="<?= base_url('madrasah/berita'); ?>" class="nav-link">Informasi & Berita</a></li>
                    <li class="nav-item"><a href="<?= base_url('madrasah/galeri'); ?>" class="nav-link">Galeri</a></li>
                    <li class="nav-item"><a href="<?= base_url('madrasah/brosur'); ?>" class="nav-link">Brosur</a></li>
                    <li class="nav-item"><a href="<?= base_url(''); ?>" class="nav-link">Web Pondok</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->