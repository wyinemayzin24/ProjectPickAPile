

<?php
session_start();

$connection = mysqli_connect('localhost','root','','card');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php


 if(isset($_POST['login'])){
 $an = trim($_POST['name']);
 $ps =trim( $_POST['ps']);
$admin_result = mysqli_query($connection,"SELECT * FROM admin WHERE name='$an' AND password='$ps'");
 $Admin_count = mysqli_num_rows($admin_result);
 if($Admin_count===1){
    $admin_array =mysqli_fetch_assoc($admin_result);
    $_SESSION['admin_array']=$admin_array;
  header('location:show.php');
 
 }
 else{
 
}
 }
?>
<body class=" bg-gradient-to-r from-slate-700 to-gray-700 cursor-grab">
<div class="flex justify-center  h-screen items-center ">

<div class=" rounded-se-full
   rounded-bl-3xl shadow-lg hover:scale-105 duration-1000  shadow-green-400 p-7 w-80  ">
  
    <form action="adminlogin.php" method="POST">
     <h1 class=" font-serif font-bold mr-4 mb-3 text-teal-50 "> Admin login Form</h1>
     <input type="text" name="name" placeholder="Enetr Admin Name" class="text-white border-2 border-gray-700 rounded-lg  bg-gray-600 border-b-2  shadow-green-200 shadow-lg  border-black  font-serif font-bold  mb-5 ">
     <input type="password" name="ps" placeholder="Eneter password" class="text-white  border-2 border-gray-700 rounded-lg  bg-gray-600 border-b-2  shadow-green-200 shadow-lg  border-black  font-serif font-bold  mb-5 ">
     <button class="border-2 border-gray-700 rounded-lg  bg-gray-600 border-b-2  shadow-green-200 shadow-lg  border-black  font-serif font-bold  mb-5 text-teal-50 bg-gray-300 p-1 w-32 rounded-lg font-serif " name="login">Login</button>
    <a href="index.php" class="order-2 border-gray-700 rounded-lg  bg-gray-600 border-b-2  shadow-green-200 shadow-lg  border-black  font-serif font-bold  mb-5 text-teal-50 bg-gray-300 p-1 w-32 rounded-lg font-serif " name="login">Home</a>
</form>

<div>

</div>
</body>
</html>
