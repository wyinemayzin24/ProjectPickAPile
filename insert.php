<?php require_once('./operation.php'); ?>
<?php include('./connected.php');

if (isset($_POST['add'])) {
  $q1 = $_POST['q1'];
  $a1 = $_POST['a1'];
  $a2 = $_POST['a2'];
  $a3 = $_POST['a3'];
  $query = "INSERT INTO card( `q1`, `a1`, `a2`, `a3`) VALUES ('$q1','$a1','$a2','$a3')";
  $reult = mysqli_query($connection, $query);
  if ($reult) {
    echo '<script>alert("You Add one row")</script>';
    header('location:show.php');
  } else {
    die(mysqli_errno($connection));
  }
}
?>

<?php
$cid = null;
if (isset($_GET['id_to_update'])) {
  $cid = $_GET['id_to_update'];
  $query = "SELECT * FROM card WHERE id=$cid";
  $result = mysqli_query($connection, $query);
  if ($result) {
    $cardupdate =  mysqli_fetch_assoc($result);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AddNew</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-800">
  <div class="mt-20 flex justify-center space-x-9">
    <?php if ($cid == null) { ?>
      <div class="h-80  w-64 rounded-xl p-4 shadow-md duration-1000 hover:scale-105  shadow-teal-50 ">
        <h1 class="mb-3 text-center font-serif text-lg text-white font-bold">အသစ်တည်ဆောက်ရန်</h1>

        <form action="insert.php" method="post" enctype="multipart/form-data">
          <?php inputFild("Question1", "q1", "textaera"); ?>
          <?php inputFild("Answer1", "a1", "textaera"); ?>
          <?php inputFild("Answer2", "a2", "textaera"); ?>
          <?php inputFild("Answer3", "a3", "textaera"); ?>
          <button class="rounded-md bg-pink-300 p-2 px-3 font-serif text-xs font-bold duration-1000 hover:scale-105" name="add">ထည့်ရန်</button>
        </form>
      </div>
    <?php } ?>
    <?php if ($cid != null) { ?>
      <div class="flex h-80 w-64 justify-center">
        <div class="w-64 rounded-md  p-4 shadow-md shadow-teal-50 duration-1000 hover:scale-105">
          <h1 class="mb-3 text-white text-center font-serif font-bold">ပြင်ဆင်ရန်</h1>
          </h1>
          <form action="insert.php?id_to_update=<?php echo $cid ?>" method="post">
            <textarea name="q1" placeholder="<?php echo $cardupdate['q1']; ?>" type="text" class="rounded-lg bg-purple-200 px-8"><?php echo $cardupdate['q1']; ?></textarea>
            <textarea name="a1" placeholder="<?php echo $cardupdate['a1']; ?>" type="text" class="rounded-lg bg-purple-200 px-8"><?php echo $cardupdate['a1']; ?></textarea>
            <textarea name="a2" placeholder="<?php echo $cardupdate['a2']; ?>" type="text" class="rounded-lg bg-purple-200 px-8"><?php echo $cardupdate['a2']; ?></textarea>
            <textarea name="a3" placeholder="<?php echo $cardupdate['a3']; ?>" type="text" class="rounded-lg bg-purple-200 px-8"><?php echo $cardupdate['a3']; ?></textarea>

            <button name="update" class="rounded-md bg-purple-300 p-2 px-3 font-serif text-xs font-bold duration-1000 hover:scale-105">ပြီးပါပီ</button>
          </form>
        </div>
      </div>
    <?php } ?>
    <!--add-->
  </div>
</body>

</html>

<?php

if (isset($_POST['update'])) {
  try {
    $q1 = $_POST['q1'];
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $query = "UPDATE card SET q1='$q1',a1='$a1',a2='$a2',a3='$a3' WHERE id=$cid";
    $result = mysqli_query($connection, $query);
    if ($result) {
      echo "<script> alert('UPdated');</script>";
      header('location:show.php');
    } else {
      die('error' . mysqli_error($connection));
    }
  } catch (mysqli_sql_exception $e) {
    var_dump($e);
    exit;
  }
}
?>