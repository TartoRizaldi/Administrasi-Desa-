<?php
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    $username = $_SESSION['username_akun'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username_akun = '$username'");
    $data = mysqli_fetch_array($result);
    $user = $data['username_akun'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrasi Desa</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom logo -->
    <link rel="icon" href="images/tanah_siang.PNG">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav samping sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_user.php">
                <div class="sidebar-brand-icon logo">
                </div>
                <div class="sidebar-brand-text mx-3 text">Administrasi Desa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard_user.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="view_data_pengajuan_user.php">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Pengajuan Surat</span></a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 

                                        echo $data['nama_akun'];

                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
                    </div>
                    <table border="0" width="100%">
                        <tr>
                            <td>
                                <div class="space_d">

                                     <?php
                                        if(isset($_GET['pengajuan'])){
                                          if($_GET['pengajuan'] == "success"){
                                            echo "
                                              <center>
                                              <div class='alert alert-success alert-dismissible tulisan'>
                                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                <strong>Anda berhasil melakukan pengajuan surat</strong>
                                              </div>
                                              </center>
                                            ";
                                          }
                                        }
                                        else {
                                          echo "
                                            <center>
                                            <div class='alert alert-info alert-dismissible tulisan'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                              Selamat Datang <strong>".$data['nama_akun']."</strong>
                                            </div>
                                            </center>
                                          ";
                                        }
                                      ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    
                    <div class ="container">
                            <div class="row">
                                <?php

                                    $penduduk= mysqli_query($conn, "SELECT * FROM data_penduduk WHERE nik = '$user'");
                                    $data1=mysqli_fetch_array($penduduk);

                                ?>
                                <div class="col-lg-6">
                                    <!-- Overflow Hidden -->
                                    <div class="card mb-4">
                                        <div class="card-header py-3 bg-success">
                                            <h6 class="m-0 font-weight-bold text-light">Data Anda</h6>
                                        </div>
                                        <div class="card-body">
                                            <strong><i class='fas fa-book mr-1'></i> NIK</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['nik'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-user mr-1'></i> Nama</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['nama'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-venus-mars mr-1'></i> Jenis Kelamin</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['jenis_kelamin'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-pray mr-1'></i> Agama</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['agama'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-address-book mr-1'></i> Tanggal Lahir</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['tanggal'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-venus-mars mr-1'></i> Jenis Kelamin</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['jenis_kelamin'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-address-book mr-1'></i> Tanggal Lahir</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['tanggal'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-map-marker-alt mr-1'></i> Alamat</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['alamat'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-user-tie mr-1'></i> Pekerjaan</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['pekerjaan'] ?>
                                            </p>

                                            <hr>

                                            <strong><i class='fas fa-graduation-cap mr-1'></i> Pendidikan</strong>
                                            <p class='text-muted'>
                                                                          
                                            </p>
                                            <p class='text-muted'>
                                            <?php  echo $data1['pendidikan'] ?>
                                            </p>

                                            <hr>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                <!-- Roitation Utilities -->
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Surat Pengajuan</h6>
                                    </div>
                                    <!-- Target blank untuk membuka tab baru-->
                                    <div class="card-body text-left">
                                        <a href="<?php echo "pengajuan_surat_ket_domisili_user_action.php?nik=".$data1['nik']; ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">Surat Keterangan Domisili</span>
                                        </a>
                                        <hr>
                                        <a href="<?php echo "pengajuan_surat_ket_tidakmampu_user_action.php?nik=".$data1['nik']; ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">Surat Keterangan Tidak Mampu</span>
                                        </a>
                                        <hr>
                                        <a href="<?php echo "pengajuan_surat_ket_usaha_user_action.php?nik=".$data1['nik']; ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">Surat Keterangan Usaha</span>
                                        </a>
                                        <hr>
                                        <a href="<?php echo "pengajuan_surat_pindah_user_action.php?nik=".$data1['nik']; ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                            <span class="text">Surat Keterangan Pindah Domisili</span>
                                        </a>
                                    </div>
                                </div>

                                </div>
                            </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar dari halaman ini</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="action_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>