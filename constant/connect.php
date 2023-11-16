<?php 
// DB credentials.
$localhost = "localhost:3307";
$username = "root";
$password = "";
$dbname = "sajivflowers";
//$store_url = "http://localhost/phpinventory/";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}
?>





