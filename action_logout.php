<?php
    session_start();
    $_SESSION['username'] = '';
    unset($_SESSION['username']);
    session_unset();
    session_destroy();

    echo "<script> 
            alert ('Anda telah logout');
            document.location.href = 'index.php';
          </script>";
?>