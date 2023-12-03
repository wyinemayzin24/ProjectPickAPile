<?php
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

$nameerror="";
$psderror="";
$emaerroe="";
$psderror="";
$cpserroe="";
$matcherror="";

if(isset($_POST['done'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password=$_POST['password'];
   $comfirm_password=$_POST['comfirm_password'];
   if(empty($name)){
    $nameerror =" User Name is Required";
    }
    if(empty($email)){
        $emaerroe="Email is Required";
        }
    
    if(empty($password)){
                $psderror="Password is Required";
                }
    if(empty($comfirm_password)){
                    $cpserroe ="comfirmPassword is Required";
                    }
                    
    if($password<>$comfirm_password){
       $matcherror = "Password is does not  match";
    }
    
   if(!empty($name) && !empty($email) && !empty($password) && !empty($comfirm_password) && $password==$comfirm_password){
    $regi = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
    $resultt = mysqli_query($connection,$regi);
    if($resultt){
       header('location:userlogin.php');
 
      }
 
 
     }
  }



?>
<body class="bg-gradient-to-r from-gray-800 to-rose-300 cursor-grab">
<div class="flex h-screen items-center justify-center ">
  <div class="w-64 p-7 shadow-lg shadow-green-300 duration-1000 hover:scale-105  ">
    <form action="userregistration.php" method="POST">
      <h1 class="mb-3 text-center shadow-teal-100 font-serif font-bold text-teal-50">User Registration Form</h1>
      <input type="text" name="name" placeholder="Set Name" class="mb-5 border-2 border-green-700 rounded-lg shadow-lg shadow-pink-300  border-b-2  border-blacktracking-widest font-serif font-bold<?php if($nameerror != ""){ ?> is-invalid <?php }?>">
      <h1 class=" text-center w-full text-white  font-serif text-xs rounded-mb mb-3 px-full"> <?php  echo $nameerror;?></h1>
      
      <input type="text" name="email" placeholder="Enetr Email" class="mb-5 border-b-2 border-2 border-green-700 rounded-lg shadow-lg shadow-pink-300    border-black font-serif font-bold" />        
      <h1 class=" text-center w-full text-white  font-serif text-xs rounded-mb mb-3 text-centerpx-full">  <?php  echo  $emaerroe;?></h1>
      
      <input type="text" name="password" placeholder="Set password" class="mb-5 border-b-2 border-2 border-green-700 rounded-lg shadow-lg shadow-pink-300   border-black font-serif font-bold" />        
       <h1 class="w-full text-white font-serif text-xs rounded-mb text-center mb-3 px-full">  <?php  echo $psderror;?></h1>
      
       <input type="text" name="comfirm_password" placeholder="Comfirm password" class="mb-5 border-2 border-green-700 rounded-lg shadow-lg shadow-pink-300  border-b-2 border-black font-serif font-bold" />   
       <h1 class="w-full text-white font-serif text-xs rounded-mb text-center mb-3 px-full">  <?php  echo    $cpserroe;?></h1>
      <h1 class="text-center w-full text-white  font-serif text-xs rounded-mb mb-3 px-full"> <?php  echo $matcherror;?></h1>

      <button class="w-full mb-3 rounded-lg bg-gray-300 p-1 font-serif" name="done">Done</button>

    </form>
    <form action="index.php" method="post">
    <button class=" w-full rounded-lg bg-gray-300 p-1 font-serif" name="cancell">Home</button>
    </form>
    <?php

if(isset($_POST['cancell'])){
    header('location:index.php');
}
?>
    <div></div>
  </div>
</div>

</body>
</html>
