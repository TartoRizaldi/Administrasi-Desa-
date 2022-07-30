<?php
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    $username = $_SESSION['username_akun'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username_akun = '$username'");
    $data = mysqli_fetch_array($result);

    $id = $_GET['id_data'];
    $data_penduduk = mysqli_query($conn, "SELECT * FROM data_pengajuan_surat WHERE id_data='$id'");

    $data2 = mysqli_fetch_assoc($data_penduduk);
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
    <style type="text/css">
        .conf{
            width: 70%;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav samping sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_super.php">
                <div class="sidebar-brand-icon logo">
                </div>
                <div class="sidebar-brand-text mx-3 text">Administrasi Desa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_admin.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="view_data_penduduk_admin.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Penduduk</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="view_data_pengajuan_admin.php">
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
                    <h1 class="h3 mb-4 text-gray-800">Detail Data Pengajuan</h1>

                    <form autocomplete="off" required="" method="POST" action="">
                        <div class="card-body">
                            <br>
                            <div class="input_down">
                                <a href="view_data_pengajuan_super.php" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-angle-double-left"></i>
                                    </span>
                                    <span class="text"><b>Kembali</b></span>
                                </a>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputStatus" class="input label">Status</label>
                                <input type="text" class="conf" id="exampleInputStatus" required="" name="status" min="0" value="<?php echo $data2['status']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNik" class="input label">NIK</label>
                                <input type="text" class="conf" id="exampleInputNik" required="" name="nik" min="0" value="<?php echo $data2['nik']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNik" class="input label">Nama</label>
                                <input type="text" class="conf" id="exampleInputNik" required="" name="nama" min="0" value="<?php echo $data2['nama']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputJenis" class="input label">Jenis Kelamin</label>
                                <input type="text" class="conf" id="exampleInputJenis"  required="" name="jenis" value="<?php echo $data2['jenis_kelamin']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAgama" class="input label">Agama</label>
                                <input type="text" class="conf" id="exampleInputAgama"  required="" name="agama" value="<?php echo $data2['agama']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTanggal" class="input label">Tanggal Lahir</label>
                                <input type="date" class="conf" id="exampleInputTanggal" required="" name="tanggal" min="0" value="<?php echo $data2['tanggal']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAlamat" class="input label">Alamat</label>
                                <input type="text" class="conf" id="exampleInputAlamat" required="" name="Alamat" min="0" value="<?php echo $data2['alamat']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPekerjaan" class="input label">Pekerjaan</label>
                                <input type="text" class="conf" id="exampleInputPekerjaan" required="" name="Pekerjaan" min="0" value="<?php echo $data2['pekerjaan']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPendidikan" class="input label">Pendidikan</label>
                                <input type="text" class="conf" id="exampleInputPendidikan" required="" name="pendidikan" min="0" value="<?php echo $data2['pendidikan']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputKategori" class="input label">Kategori</label>
                                <input type="text" class="conf" id="exampleInputKategori" required="" name="kategori" min="0" value="<?php echo $data2['kategori']; ?>" readonly>
                                <hr class="sidebar-divider my-0 garis">
                            </div>
                            <?php

                            if ($data2['status'] == "Belum Konfirmasi") {
                                ?>
                                    <a href="<?php echo "proses_data_pengajuan_admin_action.php?id_data=".$data2['id_data']; ?>" class="btn btn-primary btn-block"><b>Proses</b>
                                    </a>
                                <?php
                            }

                            ?>
                        </div>
                        <!-- /.card-body -->
                    </form>

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