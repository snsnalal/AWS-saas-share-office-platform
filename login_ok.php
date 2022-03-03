<?php
//세션을 사용하기 위한 모든 페이지에서 필요
session_start();
?>

<?php include "../inc/dbinfo.inc"; 

 $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);

$username = $_POST['name'];
$userpw = $_POST['pw'];

$n = mysqli_real_escape_string($connection, $username);
$p = mysqli_real_escape_string($connection, $userpw);

if($username && $userpw){
    $query = "select * from account where id = '$n';";
    $result = mysqli_query($connection, $query);
    $query_data = mysqli_fetch_row($result);
if($query_data[2] == $userpw)
{
$_SESSION["ID"] = $username;
echo "<script>
    alert('로그인 성공되었습니다.');
    location.href='./SamplePage.php';</script>";
}
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>

<?php
  mysqli_close($connection);

?>