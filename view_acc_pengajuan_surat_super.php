<?php
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    $username = $_SESSION['username_akun'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username_akun = '$username'");
    $data = mysqli_fetch_array($result);
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_super.php">
                <div class="sidebar-brand-icon logo">
                </div>
                <div class="sidebar-brand-text mx-3 text">Administrasi Desa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_super.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Super Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Data Akun</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="input_staf_super.php">Input</a>
                        <a class="collapse-item" href="view_staf_super.php">View</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item active">
                <a class="nav-link" href="view_acc_pengajuan_surat_super.php">
                    <i class="fas fa-fw fa-clone"></i>
                    <span>ACC Pengajuan Surat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="view_data_penduduk_super.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Penduduk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_data_pengajuan_super.php">
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
                    <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Surat</h1>

                    <div class="input_down">
                        <?php 
                        if(isset($_GET['update'])){
                            if($_GET['update'] == "success"){
                                echo "
                                    <center>
                                    <div class='alert alert-success alert-dismissible div4'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Data berhasil diperbarui</strong>
                                    </div>
                                    <center>
                                ";
                            }
                            else if($_GET['update'] == "error"){
                                echo "
                                    <center>
                                    <div class='alert alert-danger alert-dismissible div4'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Data kurang lengkap (Agama dan Jenis Kelamin belum diisi)</strong>
                                    </div>
                                    <center>
                                ";
                            }
                        }
                        else if(isset($_GET['input'])){
                            if($_GET['input'] == "success"){
                                echo "
                                    <center>
                                    <div class='alert alert-success alert-dismissible div4'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Berhasil menambah data</strong>
                                    </div>
                                    <center>
                                ";
                            }
                        }
                        else if(isset($_GET['delete'])){
                            if($_GET['delete'] == "success"){
                                echo "
                                    <center>
                                    <div class='alert alert-success alert-dismissible div4'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Data berhasil dihapus</strong>
                                    </div>
                                    <center>
                                ";
                            }
                        }
                        else if(isset($_GET['acc'])){
                            if($_GET['acc'] == "success"){
                                echo "
                                    <center>
                                    <div class='alert alert-success alert-dismissible div4'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>ACC berhasil</strong>
                                    </div>
                                    <center>
                                ";
                            }
                        }
                        else if(isset($_GET['proses'])){
                            if($_GET['proses'] == "success"){
                                echo "
                                    <center>
                                    <div class='alert alert-success alert-dismissible div4'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Data berhasil diproses</strong>
                                    </div>
                                    <center>
                                ";
                            }
                        }
                        ?>
                    </div>
                    <br>

                <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Kategori Surat</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Kategori Surat</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th></th>
                  </tr>
                  </tfoot>
                  <tbody>

                    <?php
                     require ('koneksi.php');

                      $result= mysqli_query($conn, "SELECT * FROM data_pengajuan_surat");

                      $no = 1;
                      while ($data = mysqli_fetch_array($result)){
                    ?>

                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['status']; ?></td>
                      <td><?php echo $data['kategori']; ?></td>
                      <td><?php echo $data['nik']; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td>
                        <center>
                            <a href="<?php echo "acc_pengajuan_surat_super_action.php?id_data=".$data['id_data']; ?>" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" title="ACC">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="<?php echo "delete_data_pengajuan_surat_super_action.php?id_data=".$data['id_data']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </center>
                      </td>
                    </tr>

                        <?php
                          }
                        ?>

                  </tbody>
                </table>
                </div>
              <!-- /.card-body -->
                </div>
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