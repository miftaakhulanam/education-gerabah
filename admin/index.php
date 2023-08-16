<?php
session_start();
if( !isset($_SESSION["login"])){
  header("location:../login/index.php");
  exit;
}

include "../koneksi.php";

$query = query("SELECT * FROM pengguna WHERE role = 1");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon" />
    <title>Admin</title>
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
                    <li class="py-4 text-orange-300"><a href="../kelola_artikel/index.php" class="pl-4">Kelola Artikel</a></li>
                    <li class="py-4"><a href="index.php" class="pl-4">Admin</a></li>
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
        <h1 class="py-10 border-b-[1px] ml-2  border-slate-400 ">Dashboard/Admin</h1>

        <div class="mt-4">
            <h1 class="text-xl font-semibold pl-3 py-1">Data Admin</h1>
            <div class="bg-white rounded-md p-4 m-2">
                <table class="text-center w-full border-2 border-slate-200">
                    <tr class="p-3 border-2 border-slate-200">
                        <th class="p-3 text-sm border-2 border-slate-200">No</th>
                        <th class="p-3 text-sm border-2 border-slate-200">Nama</th>
                        <th class="p-3 text-sm border-2 border-slate-200">Username</th>
                        <th class="p-3 text-sm border-2 border-slate-200">Telepon</th>
                        <th class="p-3 text-sm border-2 border-slate-200">Email</th>
                        <th class="p-3 text-sm border-2 border-slate-200">Alamat</th>
                    </tr>
                    <?php $no = 0; foreach($query as $data) : $no++;?>
                    <tr class="border-2 border-slate-200">
                        <td class="p-3 text-sm border-2 border-slate-200"><?= $no ?></td>
                        <td class="p-3 text-sm border-2 border-slate-200"><?= $data['nama']; ?></td>
                        <td class="p-3 text-sm border-2 border-slate-200"><?= $data['username']; ?></td>
                        <td class="p-3 text-sm border-2 border-slate-200"><?= $data['telp']; ?></td>
                        <td class="p-3 text-sm border-2 border-slate-200"><?= $data['email']; ?></td>
                        <td class="p-3 text-sm text-left border-2 border-slate-200"><?= $data['address']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
        
    </div>
   </section>

</body>
</html>