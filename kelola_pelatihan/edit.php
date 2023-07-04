<?php
session_start();

if( !isset($_SESSION["login"])){
  header("location:../login/index.php");
  exit;
}

include "../koneksi.php";
$id_pendaftaran = $_GET['id_pendaftaran'];

$query = query ("SELECT * FROM pendaftaran_pelatihan WHERE id_pendaftaran = '$id_pendaftaran'")[0]; 
if(isset($_POST['simpan'])){
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $update = mysqli_query($koneksi,"UPDATE pendaftaran_pelatihan SET 
                            nama = '$nama',
                            email = '$email',
                            kategori = '$kategori',
                            tanggal = '$tanggal',
                            pesan = '$pesan' WHERE id_pendaftaran = '$id_pendaftaran'");

    if($update){
        echo"<script> alert('Perubahan berhasil di simpan');
        document.location.href = 'index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon" />
    <title>Kelola Pelatihan</title>
</head>
<body class="bg-slate-200">
    <header class="fixed h-full w-64 bg-orange-500 text-white">
        <div class="flex py-9 items-center justify-center">
            <h1 class="font-semibold text-2xl">Education Gerabah</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4 text-orange-300"><a href="../dashboard/index.php" class="pl-4">Dashboard</a></li>
                    <li class="py-4"><a href="index.php" class="pl-4">Kelola Pelatihan</a></li>
                    <li class="py-4 text-orange-300"><a href="../admin/index.php" class="pl-4">Admin</a></li>
                    <li class="py-4 mb-5 text-orange-300"><a href="../kelola_admin/index.php" class="pl-4">Kelola Admin</a></li>
                </ul>
                <button type="button" class="absolute bottom-5">
                    <a href="../logout.php" class="flex inset-x-0 bg-gray-200 hover:bg-gray-300 text-orange-500 font-medium rounded-lg text-sm px-20 py-2 mx-4 items-center">Logout
                        <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                        </svg>
                    </a>
                </button>
            </nav>
       </header>
   <section class="ml-64">
    <div class="container px-5 pb-5">
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Dashboard/Kelola Pelatihan</h1>

        <div class="mt-4">
            <h1 class="text-xl font-semibold text-center">Edit Data Pelatihan</h1>
            <form action="" class="mt-4 " method="POST">
                <div class="w-[80%] mx-auto">
                    <label for="nama" class="text-lg ">Nama</label>
                    <input type="text" name="nama" class="w-full mt-2 h-9 rounded-md p-2" required value="<?= $query['nama']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="email" class="text-lg ">Email</label>
                    <input type="email" name="email" class="w-full mt-2 h-9 rounded-md p-2" required value="<?= $query['email']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="kategori" class="text-lg ">Kategori</label>
                    <select
                        id="kategori" name="kategori"
                        class="shadow-sm bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        required>
                        <option class="text-gray-900 text-sm" value="Ekonomi">Ekonomi</option>
                        <option class="text-gray-900 text-sm" value="Menengah">Menengah</option>
                        <option class="text-gray-900 text-sm" value="Premium">Premium</option>
                    </select>
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="tanggal" class="text-lg ">Tanggal</label>
                    <input type="date" name="tanggal" class="w-full mt-2 h-9 rounded-md p-2" required value="<?= $query['tanggal']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="pesan" class="text-lg ">Pesan</label>
                    <input type="text" name="pesan" class="w-full mt-2 h-9 rounded-md p-2" required value="<?= $query['pesan']; ?>">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <button name="simpan" class="py-2 px-4 bg-orange-500 hover:bg-orange-600 text-white rounded-md">Simpan</button>
                    <a href="index.php" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md mb-11 ml-2">Batal</a>
                </div>
            </form>

        </div>
        
    </div>
   </section>

</body>
</html>