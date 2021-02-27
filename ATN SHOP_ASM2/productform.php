<?php
session_start();
if (isset($_SESSION["username"])) {
  include('product.html');
} else {
  header('Location: ./login.php');
}
