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
<body class=" bg-gradient-to-r from-gray-700 to-rose-300 cursor-grab">
  <div>
 
    <div>
    <div class="grid grid-cols-1 gap-4 mt-7 ml-7 mr-7">
    <div class="flex justify-center mb-2">
      <h1 class="  p-3 w-4/5  text-md font-bold text-teal-50  text-center mt-3 shadow-md shadow-purple-300 duration-1000 hover:scale-105 font-bold rounded-se-full 
 rounded-ss-full rounded-br-full  text-xl  tracking-wide ">သင်နှစ်သက်ရာမေးခွန်းကို ရွေးချယ်ပါ။</h1>
    
   <hr class="text-black border-x-black  border-sky-500 ">
    </div>
    <?php 
            $title = "select * from card";
            $description =mysqli_query($connection,$title);

            
            foreach ($description as $question) : ?>

                <form action="second.php" method="get">
                 <div class="flex justify-center ml-7"> 
                 <div class=" w-4/5   p-1 mt-3 shadow-md shadow-purple-300 duration-1000 hover:scale-105">
                   <a href="second.php?cardid=<?php echo $question['id'] ?>" class=" p-1 text-md font-bold text-teal-50">
                                <?php echo $question['q1'] ?>
                   </a>
                         </div>
                 </div>
                         
                           </form>


                 
            

    <?php endforeach; ?>

  </div>

    </div>
    <div>
    <div class="flex justify-between ml-7 mr-7 ">
    <div class="w-42 mb-7  p-2  rounded-lg ">
  
   <div class="shadow-2xl  p-5 px-12 rounded-se-full 
   rounded-bl-full overflow-hidden shadow-md shadow-purple-300 duration-1000 hover:scale-105 mt-9">
   <table class="border-b-2 border-teal-800  -mt-6">
   <tr class="border-b-2 border-purple-300 mb-3  "><td class=" text-teal-50 p-2 font-serif  text-sm">ကွန်ပျူတာ တက္ကသိုလ်(Hinthada))</td>
    <tr class="border-b-2 border-purple-300 mb-3  "><td class=" text-teal-50 p-2 font-serif  text-sm">Your Profile</td> 

    <tr class="border-b-2 border-purple-300 mb-3 "><td class=" text-teal-50 p-2 font-serif  text-sm" >Name</td> <td class="text-teal-50 p-2 font-serif text-sm" ><?php echo $_SESSION['$user_session']['name']; ?></td></tr>
    <tr class="border-b-2 border-purle-300 mb-3 "><td class=" text-teal-50 p-2 font-serif  text-sm" >Email</td> <td class="text-teal-50 p-2 font-serif text-sm" ><?php echo $_SESSION['$user_session']['email']; ?></td></tr>


    
  </table>
  
   </div>
   
    </div>
     <div>
     <form action="index.php" method="post">
     <button name="lo" class="text-teal-50   rounded-bl-full shadow-lg mb-9 bg-red-800 text-xs hover:scale-105  duration-1000  font-serif shadow-red-300 p-2 rounded-se-full  px-5"> logout </button>
     </div>

     </form>
     <?php
     if(isset($_POST['lo'])){
      session_destroy();
      header('location:index.php');
     }

     ?>
    </div>
 
    </div>
    </div>
  </div>

</body>
</html>