<?php
//세션을 사용하기 위한 모든 페이지에서 필요
session_start();
?>

<?php include "../inc/dbinfo.inc"; 


 $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);

$name = $_POST["name"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$price = $_POST["price"];

/* Add an employee to the table. */
   $n = mysqli_real_escape_string($connection, $name);
   $i = mysqli_real_escape_string($connection, $_SESSION["ID"]);
   $la = mysqli_real_escape_string($connection, $lat);
   $ln = mysqli_real_escape_string($connection, $lng);
   $p = mysqli_real_escape_string($connection, $price);

   $query = "INSERT INTO office (name, id, lat, lon, price) VALUES ('$n', '$i', '$la', '$ln', '$p');";
  
   if(!mysqli_query($connection, $query)) echo "<script>
    alert('로그인 해주세요');
    history.back();</script>";;
echo "<script>
    location.href='./addoffice.php';</script>";
?>