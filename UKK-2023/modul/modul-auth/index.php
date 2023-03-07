<?php
include('../../config/database.php');
if (isset($_POST['cek'])) {
  $pilihan = $_POST['pilihan']; //masyarakat atau petugas
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  if ($pilihan == 'masyarakat') {
    $q = mysqli_query($con, "SELECT * FROM `masyarakat` WHERE username = '$username' AND password = '$password' AND verifikasi = 1");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['nik'] = $d->nik;
      $_SESSION['username'] = $d->username;
      $_SESSION['nama'] = $d->nama;
      $_SESSION['telp'] = $d->telp;
      $_SESSION['level'] = 'masyarakat';
      @header('location:../../modul/modul-profile/');
    } else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  } else if ($pilihan == 'petugas') {
    $q = mysqli_query($con, "SELECT * FROM `petugas` WHERE username = '$username' AND password = '$password'");
    $r = mysqli_num_rows($q);
    if ($r == 1) {
      $d = mysqli_fetch_object($q);
      @session_start();
      $_SESSION['username'] = $d->username;
      $_SESSION['nama_petugas'] = $d->nama_petugas;
      $_SESSION['level'] = $d->level;
      $_SESSION['id_petugas'] = $d->id_petugas;
      $_SESSION['telp'] = $d->telp;
      if ($_SESSION['level'] == 'admin') {
        @header('location:../../modul/modul-profile/');
      }
      if ($_SESSION['level'] == 'petugas') {
        @header('location:../../modul/modul-profile/');
      }

    }else {
      echo '<div class="alert alert-danger alert-dismissable"><a href="" class="close" data-dismiss="alert">x</a> <strong class="text-black">Data salah atau belum di verifikasi</strong></div>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php include('../../assets/header.php') ?>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form action="" method="post">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Your username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="password"  placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <label for="pilihan">LOGIN SEBAGAI</label>
                            <div class="form-group mb-4">
                                <select class="form-control" name="pilihan">
                                    <option value="masyarakat">masyarakat</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                            <button  name="cek" role="button" type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="./register.php">Sign Up</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/lib/chart/chart.min.js"></script>
    <script src="../../assets/lib/easing/easing.min.js"></script>
    <script src="../../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../assets/js/main.js"></script>
</body>

</html>