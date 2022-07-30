<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

	$nik = $_GET['nik'];

	$result = mysqli_query($conn, "DELETE FROM data_penduduk WHERE nik='$nik'");
	
    $result1 = mysqli_query($conn, "DELETE FROM data_pengajuan_surat WHERE nik='$nik'");

	$result2 = mysqli_query($conn, "DELETE FROM akun WHERE username_akun='$nik'");

	header("location: view_data_penduduk_super.php?delete=success");

?>