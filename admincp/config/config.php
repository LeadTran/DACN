<?php
$mysqli = new mysqli("localhost","root","","petshop");
if($mysqli->connect_errno){
  echo "Connect failed" . $mysqli->connect_error;
  exit();
}
?>