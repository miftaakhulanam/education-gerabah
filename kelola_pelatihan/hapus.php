<?php
session_start();

if( !isset($_SESSION["login"])){
  header("location:../login/index.php");
  exit;
}

include "../koneksi.php";
$id_pendaftaran = $_GET['id_pendaftaran'];

$delete = mysqli_query($koneksi, "DELETE FROM pendaftaran_pelatihan WHERE id_pendaftaran = '$id_pendaftaran'");
if($delete){
    echo"<script> alert('Data berhasil di hapus');
    document.location.href = 'index.php'</script>";
}
?>