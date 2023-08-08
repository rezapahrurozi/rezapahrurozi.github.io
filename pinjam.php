<!DOCTYPE html>
<?php

include 'koneksi.php';
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <title>Data Pinjam Buku</title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar bg-body-tertiary mt-3">
        <div class="container-fluid">
          <a class="navbar-brand">Data Pinjam Buku</a>
          <form class="d-flex ms-auto">
          </form>
          <ul>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"> Data Buku </a>
            </li>
          </ul>
          <ul>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="anggota.php"> Data Anggota </a>
            </li>
          </ul>
          <ul>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pinjam.php"> Data Peminjaman Buku </a>
            </li>
          </ul>
          <ul class="navbar-nav ms-2">
            <li class="nav-item">
              <a href="Logout.php" type="button" class="btn btn-success mb-2"> Logout 
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <figure class="text-center mt-3">
        <blockquote class="blockquote">
          <p>Data Pinjam Buku</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          Belajar
          <cite title="Source Title">CRUD : Create, Read, Update, Delete</cite>
        </figcaption>
      </figure>
      <a href="kelola_pinjam.php" type="button" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
      fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 
      0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
      </svg> Tambah Data Pinjam Buku
      </a>
      <table id="example" class="table table-hover table-bordered align-middle">
        <!--untuk tambah datatables-->
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">id</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
          $query = "SELECT * FROM tb_pinjam";
          $sql   = mysqli_query($connect, $query);
          $no=1;
          while ($data = mysqli_fetch_array($sql)){
          ?>
          <tr>
            <th scope="row"><?php echo $no++; ?></th>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['judul_buku']; ?></td>
            <td><?php echo $data['nama_peminjam']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <!--untuk edit dan hapus
            <a href="kelola_anggota.php?edit=<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg></a>
            <a href="proses_anggota.php?hapus=<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 
            1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 
            .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg></a>
            -->
            </td>
          </tr>
          <?php
          } ?>
        </tbody>
      </table>
      <!--kress pagination, search, dan export-->
      <script> 
        $(document).ready(function() {
        $('#example').DataTable( {
          dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
          } );
        } );
      </script>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
