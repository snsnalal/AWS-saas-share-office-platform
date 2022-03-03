<?php
//세션을 사용하기 위한 모든 페이지에서 필요
session_start();
?>

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
    <title>0UO│당신을 위한 공유오피스</title>
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
</head>
<body onload="bbbb();">
    <?php
  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the EMPLOYEES table. */
  $employee_name = htmlentities($_POST['name']);

  if (strlen($employee_name)) {
    AddEmployee($connection, $employee_name);
  }
?>
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
    <section>
    
        <div style="min-width: 60%; max-width: 60%; margin:0 auto">
            <div style="display: inline-block; width:30%; height: 400px; margin: 0 30px;">
                <form action="addoffice_ok.php" method="POST">
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
                        <td>가격</td>
                      </tr>
                      <tr>
                        <td>
                          <input ype="text" name="price" maxlength="45" size="30"/>
                        </td>
                  </tr>		

<tr style="display: none">
                        <td>위도</td>
                      </tr>
                      <tr style="display: none">
                        <td>
                          <input id="lll" type="text" name="lat" maxlength="45" size="30" readonly/>
                        </td>
                  </tr> 

<tr style="display: none">
                        <td>경도</td>
                      </tr>
                      <tr style="display: none">
                        <td>
                          <input id="ggg" type="text" name="lng" maxlength="45" size="30" readonly/>
                        </td>
                  </tr>

                  <tr>
                        <td>
                          <button type="submit"> 등록 </button>
                        </td>
                      </tr>
                    </table>
                  </form>
            </div>
            <div id="map" style="display: inline-block; width: 60%; height: 400px; margin:0 20px;">

            </div>
              </div>
        
    </section>
    <article>
          
    </article>
    <footer class = "footer">
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
        let lat;
        let lng;
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }

        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
            mapOption = { 
                center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
        // 지도를 클릭한 위치에 표출할 마커입니다
var marker = new kakao.maps.Marker({ 
    // 지도 중심좌표에 마커를 생성합니다 
    position: map.getCenter() 
}); 
// 지도에 마커를 표시합니다
marker.setMap(map);

// 지도에 클릭 이벤트를 등록합니다
// 지도를 클릭하면 마지막 파라미터로 넘어온 함수를 호출합니다
kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
    
    // 클릭한 위도, 경도 정보를 가져옵니다 
    var latlng = mouseEvent.latLng; 
    
    // 마커 위치를 클릭한 위치로 옮깁니다
    marker.setPosition(latlng);
    
    lat = latlng.getLat();
    lng = latlng.getLng();
  document.getElementById("lll").value = lat; // input값 변경
document.getElementById("ggg").value = lng;

});

    </script>
<!-- Clean up. -->
<?php
  mysqli_close($connection);
?>
</body>
</html>