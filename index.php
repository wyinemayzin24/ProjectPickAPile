<?php
include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            padding: 50;
        }
    </style>

</head>
<?php 

$nameerror="";
$emailerror="";
$pswerror="";


require "connect.php";


if(isset($_POST['submit'])){
    $name =  $_POST['name'];
    $email=  $_POST['email'];  
    $password=md5($_POST['password']);

    if(empty($name)){
        $nameerror =" User Name is Required";
        }
    if(empty($email)){
            $emailerror="Email is Required";
            } 
    if(empty($password)){
                $pswerror="Password is Required";
                }   
                
if(!empty($name) && !empty($email) && !empty($password)){
    $query = "INSERT INTO register(name,email,password) VALUES ('$name','$email','$password')";
    $result= mysqli_query($connection,$query);
    if($result){
        echo " <script>alert('Successfully Register')</script> ";
        header('location:next.php');
    
    
     }else{
        die('Error'.mysqli_error($connection));
     }
    
    }

 

}
?>
<body class="">
   <div class="container ">
    <div class="">
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <!-- form -->
        <div class="col-md-5">
            <div class="card bg-primary-subtle">
                <div class="card-body">
                <h5 class="card-title ml-4 text-primary ">Register Form</h5>
               <form method="post" action="">
               <input   type="text" class="form-control mb-2" placeholder="Username"  name="name">
               <span class="text-danger "><?php echo $nameerror;?></span>

                <input  type="email" class="form-control  mb-2" placeholder="Email" name="email">
                <span class="text-danger "><?php echo $emailerror;?></span>

                <input   type="text" class="form-control mb-2" placeholder="Password" name="password">
                <span class="text-danger "><?php echo $pswerror;?></span>
                
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               </form> 
                </div>
                </div>

            </div>
        </div>
        <!-- formend -->
        <div class="col-md-4"></div>
    </div>
    </div>
   </div>
</body>
</html>