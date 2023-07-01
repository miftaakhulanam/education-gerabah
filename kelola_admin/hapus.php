<?php
session_start();

if( !isset($_SESSION["login"])){
  header("location:../login/index.php");
  exit;
}

include "../koneksi.php";
$pengguna_id = $_GET['pengguna_id'];

$delete = mysqli_query($koneksi, "DELETE FROM pengguna WHERE pengguna_id = '$pengguna_id'");
if($delete){
    echo"<script> alert('Admin berhasil di hapus');
    document.location.href = 'index.php'</script>";
}
?>