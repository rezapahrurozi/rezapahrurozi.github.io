<!doctype html>
<!--untuk simpan perubahan atau edit-->
<?php
include 'koneksi.php';
$id             = "";
$tanggal        = "";
$judul_buku     = "";
$nama_peminjam  = "";
$status         = "";
if(isset($_GET['edit'])) {
  $id             = $_GET['edit'];
  $query          = "SELECT * FROM tb_anggota where id = '$id' "; 
  $sql            = mysqli_query($connect, $query);
  $data           = mysqli_fetch_array($sql);
  $tanggal        = $data['tanggal'];
  $alamat         = $data['alamat'];
  $nama_peminjam  = $data['nama_peminjam'];
  $status         = $data['status'];

}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    <title>Kelola Data</title>
  </head>
  <body>
    <div class="container">
            <nav class="navbar bg-body-tertiary mt-3">
                <div class="container-fluid">
                  <a class="navbar-brand">Kelola Data Pinjam Buku</a>
                </div>
            </nav>
            <figure class="text-center mt-3">
                <blockquote class="blockquote">
                <p>Kelola Data Pinjam Buku</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                Belajar
                <cite title="Source Title">Kelola Data Pinjam Buku</cite>
                </figcaption>
            </figure>

            <form action="proses_pinjam.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3 row">
              <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>"
                placeholder="">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $judul_buku; ?>"
                placeholder="Masukkan Judul Buku">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?php echo $nama_peminjam; ?>"
                placeholder="Masukkan Nama Peminjam">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="status" class="col-sm-2 col-form-label">Status Anggota</label>
              <div class="col-sm-10">
                <select name="status" id="status" class="form-control" value="<?php echo "SELECT * FROM tb_buku"; ?> ">
                  <option value=""> -- Status Pinjam -- </option>
                  <option value="Di Pinjam" <?php if($status == "Di Pinjam") echo "selected"; ?>>Di Pinjam</option>
                  <option value="Sudah Kembali" <?php if($status == "Sudah Kembali") echo "selected"; ?>>Sudah Kembali</option>
                  <option value="Belum Kembali" <?php if($status == "Belum Kembali") echo "selected"; ?>>Belum Kembali</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <?php
              if(isset($_GET['edit'])) {
                echo "<button type='submit' class='btn btn-primary' name='btnProses' value='edit'>
                Simpan Perubahan</button>";
              }else {
                echo "<button type='submit' class='btn btn-primary' name='btnProses' value='tambah'>Tambah Data</button>";
              }

              ?>

            </div>
            </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    -->
  </body>
</html>