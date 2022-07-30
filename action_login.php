<?php

    require 'koneksi.php';

    if(isset($_POST['submit'])){

        // mengambil isian dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn,"select * FROM akun WHERE username_akun = '$username' AND password_akun = '$password'");
        $test = mysqli_num_rows($query);
        $pgw = mysqli_fetch_assoc($query);

        if ($test > 0) {
                switch ($pgw['id_akses']) {
                    case 1:
                        session_start();
                        $_SESSION['username_akun'] = $username;
                        echo "
                            <script> 
                                alert ('Login Berhasil Kepala Desa');
                                document.location.href = 'dashboard_super.php';
                            </script>";
                    break;
                    case 2:
                        session_start();
                        $_SESSION['username_akun'] = $username;
                        echo "
                            <script> 
                                alert ('Login Berhasil Staf');
                                document.location.href = 'dashboard_admin.php';
                            </script>";
                    break;
                    case 3:
                        session_start();
                        $_SESSION['username_akun'] = $username;
                        echo "
                            <script> 
                                alert ('Login Berhasil User');
                                document.location.href = 'dashboard_user.php';
                            </script>";
                    break;
                }
        }else{
                        echo "<script> 
                            alert ('Login Gagal');
                        document.location.href = 'index.php';
                    </script>";
            }
    }
?>