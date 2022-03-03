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
<script>
function signup()
{
  location.href="./signup.php";
}

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

        <img src="./img/img1.png" alt="img" style="width: 100%; height: 500px;">
        <div style="margin: 0 auto;">
            <p class="search_word1" style="font-weight:bold;">로그인</p>

        </div>

        <div style="margin: 0 auto; min-width:60%; max-width: 60%;">
            <form action="login_ok.php" method="POST">
                <table border="0" style="margin: 0 auto;">
                  <tr>
                    <td>ID</td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="name" maxlength="45" size="30" />
                    </td>
              </tr>
              <tr>
              <td>PW</td>
              </tr>
              <tr>
                    <td>
                      <input type="password" name="pw" maxlength="50" size="60" />
                    </td>
              </tr>
               
              <tr>
                    <td>
                      <input type="submit" value="Login" style="margin: 10px 0;" />
                    </td>
                  </tr>
                </table>
              </form>
	<div>
              <button onClick="location.href='./signup.php'" style="position: absolute; left:35%;"> 회원가입 </button>
	</div>

        </div>

    </section>
    <article>
          
    </article>
    <footer class = "footer" style="margin: 60px 0 0 0">
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