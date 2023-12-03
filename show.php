<?php
session_start();


$connection = mysqli_connect('localhost', 'root', '', 'card');


?>
<?php
$result = [];

function getResult($val)
{
  $connection = mysqli_connect('localhost', 'root', '', 'card');
  $query = "SELECT * FROM feedback";
  return $val = mysqli_query($connection, $query);
}

$result = getResult($result)

?>

<?php
if (isset($_GET['id_to_delete'])) {
  $connection = mysqli_connect('localhost', 'root', '', 'card');

  $delete_id = $_GET['id_to_delete'];
  $ok = "DELETE FROM card WHERE id=$delete_id";
  $resude = mysqli_query($connection, $ok);
  if ($resude) {
    echo "<script> alert('Successfully Deleted');</script>";
    $result = getResult($resude);
  } else {
    die('Error' . mysqli_error($connection));
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

  
  <body class="container ml-9 bg-gray-800 mt-7">
   
   <div class="">
   <div class="flex justify-between ">
    <div class="w-48 mb-7 shadow-lg p-2  rounded-lg shadow-teal-50 ">
  <h1 class="text-teal-50 p-2 font-serif text-lg text-center">Admin Profile </h1>
  <table class="border-b-2 border-teal-800">
    <tr class="border-b-2 border-teal-800 mb-3  "><td class=" text-teal-50 p-2 font-serif text-sm">ID</td> 
    <td class=" border-b-2 border-teal-800 text-teal-50 p-2 font-serif text-sm"><?php echo $_SESSION['admin_array']['id']; ?></td></tr>
    <tr class="border-b-2 border-teal-800 mb-3 "><td class=" text-teal-50 p-2 font-serif  text-sm" >Name</td> <td class="text-teal-50 p-2 font-serif text-sm" ><?php echo $_SESSION['admin_array']['name']; ?></td></tr>
   
  </table>
  </div>
 
   <div> 
    <form action="index.php" method="post">
    <button name="logout" class="text-teal-50 shadow-lg mb-9 bg-red-500 text-xs font-serif shadow-red-400 p-2 px-5"> lougout</button>
    </form>
   <?php
     if(isset($_POST['logout'])){
      session_destroy();
      header('location:index.php');
     }

   ?>
 <tr> <td><a href="showuserinfo.php" class="text-red-700 font-bold bg-teal-50 p-2 shadow-lg shadow-red-400   text-xs font-serif ">Users Info </a></td></tr>
   </div>
   </div>
      <div>
      <table class="shadow-purpl-800 w-full table-auto">
      <thead class="border-b-1 border-teal-400 ">
        <tr>
          <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm">ID</th>

          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌မေးခွန်း</th>
          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌အဖြေ ၁</th>
          <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌အဖြေ ၂</th>
          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">‌အဖြေ ၃</th>
         
          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm">အသစ်</th>
          <th class="border border-teal-800 p-2 text-teal-50  font-serif text-sm ">ဖျတ်ရန်</th>
          <th class=" border border-teal-800 p-2 text-teal-50  font-serif text-sm ">ပြင်ဆင်ရန်</th>
        </tr>
      </thead>
      <?php
      $select = "select * from card";
      $selectResult = mysqli_query($connection, $select);
      if ($selectResult) {
        foreach ($selectResult as $row) {
          echo "<tbody class='border-b-2 border-teal-800  border border-teal-700 text-sm'> 
           <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[id]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm' >$row[q1]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[a1]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[a2]</td>";
          echo "
            <td class='border border-teal-800 p-2 text-teal-50  font-serif text-sm'>$row[a3]</td>";
          
          echo "<td class='border text-center py-2 border-slate-700 p-2'><a href='insert.php' class='px-3 bg-yellow-100 hover:bg-yellow-300 rounded text-xs p-1 font-serif'> New</a></td>";
          echo "<td class='border text-center border-slate-700 p-2'><a href='show.php?id_to_delete=$row[id]'  class='px-3 text-white hover:bg-red-800 bg-red-600 rounded text-xs p-1 font-serif'> Delete</a></td>";
          echo "<td class='border  text-center border-slate-700 p-2' ><a href='insert.php?id_to_update=$row[id]' class='px-3 bg-purple-200 hover:bg-purple-500 rounded text-xs p-1 font-serif'>Update</a></td>";
        }
      }
      ?>
    </table>
    
   </div>
      </div>
    
   </div>
</body>

</html>