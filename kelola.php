<!doctype html>
<!--untuk simpan perubahan atau edit-->
<?php
include 'koneksi.php';
$id         = "";
$judul      = "";
$pengarang  = "";
$penerbit   = "";
$kategori   = "";
$gambar     = "";
if(isset($_GET['edit'])) {
  $id     = $_GET['edit'];
  $query  = "SELECT * FROM tb_buku where id = '$id' "; 
  $sql    = mysqli_query($connect, $query);
  $data   = mysqli_fetch_array($sql);
  $judul  = $data['judul'];
  $pengarang  = $data['pengarang'];
  $penerbit  = $data['penerbit'];
  $kategori  = $data['kategori'];
  $gambar  = $data['gambar'];

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
                <a class="navbar-brand">Kelola Data Buku</a>
                
                </div>
            </nav>
            <figure class="text-center mt-3">
                <blockquote class="blockquote">
                <p>Kelola Data Buku Yang Tersedia</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                Belajar
                <cite title="Source Title">Kelola Data Buku</cite>
                </figcaption>
            </figure>

            <form action="proses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3 row">
              <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>"
                placeholder="Masukkan Judul Buku">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="pengarang" class="col-sm-2 col-form-label">Pengarang Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $pengarang; ?>"
                placeholder="Masukkan Nama Pengarang">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="penerbit" class="col-sm-2 col-form-label">Penerbit Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>"
                placeholder="Masukkan Nama Penerbit">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="kategori" class="col-sm-2 col-form-label">Kategori Buku</label>
              <div class="col-sm-10">
                <select name="kategori" id="kategori" class="form-control" value="<?php echo $kategori; ?> ">
                  <option value=""> -- Kategori Buku -- </option>
                  <option value="umum" <?php if($kategori == "umum") echo "selected"; ?>>umum</option>
                  <option value="komputer" <?php if($kategori == "komputer") echo "selected"; ?>>komputer</option>
                  <option value="akuntansi" <?php if($kategori == "akuntansi") echo "selected"; ?>>akuntansi</option>
                  <option value="kesehatan" <?php if($kategori == "kesehatan") echo "selected"; ?>>kesehatan</option>
                  <option value="psikologi" <?php if($kategori == "psikologi") echo "selected"; ?>>psikologi</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar; ?> ">
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