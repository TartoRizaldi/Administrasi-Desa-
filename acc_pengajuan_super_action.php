<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

	$nik = $_GET['nik'];
    $result = mysqli_query($conn, "SELECT * FROM data_pengajuan_surat WHERE nik='$nik'");
    $data = mysqli_fetch_array($result);

    $status = "Konfirmasi";

    $update1 = mysqli_query($conn, "UPDATE data_pengajuan_surat SET status='$status' WHERE nik = $nik");
    header("location: view_data_pengajuan_super.php?konfirmasi=success");

    

?>