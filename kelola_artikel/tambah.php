<?php
session_start();

if( !isset($_SESSION["login"])){
  header("location:../login/index.php");
  exit;
}

include "../koneksi.php";

if(isset($_POST['simpan'])){
    $judul = htmlspecialchars($_POST['judul']);
    $isi = htmlspecialchars($_POST['isi']);
    $gambar = upload();

    if(!$gambar) {
        echo"<script>
                alert('Artikel gagal ditambahkan');
                document.location.href = 'index.php'
            </script>";
        die;
    }

    $insert = mysqli_query($koneksi,"INSERT INTO artikel(judul_artikel,isi_artikel,gambar_artikel) VALUES('$judul','$isi','$gambar')");

    if($insert){
        echo"<script>
                alert('Artikel berhasil ditambahkan');
                document.location.href = 'index.php'
            </script>";
    }else {
        echo"<script>
                alert('Artikel gagal ditambahkan');
                document.location.href = 'index.php'
            </script>";
    }
}

// upload gambar
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4) {
        echo "<script>
                alert('Silahkan masukkan gambar terlebih dahulu!')
            </script>";

        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda masukkan bukan gambar!')
            </script>";

        return false;
    }

    if($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!')
            </script>";

        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../public/img/' . $namaFileBaru);
    return $namaFileBaru;

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
    <title>Kelola Artikel</title>
</head>
<body class="bg-slate-200">
    <header class="fixed h-full w-64 bg-orange-500 text-white">
        <div class="flex py-9 items-center justify-center">
            <h1 class="font-semibold text-2xl">Education Gerabah</h1>
        </div>
            <nav class="">
                <ul class="">
                    <li class="py-4 text-orange-300"><a href="../dashboard/index.php" class="pl-4">Dashboard</a></li>
                    <li class="py-4 text-orange-300"><a href="../kelola_pelatihan/index.php" class="pl-4">Kelola Pelatihan</a></li>
                    <li class="py-4"><a href="index.php" class="pl-4">Kelola Artikel</a></li>
                    <li class="py-4 text-orange-300"><a href="../admin/index.php" class="pl-4">Admin</a></li>
                    <li class="py-4 text-orange-300"><a href="../kelola_admin/index.php" class="pl-4">Kelola Admin</a></li>
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
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Dashboard/Kelola Artikel</h1>

        <div class="mt-4">
            <h1 class="text-xl font-semibold text-center">Tambah Artikel</h1>
            <form action="" class="mt-4 " method="POST" enctype="multipart/form-data">
                <div class="w-[80%] mx-auto">
                    <label for="judul" class="text-lg ">Judul</label>
                    <input type="text" name="judul" class="w-full mt-2 h-9 rounded-md p-2" required>
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <label for="isi" class="text-lg ">Isi Artikel</label>
                    <input type="text" name="isi" class="w-full mt-2 h-9 rounded-md p-2" required>
                </div>
                <!-- <div class="w-[80%] mx-auto mt-4">
                    <label for="gambar" class="text-lg ">Gambar</label>
                    <input type="text" name="gambar" class="w-full mt-2 h-9 rounded-md p-2" required>
                </div> -->
                <div class="w-[80%] mx-auto mt-4">
                    <label for="gambar" class="text-lg ">Gambar</label>
                    <input id="gambar" name="gambar" type="file" class="block w-full  file:bg-orange-500 text-sm text-gray-900 border-lg border-gray-900 rounded-md cursor-pointer bg-gray-50 focus:outline-none">
                </div>
                <div class="w-[80%] mx-auto mt-4">
                    <button name="simpan" class="py-2 px-4 bg-orange-500 hover:bg-orange-600 text-white rounded-md mb-11">Simpan</button>
                    <a href="index.php" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md mb-11 ml-2">Batal</a>
                </div>
            </form>
        </div>
        
    </div>
   </section>

   <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

</body>
</html>