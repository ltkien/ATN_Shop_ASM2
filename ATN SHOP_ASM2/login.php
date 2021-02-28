<?php
$account = pg_connect("host=ec2-54-220-35-19.eu-west-1.compute.amazonaws.com
dbname=d3d86pg4upllsh
port=5432
user=zmvsrcbksqwkdt
password=9c571947fb86d6d6fbde944f4bd9d3dfd522e56b3652b3731394cd32983ef33e
sslmode=require");

if ($account === false) {
  die("ERROR: Could not connect to the database server!");
} else {
  echo ("Connect successfully! ");
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM staff WHERE username = '$username' AND \"password\" = '$password'";
  $result = pg_query($account, $query);
  $count = pg_num_rows($result);
  if ($count == 1) {
    session_start();
    $_SESSION["username"] = $username;
    header('Location: /productform.php');
  } else {
    echo ("Wrong username or password. Please try again!") . pg_errormessage($query);
    header('refresh: 1; url=/index.php'); //wrong reset
  }
}
pg_close($account);
