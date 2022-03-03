<?php include "../inc/dbinfo.inc"; 

 $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);

$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

$n = mysqli_real_escape_string($connection, $username);
$p = mysqli_real_escape_string($connection, $userpw);
$t = mysqli_real_escape_string($connection, $title);
$c = mysqli_real_escape_string($connection, $content);
$d = mysqli_real_escape_string($connection, $date);


if($username && $userpw && $title && $content){
    $query = "INSERT INTO board (name, pw, title, content, date) VALUES ('$n', '$p', '$t', '$c', '$d');";
    if(!mysqli_query($connection, $query)) echo("<p>Error adding employee data.</p>");
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='./commu.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>

<?php
  mysqli_close($connection);

?>


