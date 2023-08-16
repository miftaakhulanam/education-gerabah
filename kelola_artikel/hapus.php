<?php
session_start();

if( !isset($_SESSION["login"])){
  header("location:../login/index.php");
  exit;
}

include "../koneksi.php";
$id = $_GET['id'];

$delete = mysqli_query($koneksi, "DELETE FROM artikel WHERE id = '$id'");
if($delete){
    echo"<script> alert('Artikel berhasil di hapus');
    document.location.href = 'index.php'</script>";
}
?>