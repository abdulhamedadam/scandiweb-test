
<?php

include ('processForm.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
	<!-- Bootstrap styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!-- BootStrap Script -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
	 integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	 <!-- jQuery Script -->
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Add Product</title>
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
        <form action="processForm.php" id="product_form" method="post">
			<!-- SKU -->
			<span id ="error"></span>
			<div class="mb-3" id="sku-field">
			<div class="d-inline-flex align-items-center">
				<label for="sku" class="form-label" style="min-width: 100px !important">SKU:</label>
				<input type="text" class="form-control" name="sku"  id ="sku"style="width: 60%" value="<?php echo isset($_POST['sku']) ? $_POST['sku'] : ''; ?>" required>
				
			</div>
			<span class="sku-error"></span>
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
				<input type="number" class="form-control" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" step="0.01" id ="price"style="width: 60%" required>
			</div>
		    </div>
				<!-- Type Switcher -->
				<div class="mb-3">
			<div class="d-inline-flex align-items-center">
				<label for="productType" class="form-label" style="min-width: 100px !important">Type Switcher</label>
				<select class="form-select" id="productType" name="productType"  style="width: 165px; margin-left: 20px;">
					
					<option value="" selected disabled>Type Switcher</option>
					<option value="" selected hidden>&nbsp;</option>
					<option value="DVD">DVD</option>
					<option value="Book">Book</option>
					<option value="Furniture">Furniture</option>
				</select>
				
			</div>
		    </div>

			<!-- size Group -->			          
			<div class="mb-3" style="display: none;" id="sizeGroup">
				<div class="d-inline-flex align-items-center">
					<label for="size" style="min-width: 100px !important">Size (MB):</label>
					<input type="number" class="form-control" id="size" name="size"  style="width: 155px; margin-left: 30px;">
                </div>

                <div class="m-3">
					<small class="text-muted fw-bold">Please, provide size in MB</small>
                </div>
				
			</div>

			<!-- WeightGroup -->			         
			<div class="mb-3" style="display: none;" id="weightGroup">
				
				<div class="d-inline-flex align-items-center">
					<label for="weight" style="min-width: 100px !important">Weight (Kg):</label>
					<input type="number" class="form-control" id="weight" name="weight"  style="width: 155px; margin-left: 30px;">
                </div>

                <div class="m-3">
					<small class="text-muted fw-bold">Please, provide weight in Kg</small>
                </div>
				 
			</div>

			<!-- dimensionsGroup -->		         
			<div class="mb-3" style="display: none;" id="dimensionsGroup">
			<div class="mb-3">
				<div class="d-inline-flex align-items-center">
					<label for="height" style="min-width: 100px !important">Height (cm):</label>
					<input type="number" class="form-control" id="height" name="height"  style="width: 155px; margin-left: 30px;">
                </div>
			</div>
		    <div class="mb-3">	
				<div class="d-inline-flex align-items-center">
					<label for="width" style="min-width: 100px !important">Width (cm):</label>
					<input type="number" class="form-control" id="width" name="width"  style="width: 155px; margin-left: 30px;">
                </div>
			</div>
			<div class="mb-3">
				<div class="d-inline-flex align-items-center">
					<label for="length" style="min-width: 100px !important">Length (cm):</label>
					<input type="number" class="form-control" id="length" name="length"  style="width: 155px; margin-left: 30px;">
                </div>
            </div> 
                <div class="m-3">
					<small class="text-muted fw-bold">Please, provide dimensions in cm</small>
                </div>
				
			</div>

			

	
		</form>

    </div>
	<div id="footer" class="text-center mt-30">    
		<hr>
		<p class="text-center mt-30">Scandiweb Test assignment</p>	
    </div>

    <script>
		 
	$(document).ready(function() {
    // handle productType change event
    $("#productType").change(function() {
        // get selected option
        var selectedOption = $(this).children("option:selected").val();

        // hide all product type-specific attribute groups
        $("#sizeGroup").hide();
        $("#weightGroup").hide();
        $("#dimensionsGroup").hide();

        // show the product type-specific attribute group related to the selected option
        if (selectedOption == "DVD") {
            $("#sizeGroup").show();
            $("#size").attr("required", true);
            $("#size").attr("min", 0);
            $("#size").attr("step", 0.01);
            $("#size").attr("placeholder", "Size (MB)");
            $("#size").attr("title", "Please, provide size in MB");
        } else if (selectedOption == "Book") {
            $("#weightGroup").show();
            $("#weight").attr("required", true);
            $("#weight").attr("min", 0);
            $("#weight").attr("step", 0.01);
            $("#weight").attr("placeholder", "Weight (Kg)");
            $("#weight").attr("title", "Please, provide weight in Kg");
		}else if (selectedOption == "Furniture") {
            $("#dimensionsGroup").show();
            $("#height").attr("required", true);
            $("#height").attr("min", 0);
            $("#height").attr("step", 0.01);
            $("#height").attr("placeholder", "Height (cm)");
            $("#height").attr("title", "Please, provide height in cm");
            $("#width").attr("required", true);
            $("#width").attr("min", 0);
            $("#width").attr("step", 0.01);
            $("#width").attr("placeholder", "Width (cm)");
            $("#width").attr("title", "Please, provide width in cm");
            $("#length").attr("required", true);
            $("#length").attr("min", 0);
            $("#length").attr("step", 0.01);
            $("#length").attr("placeholder", "Length (cm)");
            $("#length").attr("title", "Please, provide length in cm");
        }
    });
    });


</script>
</body>
</html>