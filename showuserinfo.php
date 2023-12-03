<?php
$connection = mysqli_connect('localhost', 'root', '', 'card');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 flex justify-center mt-20 space-x-5">
<div class="">
  <h1 class=" text-teal-50 font-serif tracking-wide text-center text-2xl mb-3">User Information</h1>
      <table class="shadow-purpl-800 w-64 table-auto">
    
      <thead class="border-b-1 border-teal-400 ">
        
        <tr>
          <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm">ID</th>

          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌UserName</th>
          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌Email</th>
          <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm">Password</th>
          <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm">Delete</th>
        
        </tr>
      </thead>
      <?php
      $select = "select * from users";
      $selectResult = mysqli_query($connection, $select);
      if ($selectResult) {
        foreach ($selectResult as $row) {
          echo "<tbody class='border-b-2 border-teal-800  border border-teal-700 text-sm'> 
           <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[id]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm' >$row[name]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[email]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[password]</td>";
          
            echo "<td class='border text-center border-slate-700 p-2'><a href='showuserinfo.php?id_u=$row[id]'  class='px-3 text-white hover:bg-red-800 bg-red-600 rounded text-xs p-1 font-serif'> Delete</a></td>";
        }
      }
      ?>
    </table>
    
   </div> 
   
 <div>
 <a href='show.php' class='text-red-700 font-bold bg-teal-50 p-1 shadow-lg shadow-red-400   text-xs font-serif'>Back</a>
 </div>
       <div> 
        <form action="showuserinfo.php" method="post">
        <button name="clear" class="text-red-700 font-bold bg-teal-50 p-1 shadow-lg shadow-red-400   text-xs font-serif">Claer All feedback</button>
        </form>
        <?php
if(isset($_POST['clear'])){
    
    $delequery = " DELETE FROM feedback";
    $delete = mysqli_query($connection,$delequery);
    if($delete)
    {
     
        
}
}

?>



          </div>
</div>
       <div>
       <table class="shadow-purpl-800 w-full table-auto">
       <h1 class=" text-teal-50 font-serif tracking-wide text-center text-2xl mb-3">User feedback</h1>
     <thead class="border-b-1 border-teal-400 ">
    
      <tr>
   
      
        <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌UserName</th>
        <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌Email</th>
      
        <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm">Review</th>
     
        
      
      </tr>
   
      <?php
      $review = "select * from feedback";
      $reviewResult = mysqli_query($connection, $review);
      if ($reviewResult) {
        foreach ($reviewResult as $row) {
         
          echo "<tbody class='border-b-2 border-teal-800  border border-teal-700 text-sm'> 
                <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[userName]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm' >$row[userEmail]</td>";
        
            echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[message]</td>";
           
           
        }
      }
      ?>
    </thead>
     

</body>
</html>

<?php
if(isset($_GET['id_u'])){
    $uid= $_GET['id_u'];
    $dquery = " DELETE FROM users WHERE id='$uid'";
    $requ = mysqli_query($connection,$dquery);
    if($requ)
    {
        echo "<script> alert ('Successfully deleted ');</script>";
        
}
}

?>

