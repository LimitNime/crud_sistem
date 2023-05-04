<?php
include 'koneksi.php';
session_start();

$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>CRUD MAHASISWA</title>
</head>
<script>
$(document).ready(function () {
    $('#dt').DataTable();
});
</script>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DATABASE MAHASISWA</a>
        </div>
    </nav>
    <div class="container-fluid">
        <h1 class="mt-4">Data Mahasiswa Tadris Matematika 4A</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi Data yang Telah Disimpan di Database</p>
            </blockquote>
            <figcaption class="blockquote-footer">CRUD <cite title="Source Title">Create Update Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        <?php
            if(isset($_SESSION['eksekusi'])):
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['eksekusi'];?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            session_destroy();
            endif;
            ?>
        <div class="table-responsive">
            <table id="dt" class="table align-middle stripe cell-border hover text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Mahasiswa</th>
                        <th>Alamat Lengkap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?php echo ++$no;?>.</td>
                        <td><?php echo $result['nisn'];?></td>
                        <td><?php  echo $result['nama_siswa'];?></td>
                        <td><?php  echo $result['jenis_kelamin'];?></td>
                        <td><img src="img/<?php echo $result['foto_siswa'];?>" style="width: 100px;"></td>
                        <td><?php echo $result['alamat'];?></td>
                        <td>
                        <a href="kelola.php?ubah=<?php echo $result['id_siswa'];?>" type="button" class="btn btn-success btn-sm btn-space">Edit</a>
                        <a href="proses.php?hapus=<?php echo $result['id_siswa'];?>" type="button" class="btn btn-danger btn-sm btn-space" onClick="return confirm('Apakah anda yakin untuk menghapus data tersebut?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>