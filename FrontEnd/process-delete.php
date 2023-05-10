<?php
ob_start();
include ('../BackEnd/BakendFunctions/Product.php');


$row = new Product();
$users = $row->getAll();
$product=$row->find('sku');



if (isset($_POST['checkedIds']) && isset($_POST['deleteAll'])) {
  $checkedIds = $_POST['checkedIds'];
  $deleteMsg = $row->Massdelete($checkedIds);
  if($deleteMsg)
  {
    header('location:productlist.php');
  }
}

ob_end_flush();
?>