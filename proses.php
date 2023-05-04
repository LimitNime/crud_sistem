<?php
include 'fungsi.php';
session_start();
//CREATE---------------------------------------------//
if (isset($_POST['aksi'])) {
  if ($_POST['aksi'] == "add") {
    $berhasil = tambah_data($_POST, $_FILES);
    if ($berhasil) {
      $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";
      header("location: index.php");
    } else {
      echo $berhasil;
    }
    //UPDATE-----------------------------------------------//
  } else if ($_POST['aksi'] == "edit") {
    $berhasil = ubah_data($_POST, $_FILES);
    if ($berhasil) {
      $_SESSION['eksekusi'] = "Data Berhasil Diperbarui";
      header("location: index.php");
    } else {
      echo $berhasil;
    }
  }
}
//DELETE--------------------------------------------//
if (isset($_GET['hapus'])) {
  $berhasil = hapus_data($_GET);
  if ($berhasil) {
    $_SESSION['eksekusi'] = "Data Berhasil Hapus";
    header("location: index.php");
  } else {
    echo $query;
  }
}
?>