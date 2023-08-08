<?php
include 'koneksi.php';
if(isset($_POST['btnProses'])) {
    $tanggal        = $_POST['tanggal'];
    $judul_buku     = $_POST['judul_buku'];
    $nama_peminjam  = $_POST['nama_peminjam'];
    $status         = $_POST['status'];
    

    if($_POST['btnProses']=="tambah") {
        $gambar     = $_FILES['gambar']['name'];
        $dir        = "gambar/";
        $dirfile    = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($dirfile, $dir.$gambar);
        $query      = "INSERT INTO tb_pinjam VALUES ('','$tanggal','$judul_buku','$nama_peminjam','$status') ";
        $sql        = mysqli_query($connect, $query);
        if($sql){
            header('location:pinjam.php');
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

            $query  = "UPDATE tb_pinjam SET tanggal='$tanggal',judul_buku='$judul_buku',nama_peminjam='$nama_peminjam', status='$status' WHERE id='$_POST[id]'";
            $sql    = mysqli_query($connect, $query);
            $update = mysqli_fetch_array($sql);
            if($sql){
                header('location:pinjam.php');
            }
        }
    }
}elseif($_GET['hapus']) {
    $queryhapus = "SELECT gambar FROM tb_pinjam WHERE id='$_GET[hapus]'";
    $sqlhapus   = mysqli_query($connect, $queryhapus);
    $data       = mysqli_fetch_array($sqlhapus);

    unlink("gambar/".$data['gambar']);
    $delete = "DELETE from tb_pinjam where id = '$_GET[hapus]' ";
    $sql    = mysqli_query($connect, $delete);
    if($sql){
        header('location:pinjam.php');
    }
}
?>