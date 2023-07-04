<?php
session_start();
if(isset($_SESSION["login"])){
  header("location:../public/index.php");
  exit;
}


include "../koneksi.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='$username' and password = '".MD5($password)."'");

    if(mysqli_num_rows($login) === 1){
    $data = mysqli_fetch_assoc($login);
    if($data['role']== 1 ){

      $_SESSION['login'] = true;

      header("location:../dashboard/index.php");

    }else if($data['role']== 0 ){

      $_SESSION['login'] = true;

      header("location:../public/index.php");

    }
  }else {
    echo"<script> alert('Username atau password anda salah!');
    document.location.href = 'index.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon" />
    <title>Login | Education Gerabah</title>
</head>
<body>
<div class="h-screen flex">
          <div class="bg-center bg-no-repeat bg-cover bg-blend-multiply bg-orange-400 hidden lg:flex w-full lg:w-1/2
          justify-around items-center" style="background-image: url('../public/img/login.jpg')">
          </div>
          <div class="flex w-full lg:w-1/2 justify-center items-center bg-white space-y-8">
            <div class="w-full px-8 md:px-32 lg:px-32">
            <form class="bg-white rounded-md shadow-2xl p-5 border-2 border-slate-200" action="" method="POST">
              <h1 class="text-gray-800 font-bold text-3xl mb-5 py-6">Login</h1>
              <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
                <input id="username" class=" pl-2 w-full outline-none border-none" type="text" name="username" placeholder="Username" required />
              </div>
              <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                </svg>
                <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password" required />
              </div>

              <button type="submit" name="submit" class="block w-full bg-orange-500 mt-5 py-2 rounded-2xl hover:bg-orange-600 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Login</button>
              <div class="flex justify-end mt-4">
                <span class="text-sm ml-2 hover:text-orange-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Forgot Password ?</span>
              </div>
            </form>
            </div>
            
          </div>
      </div>
</body>
</html>