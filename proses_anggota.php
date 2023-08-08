<?php
include 'koneksi.php';
if(isset($_POST['btnProses'])) {
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $no_handphone   = $_POST['no_handphone'];
    $status         = $_POST['status'];
    

    if($_POST['btnProses']=="tambah") {
        $gambar     = $_FILES['gambar']['name'];
        $dir        = "gambar/";
        $dirfile    = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($dirfile, $dir.$gambar);
        $query      = "INSERT INTO tb_anggota VALUES ('','$nama','$alamat','$no_handphone','$status') ";
        $sql        = mysqli_query($connect, $query);
        if($sql){
            header('location:anggota.php');
        }
    }else{
        if($_FILES['gambar']['name']!=""){
            $queryhapus = "SELECT gambar FROM tb_buku WHERE id='$_POST[id]'";
            $sqlhapus   = mysqli_query($connect, $queryhapus);
            $data       = mysqli_fetch_array($sqlhapus);

            unlink("gambar/".$data['gambar']);
            $gambar     = $_FILES['gambar']['name'];
            $dir        = "gambar/";
            $dirfile    = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($dirfile, $dir.$gambar);

            $query  = "UPDATE tb_anggota SET nama='$nama',alamat='$alamat',no_handphone='$no_handphone', status='$status' WHERE id='$_POST[id]'";
            $sql    = mysqli_query($connect, $query);
            $update = mysqli_fetch_array($sql);
            if($sql){
                header('location:anggota.php');
            }
        }
    }
}elseif($_GET['hapus']) {
    $queryhapus = "SELECT gambar FROM tb_buku WHERE id='$_GET[hapus]'";
    $sqlhapus   = mysqli_query($connect, $queryhapus);
    $data       = mysqli_fetch_array($sqlhapus);

    unlink("gambar/".$data['gambar']);
    $delete = "DELETE from tb_anggota where id = '$_GET[hapus]' ";
    $sql    = mysqli_query($connect, $delete);
    if($sql){
        header('location:anggota.php');
    }
}
?>