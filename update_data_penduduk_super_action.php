<?php

    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    if (isset($_POST['submit'])) {

        $user = $_SESSION['username_akun'];
        $databaru = mysqli_query($conn, "SELECT * FROM akun WHERE username_akun='$user'");
        $data = mysqli_fetch_assoc($databaru);
        $id_akun = $data['id_akun'];

        $nik = $_GET['nik'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $agama = $_POST['agama'];
        $tanggal = $_POST['tanggal'];
        $alamat = $_POST['alamat'];
        $pekerjaan = $_POST['pekerjaan'];
        $pendidikan = $_POST['pendidikan'];
        
        if ($jenis == "") {
            header("location: view_data_penduduk_super.php?update=error");
        }
        else if ($agama == "") {
            header("location: view_data_penduduk_super.php?update=error");
        }
        else {
            $simpanData = mysqli_query($conn, "UPDATE data_penduduk SET nama='$nama',jenis_kelamin='$jenis',agama='$agama',tanggal='$tanggal',alamat='$alamat',pekerjaan='$pekerjaan',pendidikan='$pendidikan' WHERE nik='$nik'");

            $simpanData2 = mysqli_query($conn, "UPDATE akun SET nama_akun='$nama' WHERE username_akun='$nik'");

            header("location: view_data_penduduk_super.php?update=success");
        }
    }

 ?>