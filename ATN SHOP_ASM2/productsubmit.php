<?php
$connect = pg_connect("host=ec2-54-220-35-19.eu-west-1.compute.amazonaws.com
dbname=d3d86pg4upllsh
port=5432
user=zmvsrcbksqwkdt
password=9c571947fb86d6d6fbde944f4bd9d3dfd522e56b3652b3731394cd32983ef33e
sslmode=require");
if ($connect === false) {
  die("ERROR: Could not connect to the database server!");
} else {
  //echo ("Connect successfully!");
  $product_name = $_POST['product-name'];
  $product_price = $_POST['product-price'];
  $product_category = $_POST['product-category'];
  $atn_store = $_POST['store'];
  $product_quantity = $_POST['product-quantity'];
  $product_description = $_POST['product-description'];
}
//echo ("Connect successfully!");
$query = "INSERT INTO product (product_name, product_price, product_category, atn_store, product_quantity, product_description) 
VALUES('$product_name', '$product_price', '$product_category', '$atn_store', '$product_quantity', '$product_description');";
$result = pg_query($connect, $query);
if ($result) {
  echo "<script>alert('Record added succesfully!, Refresh');</script>";
  header('refresh: 3; url=productform.php');
} else {
  echo ("ERROR + $query") . pg_errormessage($query);
}
pg_close($connect);
