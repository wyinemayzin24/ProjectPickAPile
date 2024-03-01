

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

    require('connect.php');
      $query = "SELECT * FROM register";
      $result=mysqli_query($connection,$query);
      foreach ($result as $res){
       ?>
     <tr>
      <th scope="row">2</th>
      <td> <?php echo $res['name']; ?> </td>
      <td> <?php echo $res['email']; ?></td>
      <td> <?php echo $res['password']; ?></td>
    </tr>
       
       <?php
      }
      ?>


?>
    </tr>
  </tbody>
</table>
</body>
</html>