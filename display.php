<?php

include('./connected.php');
if(isset($_POST['add'])){

 $des = $_POST['des'];
 $q1=$_POST['q1'];
 $a1=$_POST['a1'];
 $a2=$_POST['a2'];
 $a3=$_POST['a3'];
 $a4=$_POST['a4'];

$query = "INSERT INTO `card`(`des`, `q1`, `a1`, `a2`, `a3`, `a4`) VALUES ('$des','$q1','$a1','$a2','$a3','$a4')";
$reult = mysqli_query($connection,$query);
if($reult)
{
    echo '<script>alert("You Add one row")</script>'; 
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>