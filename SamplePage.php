<?php
//세션을 사용하기 위한 모든 페이지에서 필요
session_start();
?>

<?php include "../inc/dbinfo.inc"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="style.css">
    <!--인터넷 css,js 스타일-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script 
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script 
    src = "http://kit.fontawesome.com/2d323a629b.js"></script>
    <script type="text/javascript" src="myjs.js"></script> 

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

<!-- Clean up. -->
<?php
  mysqli_close($connection);
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
    <section class = "search">
        <img src="./img/office.jpg" class = "search_img" alt="search" width="100%" height="700px" >
        <p class = "search_word1" style="font-weight:bold">Let's Make Work Better</p>
        <p class = "search_word2">
            제로유는 당신의 업무에 필요한 오피스를 제공해 드립니다.<br>
            비즈니스 형태와 규모에 관계없이 제로유에서 완벽한 업무 공간을 찾아가세요!
            <hr style="border: black;">
        </p>
        <div class = search_all>
            <input type="text" class = "search_bar" style="width: 530px; height: 35px;" value="  검색어를 입력하세요">
            <button type="button" class = "search_but" style="width: 270px; height: 35px;" onclick="searchbutton()">S E A R C H</button>
        </div>
    </section>
    <article>
        <div class = artword1>
            <img src="./img/lwt.png" alt="slogan" class = "artword1_slogan">
            <p class="artword1_word1"><br>
                <h2 class = "artword1_hello"> 안녕하세요. 공유오피스 제로유에 오신 것을 환영합니다.</h2><br> 
                제로유에서는 모든 규모의 기업이 오피스로 사용할 수 있는 공간과 솔루션을 제공합니다.<br>
                우리가 제공하는 공유 오피스는 끊임없이 변화하는 비즈니스 환경에 최대한의 유연성을 제공하도록 설계되었습니다<br><br>
                제로유에서 자신에게 꼭 맞는 오피스를 찾아보세요.<br>
                우리가 어떤 공유 오피스를 제공하는지 알고 싶다면 <span onclick="thishyper()" class ="artword1_thishyper">여기</span>에서 알아보세요.
            </p>
        </div>
        <div class = artword2>
            <img src="./img/counseling.jpg" alt="image1" class = "artword2_counsel">
            <div class="artword2_wordbox1">
            <h2 class = "artword2_word1"> Why Zero.U Office?</h2><br>
                <ul>
                    <li>비용성 : 초기 투자금 없이 부담없게 사용할 수 있는 사무실</li>
                    <li>편리성 : 교통 좋은 도심에서 출퇴근 걱정과 업무 교류 걱정 끝</li>
                    <li>편의성 : 기업 비즈니스 변화에 유연성있는 비즈니스 환경 구축</li>
                </ul><br>
            <h2 class = "artword2_word1"> Zero.U Solution & Community</h2><br>
                <p>
                    <span style="font-weight: bold;">비즈니스 환경에 발맞추어 성장해나가는 제로유만의 특별한 서비스</span>
                    <ul>
                        <li>각 분야별 사무공간이 연결되어 업무 교류 활발</li>
                        <li>전국에 분포되어 있는 제로유 센터</li>
                        <li>분야별 / 기업별 전문 인력 알선 및 소개</li>
                    </ul><br>
                </p>
            <h2 class = "artword2_word1"> 이상적인 엔터프라이즈 솔루션</h2><br>
            <p>        
                제로유의 <span style="font-weight: bold;">[엔터프라이즈365]</span> 는 오피스의 설계부터 구축에 이르기까지<br>
                고객에 Needs에 맞춘 업무 공간을 위한 모든 서비스를 제공합니다
            </p>
            </div>
        </div>
        <div class = artword3>
            <div class="artword3_wordbox1"><br>
            <h2 class = "artword3_word1"> IDEAL & SMART</h2><br>
                <p>
                <span class = "artword3_space">당신을 위한 이상적이고 스마트한 업무 공간</span><br><br>
                제로유는 단순한 업무 공간을 벗어난 그 이상 공간을 추구합니다.<br><br>
                제로유의 <span style="font-weight: bold;">[엔터프라이즈365]</span> 팀의 디자이너들은<br><br>
                전략적인 공간 계획에서부터 최고의 인체 공학적 가구를 고르는 데까지<br><br>
                모두 혁신적이고 세련된 작업 공간에 대한 계획을 세웁니다.<br><br>
                또한 전국에 분포된 제로유의 센터들은<br><br>
                제로유를 방문해주시는 기업인들에게 생동감과 에너지를 전할 수 있도록<br><br>
                회화와 색감, 인테리어 등 예술적 요소들을 가미하여<br><br>
                현대 디자인과 어우러 놓았습니다.<br>
                </p>
            </div>
            <img src="./img/office2.jpg" alt="image2" class = "artword3_office"><br><br>
        </div>
        <div class = "artcontent">
            <table>
                <tr>
                    <td><img src="./img/map.jpg" alt="map" class = "artcontent_map">
                        <div class = "artcontent_imgtext1">
                            <h3>센터</h3>
                            <p>센터 찾기</p>
                            <button type="button" onclick="content()">자세히 보기</button>
                        </div>
                    </td>
                    <td><img src="./img/meeting.jpg" alt="meeting" class = "artcontent_meeting">
                        <div class = "artcontent_imgtext2">
                            <h3>미팅룸</h3>
                            <p>미팅룸 예약</p>
                            <button type="button" onclick="content()">자세히 보기</button>
                        </div>
                    </td>
                    <td><img src="./img/enter.jpg" alt="enter" class = "artcontent_enter">
                        <div class = "artcontent_imgtext3">
                            <h3>엔터프라이즈365</h3>
                            <p>상담 문의</p>
                            <button type="button" onclick="content()">자세히 보기</button>
                        </div>
                    </td>
                    <td><img src="./img/event.jpg" alt="event" class = "artcontent_event">
                        <div class = "artcontent_imgtext4">
                            <h3>이벤트</h3>
                            <p>프로모션</p>
                            <button type="button" onclick="content()">자세히 보기</button>
                        </div>
                    </td>
                <tr>
          </table>
        </div>    
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
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
	
    </script>

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