<?php

$connection = mysqli_connect('localhost','root','','card');


?>
<?php

require_once('./operation.php');

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pick-a-pile </title>

   
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-800 to-rose-300 cursor-grab">
<div class="container mt-3">
        <!-- header section  -->
        <div class="row justify-content-center ">
            <div class="col">
                <?php 
                  $idcard = $_GET['cardid'];
                  $title = "select * from card where id='$idcard'";
                  $description =mysqli_query($connection,$title);
      
                
                foreach ($description as $qu) : ?>
                    <?php if ($qu['id'] == $idcard) : ?>

                       <div class=" ml-7 mt-3 ">
                       <div class="flex justify-between space-x-5 mb-2">
                            <span></span>
                            <h5 class="text-md ml-9 mb-3 font-bold text-xl text-teal-50 "><?php echo $qu['q1'] ?></h5>
                            <a href="first.php">
                                <button class=" bg-green-50  text-gray-800 hover:bg-pink-300 hover:text-black txet-center p-2 text-xs rounded-lg border-2  rounded-bl-full  rounded-se-full p-3 hover:scale-105 duration-1000">မေးခွန်းရွေးရန်</button>
                            </a>
                        </div>
                        <hr class="border-b-lg mb-2 ">
                        <h5 class="text-md text-center mb-3 font-bold ml-11 text-teal-50">တစ်ပုံတည်းသာသေချာအာရုံစိုက်ရွေးချယ်ပြီး ထိုရွေးချယ်ထားသောပုံအောက်မှစာတစ်ခုတည်းသာဖတ်ပေးပါ‼️ <br> General ရေးထားတာမို့လို့ မတော်တဆလွဲချော်မှုရှိခဲ့သော် Admin ကိုနားလည်ခွင့်လွှတ်ပေးဖို့မေတ္တာရပ်ခံအပ်ပါတယ်ရှင်
                       </div></h5>


                       </div>
                    <?php endif; ?>
                <?php endforeach; ?>


            </div>

        </div>
        
        <div class=" flex justify-center mt-16">
    <div>
 
  <div  class="col-span-1 flex space-x-12">
  <button onclick="myFunction()">
  <div id="demo" class="hover:text-black  border-2 border-teal-50  hover:scale-105 duration-1000  shadow-2xl p-10 rounded-lg hover:bg-yellow-200 " > <img id="dei" class=" w-32 h-64 rounded-3xl" src="b3.jpg"><h5 id="de" class="w-32 text-xs text-center mt-3 font-serif font-bold text-teal-50">Pile1</h5></div>
</button>
   
<button onclick="myFunction2()">
<div id="demo1" class=" hover:text-black  border-2 border-teal-50  shadow-red-950 hover:scale-105 duration-1000  shadow-2xl p-10 rounded-lg hover:bg-red-300 " > <img id="deii" class=" w-32 h-64 rounded-3xl" src="b3.jpg"><h5  id="de2" class=" w-32 text-xs text-center mt-3 font-serif font-bold text-teal-50 hover:fill-white">Pile 2</h5></div>
</button>

<button onclick="myFunction3()">
    <div id="demo2" class=" hover:text-black  border-2 border-teal-50  shadow-red-950 hover:scale-105 duration-1000 shadow-2xl p-10 rounded-lg hover:bg-blue-300 " > <img id="deiii" class=" w-32 h-64 rounded-3xl" src="b3.jpg"><h5 id="de3" class="w-32 text-xs text-center mt-3 font-serif font-bold text-teal-50 hover:fill-white">Pile 3</h5></div>
    </button>
  </div>
 </div>
</div>
    
    
        </div>
      
    </div>

</body>

<script>
function myFunction() {

  
  var x = document.getElementById("de");
  if (x.innerHTML === "Pile1") {
    x.innerHTML = "<?php echo $qu['a1'] ?>";
    document.getElementById('dei').src='r1.jpg';
      } else {
    x.innerHTML = "Pile1";
    const img = document.createElement("dei");
    document.getElementById('dei').src='b3.jpg';
 
    
  }
}



function myFunction2() {
  var x = document.getElementById("de2");
  if (x.innerHTML === "Pile2") {
    x.innerHTML = "<?php echo $qu['a2'] ?>";
    document.getElementById('deii').src='r2.jpg';
      } else {
    x.innerHTML = "Pile2";
   
     document.getElementById('deii').src='b3.jpg';
  }
}
function myFunction3() {
 
  var x = document.getElementById("de3");
  if (x.innerHTML === "Pile3") {
    x.innerHTML = "<?php echo $qu['a3'] ?>";
    document.getElementById('deiii').src='r3.jpg';
      } else {
    x.innerHTML = "Pile3";
    const img = document.createElement("deiii");
    document.getElementById('deiii').src='b3.jpg';
  }
}

  

</script>

</html>