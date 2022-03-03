<?php
//세션을 사용하기 위한 모든 페이지에서 필요
session_start();
?>
<?php include "../inc/dbinfo.inc"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="ddstyle.css">
    <!--인터넷 css,js 스타일-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script 
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src = "http://kit.fontawesome.com/2d323a629b.js"></script> 
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    
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

<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0; height: 100%; width: fit-content; z-index:4;" id="rightMenu">
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
  <nav class="navbar" style="width: 100%;">
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

    <br>
    
   <section>
        <img src="./img/img1.png" alt="img" style="width: 100%; height: 700px;">
        <p class="search_word1" style="font-weight:bold">제로유만의 특별한 멤버쉽</p>
        <p class="search_word2">
            원하는 멤버쉽을 선택해보세요! 제로유는 유연한 작업 환경을 제공합니다.<br>
            제로유에서는 기업의 상황에 맞고 신속한 적응이 가능한 다양한 구성의 솔루션을 제공합니다!
        </p>


        <hr style="border: black;">
        

        <div id="plan">
            <div style="width: 1200px; margin: 0 auto;">
                <h1 style="margin: 50px 0 0 0;">제로유의 멤버쉽</h1>
                <hr>
                <br>
                <div style="display:flex">
                    <div class="w3-content w3-display-container" style="width: 400px; height: 270px; margin: 16px 0 0 0; flex:1">
                        <img class="mySlides" src="./img/exp1.png" style="width:100%; height:100%;">
                        <img class="mySlides" src="./img/exp2.png" style="width:100%; height:100%;">
                        <img class="mySlides" src="./img/exp3.png" style="width:100%; height:100%;">
                        <img class="mySlides" src="./img/exp4.png" style="width:100%; height:100%;">
                      
                        <button class="w3-button w3-display-left" onclick="plusDivs(-1, 'mySlides')">&#10094;</button>
                        <button class="w3-button w3-display-right" onclick="plusDivs(1, 'mySlides')">&#10095;</button>
                      </div>
                      <div style="flex:2; padding:0 20px;">
                        <div style="display: flex;">
                            <div style="flex: 1">
                                <h2 style="text-decoration: underline #38a7ef;">BASIC PLAN </h2>
                            </div>
                            <div style="flex: 2; margin: 7px 0 0 0">
                                <button class="w3-button w3-white w3-border w3-border-blue"> 예약 하기</button>
                            </div>
                        </div>                       
                        <h4> 업무공간이 매일 필요하지 않고 자유옵게 이용하고자 할 경우에 가장 적합한 멤버쉽입니다. </h3>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 이용 시간 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>1일 오전 8시 - 오후 6시 월요일 - 금요일(공휴일 제외)</h3>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3> <strong> 좌석 </strong></h3>
                            </div>
                            <div style="flex:3">
                                <h4>공유 업무 공간 내 이용 가능한 좌석들 중 선택</h3>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 특전 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>신뢰할 수 있는 비지니스, 기술, 라이프 스타일, 리테일 업체들이 제공하는 흥미로운 주제의 행사, 네트워킹 세션 및 서비스 할인 등</h3>
                            </div>
                        </div>
                      </div>
                </div>
                <hr>
                <div style="display:flex">
                    <div class="w3-content w3-display-container" style="width: 400px; height: 270px; margin: 16px 0 0 0; flex:1">
                        <img class="mySlides1" src="./img/exp5.png" style="width:100%; height:100%;">
                        <img class="mySlides1" src="./img/exp6.png" style="width:100%; height:100%;">
                        <img class="mySlides1" src="./img/exp7.png" style="width:100%; height:100%;">
                        <img class="mySlides1" src="./img/exp8.png" style="width:100%; height:100%;">
                      
                        <button class="w3-button w3-display-left" onclick="plusDivs(-1, 'mySlides1')">&#10094;</button>
                        <button class="w3-button w3-display-right" onclick="plusDivs(1, 'mySlides1')">&#10095;</button>
                      </div>
                      <div style="flex:2; padding:0 20px;">
                        <div style="display: flex;">
                            <div style="flex: 1">
                                <h2 style="text-decoration: underline #38a7ef;">UNLIMITED PLAN </h2>
                            </div>
                            <div style="flex: 2; margin: 7px 0 0 0">
                                <button class="w3-button w3-white w3-border w3-border-blue"> 예약 하기</button>
                            </div>
                        </div>  
                        <h4> 업무 방식이나 불규칙한 업무 시간으로 유연성 있게 업무공간을 이용해야 하는 경우 가장 적합한 멤버쉽입니다. 연중무휴 24시간 이용 가능할 뿐만 아니라, 커뮤니티 멤버로써 모든 혜택을 누릴 수 있습니다. </h4>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 이용 시간 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>연중 무휴 24시간 무제한 이용</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3> <strong> 좌석 </strong></h3>
                            </div>
                            <div style="flex:3">
                                <h4>공유 업무 공간 내 이용 가능한 좌석들 중 선택</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 특전 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>신뢰할 수 있는 비지니스, 기술, 라이프 스타일, 리테일 업체들이 제공하는 흥미로운 주제의 행사, 네트워킹 세션 및 서비스 할인 등</h4>
                            </div>
                        </div>

                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 가격 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>월 300,000원</h4>
                            </div>
                        </div>

                      </div>
                </div>
                <hr>
                <div style="display:flex">
                    <div class="w3-content w3-display-container" style="width: 400px; height: 270px; margin: 16px 0 0 0; flex:1">
                        <img class="mySlides2" src="./img/exp9.png" style="width:100%; height:100%;">
                        <img class="mySlides2" src="./img/exp10.png" style="width:100%; height:100%;">
                        <img class="mySlides2" src="./img/exp11.png" style="width:100%; height:100%;">
                        <img class="mySlides2" src="./img/exp12.png" style="width:100%; height:100%;">
                      
                        <button class="w3-button w3-display-left" onclick="plusDivs(-1, 'mySlides2')">&#10094;</button>
                        <button class="w3-button w3-display-right" onclick="plusDivs(1, 'mySlides2')">&#10095;</button>
                      </div>
                      <div style="flex:2; padding:0 20px;">
                        <div style="display: flex;">
                            <div style="flex: 1">
                                <h2 style="text-decoration: underline #38a7ef;">DEDICATED PLAN </h2>
                            </div>
                            <div style="flex: 2; margin: 7px 0 0 0">
                                <button class="w3-button w3-white w3-border w3-border-blue"> 예약 하기</button>
                            </div>
                        </div>  
                        <h4> 마음에 드는 센터에 고객의 니즈를 반영한 전용 오피스를 이용 가능합니다. 원하는 오피스에서 근무가 가능합니다. </h4>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 이용 시간 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>연중 무휴 24시간 무제한 이용</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3> <strong> 좌석 </strong></h3>
                            </div>
                            <div style="flex:3">
                                <h4>마음에 드는 좌석을 선택하여 언제나 지정 이용</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 특전 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>신뢰할 수 있는 비지니스, 기술, 라이프 스타일, 리테일 업체들이 제공하는 흥미로운 주제의 행사, 네트워킹 세션 및 서비스 할인 등</h4>
                            </div>
                        </div>

                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 가격 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>월 500,000원</h4>
                            </div>
                        </div>

                      </div>
                </div>

                <hr>
                <div style="display:flex">
                    <div class="w3-content w3-display-container" style="width: 400px; height: 270px; margin: 16px 0 0 0; flex:1">
                        <img class="mySlides3" src="./img/exp13.png" style="width:100%; height:100%;">
                        <img class="mySlides3" src="./img/exp14.png" style="width:100%; height:100%;">
                        <img class="mySlides3" src="./img/exp15.png" style="width:100%; height:100%;">
                        <img class="mySlides3" src="./img/exp16.png" style="width:100%; height:100%;">
                      
                        <button class="w3-button w3-display-left" onclick="plusDivs(-1, 'mySlides3')">&#10094;</button>
                        <button class="w3-button w3-display-right" onclick="plusDivs(1, 'mySlides3')">&#10095;</button>
                      </div>
                      <div style="flex:2; padding:0 20px;">
                        <div style="display: flex;">
                            <div style="flex: 1">
                                <h2 style="text-decoration: underline #38a7ef;">STUDIO PLAN </h2>
                            </div>
                            <div style="flex: 2; margin: 7px 0 0 0">
                                <button class="w3-button w3-white w3-border w3-border-blue"> 예약 하기</button>
                            </div>
                        </div>  
                        <h4> 팀의 규모에 상관없이 전용공간을 이용할 수 있습니다. 맞춤형 공간 배치, 개인 가구, 요구사항을 반영한 공간 변경이 가능합니다. </h4>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 이용 시간 </strong></h4>                          
                            </div>
                            <div style="flex:3">
                                <h4>연중 무휴 24시간 무제한 이용</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3> <strong> 공간 </strong></h3>
                            </div>
                            <div style="flex:3">
                                <h4>원하는 공간 배치로 전용 공간 이용</h4>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 특전 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>신뢰할 수 있는 비지니스, 기술, 라이프 스타일, 리테일 업체들이 제공하는 흥미로운 주제의 행사, 네트워킹 세션 및 서비스 할인 등</h4>
                            </div>
                        </div>

                        <div style="display: flex;">
                            <div style="flex:1">
                                <h3><strong> 가격 </strong></h3>                          
                            </div>
                            <div style="flex:3">
                                <h4>월 700,000원</h4>
                            </div>
                        </div>

                      </div>
                </div>

            </div>

        </div>
        
        <br>
        <br>

        <div style="width: 100%; height:fit-content; background-color:#e3e3e3">
            <div id="adv" style="width: 1200px; margin: 0 auto; word-break:break-all;">
                <h1> 멤버 혜택 </h1>
                <h5> 제로유에서는 다양한 혜택을 제공합니다. </h5>
                <br>
                
                <div style="display: inline-block;">
                    
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px;">
                        <i class="fas fa-truck-moving" style="font-size: 45px; color:mediumturquoise"></i>
                        <p>항시 입주 대기</p>
                    </div>
                </div>
                
                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-gift" style="font-size: 45px; color:mediumturquoise"></i>
                        <p>특전 및 혜택</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-cocktail" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 행사 공간</p>
                    </div>
                </div>
                
                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-coffee" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 오피스 내 카페</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-gamepad" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 스포츠 및 게임</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-users" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 전담 커뮤니티 팀</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-wifi" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 최신 인터넷 환경</p>
                    </div>
                </div>
                
                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-clock" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 24시간 이용가능</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-print" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 프린터 시설</p>
                    </div>
                </div>

                <div style="display: inline-block;">
                    <div style="width: 120px; max-width: 120px; text-align: center; margin: 30px 55px">
                        <i class="fas fa-broom" style="font-size: 45px; color:mediumturquoise"></i>
                        <p> 청소 서비스</p>
                    </div>
                </div>

            </div>
        </div>
   </section>
   <br>
   <br>
   <br>
   <h1 id="exm" style="width: 1200px; margin: 0 auto; word-break:break-all;"> 성공 사례 </h1>
   <article>
    <div style="width: 1200px; margin: 0 auto; word-break:break-all;">
        <div class="menu">
            <div class="menu--wrapper">
              <div class="menu--item">
                <figure><img src="./img/company1.png" alt="" />
                </figure>      
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;"> 회사1 </p>
                    <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 넓은 공간과 다양한 환경 덕분에 작업을 편하게 진행할 수 있었습니다.</p>       
              </div>
          
              <div class="menu--item">
                <figure><img src="./img/company2.png" alt="" /></figure>
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;"> 회사2 </p>
                    <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 언제나 편하게 사용할 수 있는 휴식 환경 덕분에 일을 하고나면 휴식을 편하게 할 수 있어 작업 능률이 올랐습니다.</p>
       
              </div>
          
              <div class="menu--item">
                <figure><img src="./img/company3.png" alt="" /></figure>
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;">회사3 </p> <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 원하는 요구사항에 맞춰 오피스 환경을 배치시켜 주어서 좋습니다 </p>       
              </div>
          
              <div class="menu--item">
                <figure><img src="./img/company4.png" alt="" /></figure>
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;">회사4 </p> <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 계약이 끝이 아니고 사용 중에도 오피스의 유지 보수를 해주어서 신경을 쓰지않아서 편합니다. </p>            
              </div>
          
              <div class="menu--item">
                <figure><img src="./img/company5.png" alt="" /></figure>
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;">회사5 </p> <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 전문적이고 새로운 가구와 넓은 공간이 있는 많은 방들과 유연한 미팅룸 사용이 가능해서 유용합니다. </p>              
              </div>
          
              <div class="menu--item">
                <figure><img src="./img/company6.png" alt="" /></figure>
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;">회사6 </p> <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 불필요한 비용과 광고 없이 크고 안전하고 유연한 환경의 오피스를 찾고 있었는데 딱 맞춤 환경입니다. </p>        
              </div>
              <div class="menu--item">
                <figure><img src="./img/company7.png" alt="" /></figure>
                <p style="color: #000; position:relative; top:280px; text-decoration: underline; font-size: 30px;">회사7 </p> <br><br>
                <p style="color: #000; position:relative; top: 260px; font-size: 18px;"> 관리 스태프의 서비스는 기대 이상입니다. 다른 곳과 견줄 수 없는 수준입니다. 위치도 좋고 어딜 가든 이용할 수 있는 유연함이 정말 마음에 듭니다.</p>            
              </div>
            </div>
          </div>
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
                <td><a href="#plan">솔루션</a> </td>
                <td>스토리</td>
                <td>회사소개</td>
            </tr>
            <tr>
                <td>상담문의</td>
                <td><a href="#adv">멤버 혜택</a></td>
                <td>이벤트</td>
                <td>인재채용</td>
            </tr>
            <tr>
                <td>공유 오피스</td>
                <td><a href="#exm">성공사례</a> </td>
                <td>멤버 프로모션</td>
                <td>자주하는 질문</td>
            </tr>
        </table>
        </div>
    </div>
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js'></script>
    <script src="myjs.js"></script>
    <script>
function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }

        function showDivs(n, cls) {
    var i;
    var x = document.getElementsByClassName(cls);
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
  }
  
  function openImg(imgName) {
    var j, y;
    y = document.getElementsByClassName("picture");
    for (j = 0; j < y.length; j++) {
      y[j].style.display = "none";
      
    }
    document.getElementById(imgName).style.display = "block";
  }

  
var slideIndex = 1;
showDivs(slideIndex, "mySlides");
showDivs(slideIndex, "mySlides1");
showDivs(slideIndex, "mySlides2");
showDivs(slideIndex, "mySlides3");

function plusDivs(n, cls) {
  showDivs(slideIndex += n, cls);
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
     $query = "CREATE TABLE EMPLOYEES (
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