<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="../../assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                    <?php
                    if ($_SESSION['level'] == 'masyarakat') {
                        echo ($_SESSION['nama']);
                    } elseif ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') {
                        echo ($_SESSION['nama_petugas']);
                    }
                    ?>
                </h6>
                <span>
                    <?= $_SESSION['level'] ?>
                </span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <?php if ($_SESSION['level'] == 'masyarakat' || $_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'admin') { ?>
                <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-profile" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Profile</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Features</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-pengaduan" class="dropdown-item">Pengaduan</a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-tanggapan" class="dropdown-item">Tanggapan</a>
                    </div>
                </div>
            <?php } ?>

            <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'masyarakat') { ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Admin</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-auth/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            <?php } ?>

            <?php if ($_SESSION['level'] == 'admin') { ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Admin</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-petugas" class="dropdown-item">Petugas</a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-masyarakat" class="dropdown-item">Masyarakat</a>
                        <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_nayla/UKK-2023/modul/modul-auth/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </nav>
</div>