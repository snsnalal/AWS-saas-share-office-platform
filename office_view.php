<?php include "../inc/dbinfo.inc"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="style5.css">
    <!--인터넷 css,js 스타일-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script 
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script 
    src = "http://kit.fontawesome.com/2d323a629b.js"></script>
    <script type="text/javascript" src="myjs.js"></script> 
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3166010aa9cacbebcf432be55ffb7ee0"></script>
<script>
function bbbb()
{
<?php
	if(!isset($_SESSION['ID']))
            {
   $check = "none";
   $checkk = "block";
            }
             else
             {
               $check = "block";
$checkk="none";
             }
?>
document.getElementById("check").style.display = "<?php echo $check; ?>";
   document.getElementById("log").style.display = "<?php echo $checkk; ?>";

}
</script>
    <title>0UO│당신을 위한 공유오피스</title>
    
</head>
<body onload="bbbb();">
    <?php
  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);
  /* Ensure that the EMPLOYEES table exists. */
  VerifyEmployeesTable($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the EMPLOYEES table. */
  $employee_name = htmlentities($_POST['name']);
  $employee_address = htmlentities($_POST['phone']);

  if (strlen($employee_name) || strlen($employee_address)) {
    AddEmployee($connection, $employee_name, $employee_address);
  }

?>

 <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0; height: 100%; width: fit-content;" id="rightMenu">
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>NAME</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="name" maxlength="45" size="30" />
      </td>
</tr>
<tr>
<td>PHONE</td>
</tr>
<tr>
      <td>
        <input type="text" name="phone" maxlength="50" size="60" />
      </td>
</tr>
<tr>
      <td>
        <input type="submit" value="Add Data" />
      </td>
    </tr>
  </table>
</form>
    </div>
     <!----><!----><!--네비--><!----><!---->
  <nav class="navbar">
    <!--네비 로고그림-->
    <div class="navbar_logo">
        <a href="SamplePage.php">
            <img src="./img/logo.png" alt="logo" width="300px" height= "60px" class="logo">
        </a>
    </div>
    <!--네비 메뉴-->
        <p class="navbar_menu">
            <span><a href="./addoffice.php" style="color: black; font-weight:bold">오피스 등록</a></span>
            <span><a href="./plan.php" style="color: black; font-weight:bold">플랜&가격</a></span>
            <span><a href="./commu.php" style="color: black; font-weight:bold">커뮤니티</a></span>
            <span><a href="./office_view.php" style="color: black; font-weight:bold">오피스 찾기</a></span>
            <button class = "navbar_but"type = "button" onclick = "openRightMenu();">연락 및 문의</button>
            <span><a href="./view.php" style="color: black; font-weight:bold">예약 확인</a></span>
	<span><a id = "us" style="color: black; font-weight:bold"> <?php print_r($_SESSION["ID"]);?> </a></span>
	<span id="log"><button onclick="location.href='./login.php'">로그인</button></span>
	<span id="check"><a href="./logout.php" style="color: black; font-weight:bold;">로그아웃</a></span>
        </p>
    </nav>
    
    <!--섹션 이미지와 글-->
    <section">
    
        <div id="board_area" style="margin: 0 auto; min-width: 80%; max-width: 80%;"> 
            <div style="width: 40%; display: inline-block; height:400px; margin: 0 50px;" >
                <table>
                    <thead>
                        <tr style="border-top: 1px solid #00f; border-bottom: 1px solid #000;">
                            <th width="200">이름</th>
                              <th width="150">아이디</th>
                              <th width="200">가격</th>
                              <th width="300">위치</th>
                          </tr>
                      </thead>
    
                    <?php
    
    $result = mysqli_query($connection, "SELECT * FROM office");
    
    while($query_data = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td>",$query_data[1], "</td>",
    "<td>",$query_data[2], "</td>",
           "<td>",$query_data[5], "</td>",
           "<td><a href='javascript:void(0);' onclick='mapDisplay(`$query_data[3]`, `$query_data[4]` );'>",위치확인, "</a></td>";
      echo "</tr>";
    }
    ?>
                  </table>
            </div>

            <div id="map" style="width:40%; height:500px; display: inline-block; margin: 0 auto;">

            </div>
       
        </div>


    </section>

    <article>

    </article>

    <footer class = "footer" style="margin: 40px 0;">
        <div class = "footer_content">
            <img src="./img/footerlogo.png" alt="logo" class = "footer_logo">
        <div class="footer_word">
        <table>
            <tr>
                <th>센터</th>
                <th>플랜</th>
                <th>커뮤니티</th>
                <th>About</th>
            </tr>
            <tr>
                <td>찾아오시는 길</td>
                <td><a href="./plan.php#plan">솔루션</a> </td>
                <td>스토리</td>
                <td>회사소개</td>
            </tr>
            <tr>
                <td>상담문의</td>
                <td><a href="./plan.php#adv">멤버 혜택</a></td>
                <td>이벤트</td>
                <td>인재채용</td>
            </tr>
            <tr>
                <td>공유 오피스</td>
                <td><a href="./plan.php#exm">성공사례</a> </td>
                <td>멤버 프로모션</td>
                <td>자주하는 질문</td>
            </tr>
        </table>
        </div>
    </div>
    </footer>

    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }


function mapDisplay(lat, lng)
{
document.getElementById("map").innerText = '';
var markerPosition  = new kakao.maps.LatLng(lat, lng); 

// 이미지 지도에 표시할 마커입니다
// 이미지 지도에 표시할 마커는 Object 형태입니다
var marker = {
    position: markerPosition
};

var staticMapContainer  = document.getElementById('map'), // 이미지 지도를 표시할 div  
    staticMapOption = { 
        center: new kakao.maps.LatLng(lat, lng), // 이미지 지도의 중심좌표
        level: 3, // 이미지 지도의 확대 레벨
        marker: marker // 이미지 지도에 표시할 마커 
    };    

// 이미지 지도를 생성합니다
var staticMap = new kakao.maps.StaticMap(staticMapContainer, staticMapOption);
}

    </script>
    <!-- Clean up. -->
<?php

mysqli_free_result($result);
mysqli_close($connection);

?>
</body>
</html>

<?php
/* Add an employee to the table. */
function AddEmployee($connection, $name, $address) {
   $n = mysqli_real_escape_string($connection, $name);
   $a = mysqli_real_escape_string($connection, $address);

   $query = "INSERT INTO reservation (name, phone) VALUES ('$n', '$a');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding employee data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyEmployeesTable($connection, $dbName) {
  if(!TableExists("reservation", $connection, $dbName))
  {
     $query = "CREATE TABLE reservation (
         id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(45),
         phone VARCHAR(50)
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");
  if(mysqli_num_rows($checktable) > 0) return true;
  return false;
}
?>