<?php
//세션을 사용하기 위한 모든 페이지에서 필요
session_start();
?>

<?php include "../inc/dbinfo.inc"; 

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);

$id = $_POST["id"];
$name = $_POST["name"];
$pw = $_POST["pw"];
$phone = $_POST["phone"];

$i = mysqli_real_escape_string($connection, $id);
$n = mysqli_real_escape_string($connection, $name);
$p = mysqli_real_escape_string($connection, $pw);
$ph = mysqli_real_escape_string($connection, $phone);


   $query = "INSERT INTO account (id, name, pw, phone) VALUES ('$i', '$n', '$p', '$ph');";

  if(!mysqli_query($connection, $query))
{
 echo "<script>
    alert('회원가입에 실패했습니다.');
    history.back();</script>";
}
else
{
echo "<script>
    alert('회원가입 성공되었습니다.');
    location.href='./login.php';</script>";
}


?>