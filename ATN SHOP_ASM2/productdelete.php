<?php
echo ("Connect successfully!");
$connect = pg_connect("host=ec2-54-220-35-19.eu-west-1.compute.amazonaws.com
dbname=d3d86pg4upllsh
port=5432
user=zmvsrcbksqwkdt
password=9c571947fb86d6d6fbde944f4bd9d3dfd522e56b3652b3731394cd32983ef33e
sslmode=require");
if ($connect === false) {
  die("ERROR: Could not connect to the database server!");
} else {
  $product_id = $_GET['product_id'];
}
//echo ("Connect successfully!");
$query = "DELETE FROM product WHERE PRODUCTID='$product_id'";
$data = pg_query($connect, $query);
if ($data) {
  echo "<script>alert('Edited succesfully!, Refresh');</script>";
  header('refresh: 3; url=productform.php');
} else {
  echo ("ERROR + $query") . pg_errormessage($query);
}
pg_close($connect);
