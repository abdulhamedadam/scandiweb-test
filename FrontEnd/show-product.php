<?php
include ('../BackEnd/BakendFunctions/Product.php');


$row = new Product();
$id=$_GET['showid'];
$user = $row->getID($id);





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Product show</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  
</head>
<body class="">
<div class="min-h-screen flex flex-col justify-between"> 
  <div class="container mx-auto py-6 px-24 overflow-y-auto "> 
  

  <form id="deleteForm" method="post">
    <div class="flex justify-between mb-8">
        <div><h1 class="text-4xl font-semibold"><?php echo $user[0]['name']; ?> Product show</h1></div>
       <div class="">  
        <button class="rounded-lg bg-gray-500 p-2 text-white mx-2"><a href="productlist.php">cancel</a></button>

        
       </div>  
       
     
    </div>
    <hr>

    <div class="my-5 hover:bg-gray-100 border-2 border-gray-600 px-2 pt-2 pb-6">
  <card class="bg-white rounded-lg overflow-hidden ">
    <div class="p-6">
      <div class="text-center">
        <div class="mb-4">
          <h2 class="mb-2 text-2xl font-semibold text-gray-800">Name: <?php echo $user[0]['name']; ?></h2>
          <p class="mb-2  text-2xl font-semibold text-gray-800">SKU: <?php echo $user[0]['sku']; ?></p>
        </div>
        <p class="mb-2 text-2xl font-semibold text-gray-800">Price: <?php echo $user[0]['price']."$"; ?></p>
        <p class="mb-2 text-2xl font-semibold text-gray-800">Type: <?php echo $user[0]['type']; ?></p>
        <p class="mb-2 text-2xl font-semibold text-gray-800"><?php echo $user[0]['attribute']; ?></p>
        <div class="mt-4">

        </div>
      </div>
    </div>
  </card>
</div>


      </form>
 
    

 

   



</div>

   
</div>
    
    
    <div class=" px-24 py-10">
        
        <footer> 
            <hr>
            <p class="text-center mt-8">Scandiweb Test assignment</p>
        </footer>    
    </div>

    
    <script src="addproduct-Vue.js"></script>
    </body>

    </html>