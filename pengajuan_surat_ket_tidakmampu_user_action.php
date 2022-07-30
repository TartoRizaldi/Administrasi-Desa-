<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    $user = $_SESSION['username_akun'];
	$nik0 = $_GET['nik'];

    $result0= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username_akun='$user'");
    $data0 = mysqli_fetch_array($result0);
    $ha = $data0['id_akun'];

    $result= mysqli_query($conn, "SELECT * FROM data_penduduk WHERE nik='$nik0'");
    $data = mysqli_fetch_array($result);

    $nik = $data['nik'];
    $nama = $data['nama'];
    $jenis = $data['jenis_kelamin'];
    $agama = $data['agama'];
    $tanggal = $data['tanggal'];
    $alamat = $data['alamat'];
    $pekerjaan = $data['pekerjaan'];
    $pendidikan = $data['pendidikan'];
    $status = "Belum Konfirmasi";
    $kategori = "Surat Tidak Mampu";

    $simpanData = mysqli_query($conn, "INSERT INTO data_pengajuan_surat VALUES ('','$nik','$nama','$jenis','$agama','$tanggal','$alamat','$pekerjaan','$pendidikan','$status','$kategori','$ha')");

    header("location: dashboard_user.php?pengajuan=success");
?>