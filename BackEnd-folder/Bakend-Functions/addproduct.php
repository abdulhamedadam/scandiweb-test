<?php
include 'Product.php';
include 'products/Book.php';
include 'products/DVD.php';
include 'products/Furniture.php';

if (isset($_POST['submit']))
{

    
//$user = new Product();

// Retrieve the form data

    


$sku=($_POST['sku']);
$name=($_POST['name']) ;
$price=($_POST['price']);
$type=($_POST['type_switcher']);

if ($type == 'DVD') {
    $product = new SizeProduct();
    $product->setSku($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setType($type);
    $product->setSize($_POST['size']);
} elseif ($type == 'Book') {
    $product = new WeightProduct();
    $product->setSku($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setType($type);
    $product->setWeight($_POST['weight']);
} else {
    $product = new DimensionProduct();
    $product->setSku($sku);
    $product->setName($name);
    $product->setPrice($price);
    $product->setType($type);
    $product->setHeight($_POST['height']);
    $product->setWidth($_POST['width']);
    $product->setLength($_POST['length']);
}


$attr = $product->getAttributes();

if (!$product->validateSKU($sku))
{
    echo 'Invalid sku input ';
}
elseif (!$product->isUniqueSKU($sku)) 
{
    echo 'SKU has been used before';
    $error_message = "SKU has been used before";
    "<script>document.getElementById('sku-field').querySelector('#sku-error').innerHTML = '$error_message';</script>";
   
   
}
elseif (!$product->validateName($name))
{
    echo "Invalid name input";
} 

elseif (!$product->validatePrice($price)) 
{
    echo "Invalid price input";
}
 elseif (!$product->validateType($type)) 
{
    echo "Invalid type input";
}
else{


$result = $product->save($sku, $name, $price,$type,$attr);


 if($result)   
    {
        header('location:product-list.php');
    }
	else
	{
        die(mysqli_error($con));
    }
}
    
}





?>
