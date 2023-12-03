

<?php
$connection = mysqli_connect('localhost','root','','card');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gradient-to-r from-gray-800 to-rose-300 cursor-grab">
<div class="flex justify-center  h-screen items-center  ">

<div class=" shadow-lg hover:scale-105 duration-1000 overflow-hidden rounded-se-full  w-80 shadow-green-400 p-7 w-64  ">
  
    <form action="userlogin.php" method="POST">
     <h1 class=" font-serif font-bold  mb-3 text-teal-50 "> User login Form</h1>
     <input type="text" name="name" placeholder="Enetr User Name" class=" w-48 border-2 border-green-700 rounded-lg shadow-lg shadow-pink-300  font-serif font-bold  mb-5 ">
     <input type="text" name="ps" placeholder="Enetr password" class="w-48 border-2 border-green-700 rounded-lg  shadow-lg shadow-pink-300 font-serif font-bold  mb-5 ">
     <button class="w-48  p-1  mb-3 rounded-lg font-serif border-2  border-green-200 text-teal-50 " name="login">Login</button>
    
    </form>
    <form action="userregistration.php" method="post">
    <button class="-mb-8 w-48 p-1  rounded-lg font-serif border-2  border-green-200 text-teal-50 " name="Cancel">Register Here</button>
    
    </form>
<div>

</div>
</body>
</html>
<?php


 if(isset($_POST['login'])){
 $an = $_POST['name'];
 $ps = $_POST['ps'];
 $user_result = mysqli_query($connection,"SELECT * FROM users WHERE name='$an' AND password='$ps'");
 $user_count = mysqli_num_rows($user_result);
 if($user_count===1){
  $user_array= mysqli_fetch_assoc($user_result) ;
  $_SESSION['$user_session'] = $user_array;
  header('location:first.php');
 
 }
 else{
   
}
 }
?>
<?php

if(isset($_POST['Cancel'])){
    header('location.userregistration.php');
}

?>