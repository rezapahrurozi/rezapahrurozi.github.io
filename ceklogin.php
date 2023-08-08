<?php
    include 'koneksi.php';
    if(isset($_POST['btnlogin'])) {
        $username   = $_POST['username'];
        $password   = $_POST['password'];

        if($username == "admin"){
            if($password == "12345"){
                header('location:index.php');
            }else{
                header('location:login.php?pesan=password salah');
            }
        }else{
            header('location:login.php?pesan=username salah');
        }
    }
?>