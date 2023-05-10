<?php

include ('../BackEnd/BakendFunctions/processForm.php');


?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
	<!-- Bootstrap styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!-- BootStrap Script -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
	 integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

      <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

	
</head>
<body>
	
	<div id="wrapper" class="container pt-4 px-0">
		<div class="d-flex justify-content-between">
		   <div><h1>Add Product</h1></div>
		  <div class="form-group">
			<button name="submit" form="product_form" class="btn btn-primary">Save</button>
			<a href="productlist.php" class="btn btn-secondary">Cancel</a>
		  </div>
	    </div>
		
     <hr>
		<form id="product_form" method="post">
			<!-- SKU -->
			<div class="mb-3">
			<div class="d-inline-flex align-items-center">
				<label for="sku" class="form-label" style="min-width: 100px !important">SKU:</label>
				<input type="text" class="form-control" name="sku" value="<?php echo isset($_POST['sku']) ? $_POST['sku'] : ''; ?>" id ="sku"style="width: 60%" required>
			</div>
		    </div>
			<!-- Name -->
			<div class="mb-3">
			<div class="d-inline-flex align-items-center">
				<label for="name" class="form-label" style="min-width: 100px !important">Name:</label>
				<input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" id ="name"style="width: 60%" required>
			</div>
		    </div>
			<!-- Price ($) -->
			<div class="mb-3">
			<div class="d-inline-flex align-items-center">
				<label for="price" class="form-label" style="min-width: 100px !important">Price ($)</label>
				<input type="number" class="form-control" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" id ="price"style="width: 60%" required>
			</div>
		    </div>
            
			<!-- Type Switcher -->
            <div id="app">
			<div class="mb-3">
			<div class="d-inline-flex align-items-center">
				<label for="type_switcher" class="form-label" style="min-width: 100px !important">Type Switcher</label>
				<select  v-model="type_switcher" class="form-select" id="type_switcher" name="type_switcher"style="width: 165px; margin-left: 20px;">
                <option value="" selected hidden>&nbsp;</option>
					<option value="" selected disabled>Type Switcher</option>
					
					<option value="DVD" value="<?php echo isset($_POST['type_switcher']) ? $_POST['type_switcher'] : ''; ?>">DVD</option>
					<option value="Book" value="<?php echo isset($_POST['type_switcher']) ? $_POST['type_switcher'] : ''; ?>">Book</option>
					<option value="Furniture" value="<?php echo isset($_POST['type_switcher']) ? $_POST['type_switcher'] : ''; ?>">Furniture</option>
				</select>
				
			</div>
		    </div>
			
			<!-- size Group -->			          
			 <div v-if="type_switcher === 'DVD'" class="mb-3"  id="sizeGroup">
				<div class="d-inline-flex align-items-center">
					<label for="size" style="min-width: 100px !important">Size (MB):</label>
					<input type="number" class="form-control" id="size" name="size" style="width: 155px; margin-left: 30px;">
                </div>

                <div class="m-3">
					<small class="text-muted fw-bold">Please, provide size in MB</small>
                </div>
				
			</div>
			
			<!-- WeightGroup -->			         
			 <div class="mb-3"  v-if="type_switcher === 'Book'" id="weightGroup">
				
				<div class="d-inline-flex align-items-center">
					<label for="weight" style="min-width: 100px !important">Weight (Kg):</label>
					<input type="number" class="form-control" id="weight" name="weight" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : ''; ?>" style="width: 155px; margin-left: 30px;">
                </div>

                <div class="m-3">
					<small class="text-muted fw-bold">Please, provide weight in Kg</small>
                </div>
				 
			</div>
			<!-- dimensionsGroup -->
					         
			<div class="mb-3" v-if="type_switcher === 'Furniture'" id="dimensionsGroup">
			<div v-model="height" class="mb-3">
				<div class="d-inline-flex align-items-center">
					<label for="height" style="min-width: 100px !important">Height (cm):</label>
					<input type="number" class="form-control" id="height" name="height" value="<?php echo isset($_POST['height']) ? $_POST['height'] : ''; ?>" style="width: 155px; margin-left: 30px;">
                </div>
			</div>
		    <div  v-model="width" class="mb-3">	
				<div class="d-inline-flex align-items-center">
					<label for="width" style="min-width: 100px !important">Width (cm):</label>
					<input type="number" class="form-control" id="width" name="width" value="<?php echo isset($_POST['width']) ? $_POST['width'] : ''; ?>" style="width: 155px; margin-left: 30px;">
                </div>
			</div>
			<div v-model="length" class="mb-3">
				<div class="d-inline-flex align-items-center">
					<label for="length" style="min-width: 100px !important">Length (cm):</label>
					<input type="number" class="form-control" id="length" name="length" value="<?php echo isset($_POST['length']) ? $_POST['length'] : ''; ?>" style="width: 155px; margin-left: 30px;">
                </div>
            </div> 
                <div  class="m-3">
					<small class="text-muted fw-bold">Please, provide dimensions in cm</small>
                </div>
				
			</div>
            </div>
            
		
		</form>
	</div>
    


<div id="footer" class="text-center mt-30">    
	
		<hr>

		<p class="text-center mt-30">Scandiweb Test assignment</p>
	 
</div>



<script src="JS/add-vue.js"></script>

</body>
</html>

