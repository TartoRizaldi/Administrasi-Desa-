<?php

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    $id = $_GET['id_data'];
    $databaru = mysqli_query($conn, "SELECT * FROM data_pengajuan_surat WHERE id_data='$id'");
    $data = mysqli_fetch_array($databaru);
    $id2 = $data['id_data'];
    $status = "Proses";

    $username = $_SESSION['username_akun'];

    $result2 = mysqli_query($conn, "SELECT id_akun FROM akun WHERE username='$username'");
    $data2 = mysqli_fetch_array($result2);
    $user = $data2['id_akun'];

    $updateData = mysqli_query($conn, "UPDATE data_pengajuan_surat SET status='$status' WHERE id_data='$id2'");

    header("location: view_data_pengajuan_admin.php?proses=success");


 ?>