<!doctype html>
<!--untuk simpan perubahan atau edit-->
<?php
include 'koneksi.php';
$id         = "";
$nama       = "";
$alamat     = "";
$no_handphone   = "";
$status     = "";
if(isset($_GET['edit'])) {
  $id             = $_GET['edit'];
  $query          = "SELECT * FROM tb_anggota where id = '$id' "; 
  $sql            = mysqli_query($connect, $query);
  $data           = mysqli_fetch_array($sql);
  $nama           = $data['nama'];
  $alamat         = $data['alamat'];
  $no_handphone   = $data['no_handphone'];
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
                  <a class="navbar-brand">Kelola Data Anggota</a>
                </div>
            </nav>
            <figure class="text-center mt-3">
                <blockquote class="blockquote">
                <p>Kelola Data Anggota</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                Belajar
                <cite title="Source Title">Kelola Data Anggota</cite>
                </figcaption>
            </figure>

            <form action="proses_anggota.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3 row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>"
                placeholder="Masukkan Nama">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>"
                placeholder="Masukkan Alamat">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="no_handphone" class="col-sm-2 col-form-label">Nomor Handphone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="<?php echo $no_handphone; ?>"
                placeholder="Masukkan Nomor Handphone">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="status" class="col-sm-2 col-form-label">Status Anggota</label>
              <div class="col-sm-10">
                <select name="status" id="status" class="form-control" value="<?php echo $status; ?> ">
                  <option value=""> -- Status Anggota -- </option>
                  <option value="aktif" <?php if($status == "aktif") echo "selected"; ?>>Aktif</option>
                  <option value="tidak_aktif" <?php if($status == "tidak aktif") echo "selected"; ?>>Tidak Aktif</option>
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