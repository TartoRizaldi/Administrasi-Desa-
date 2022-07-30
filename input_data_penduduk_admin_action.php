<?php
    require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $agama = $_POST['agama'];
        $tanggal = $_POST['tanggal'];
        $alamat = $_POST['alamat'];
        $pekerjaan = $_POST['pekerjaan'];
        $pendidikan = $_POST['pendidikan'];
        $username = $_SESSION['username_akun'];
        $akses = 3;

        $result0= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username_akun='$username'");
        $data0 = mysqli_fetch_array($result0);
        $ha = $data0['id_akun'];

        $result= mysqli_query($conn, "SELECT nik FROM data_penduduk WHERE nik='$nik'");
        $data = mysqli_fetch_array($result);
        $nik2 = $data['nik'];

        $result1= mysqli_query($conn, "SELECT username_akun FROM akun WHERE username_akun='$nik'");
        $data1 = mysqli_fetch_array($result1);
        $user = $data1['username_akun'];

        if ($nik == $nik2) {
            header("location: input_data_penduduk_admin.php?input=ready");
        }
        else if ($jenis == "") {
            header("location: input_data_penduduk_admin.php?input=error");
        }
        else if ($agama == "") {
            header("location: input_data_penduduk_admin.php?input=error");
        }
        else {
            if ($username == $user) {
            header("location: input_data_penduduk_admin.php?input=ready");
            }

            else {
                $simpanData = mysqli_query($conn, "INSERT INTO data_penduduk VALUES ('$nik','$nama','$jenis','$agama','$tanggal','$alamat','$pekerjaan','$pendidikan','$ha')");

                $simpanDataAkun = mysqli_query($conn, "INSERT INTO akun VALUES ('','$nama','$nik','$nik','$akses')");

                header("location: view_data_penduduk_admin.php?input=success");
            }
        }
    }
?>