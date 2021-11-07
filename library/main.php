<?php
  session_start();
  include_once('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {font-family: "Lato", sans-serif;
      background-color:white;
            height: 100vh;}
    .mySlides1 {display: none}
    .wrapper {
            background-color :#dccbed; 
            height: 350px;
            margin: 0;
        }
        ul {
          list-style: none;
            margin-top: 0;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 0;
            text-align: right;
            font-family: 'Noto Sans KR', sans-serif;
        }
        #plus-menu > li {
          display: inline;
            margin:5px;
            border: 1px solid #eee;
            background: #eee;
            border-radius: 100px;
            padding: 5px 10px;
        }
        #main-menu > li {
            display: inline;
            list-style: none;
            font-size: 20px;
            padding: 10px;
        }
        a:link {
            text-decoration: none;
            color: black;
        }
        a:visited {
            text-decoration: none;
            color: black;
        }
        #plus-menu > li > a:hover {
            text-decoration: underline;
        }
        #serchbar{
            padding-left: 200px;
          
        }
      .table1{
        margin:10%;
      }
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }

      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .active, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }
      .space {
            padding: 80px;
        }
        .logo {
            margin-left: 10px;
        }
        footer {
                display: block;
                height: 200px;
                margin-top: 200px;
                bottom: 0;
                background-color: #dccbed;
				text-align: center;
				padding:40px;
				
        }
</style>
<body>

<!-- Navbar -->
    <div class="wrapper">
    <ul id="plus-menu">
            <?php 
                    if(!isset($_SESSION['uid'])){
                        echo "<li><a href='login.html'>로그인</a></li>";
                        echo "<li><a href='signup.html'>회원 가입</a></li>";
                    }
                    else{
                        $name = $_SESSION['name'];	
                        echo "<li> $name 회원님</li>";
                        echo "<li> <a href='logout.php'>로그아웃</a></li>";
                    }
            ?> 
    </ul>
    <table>
                    <tr><td> <a href="main.php"><img class="logo" src="images/logo2.png"></a></td>
                    
                    <td class="space"></td>
                    <td id="serchbar">
        <div>
                    <form action="search.php" method="POST">
                    <input type="text" style="height: 45px; width: 400px;"  placeholder="제목, 저자 검색" name="search" >
                    <button type="submit"><i class="material-icons" style="font-size:20px; height: 40px; padding: 7px;" value="search">search</i></button>
                </form>
                    </td></tr>
                    </table>
    <div class="dropmenu">
        <ul id="main-menu">
            <a href="notice.php" class="w3-bar-item w3-button w3-xlarge">공지사항</a>
        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge">소장도서</a>
        <a href="list.php" class="w3-bar-item w3-button w3-xlarge">이야기 마당</a>
        <a href="question.php" class="w3-bar-item w3-button w3-xlarge">자주 묻는 질문</a>
        <div class="w3-dropdown-hover">
            <button class="w3-button w3-xlarge">마이페이지</button>
            <div class="w3-dropdown-content w3-bar-block w3-border">
              <a href="change.php" class="w3-bar-item w3-button">내 정보수정</a>
              <a href="likecart.php" class="w3-bar-item w3-button">찜한 도서</a>
              <a href="showcart.php" class="w3-bar-item w3-button">대출 도서</a>
              <?php
                $query2 = "select * from member";
                $result2 = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    if (isset($_SESSION['uid']) && $_SESSION['uid']==$row['uid'] && $row['role'] == 'admin') { ?><a href="admincare.php" class="w3-bar-item w3-button">도서 관리</a><?php  };
                 } ?>
                </div>
              </div>
        </ul>
    </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides1 w3-display-container w3-center">
    <img src="images/img1.jpg" style="width:70%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        
    </div>
  </div>
  <div class="mySlides1 w3-display-container w3-center">
    <img src="images/img2.png" style="width:70%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
         
    </div>
  </div>
  <div class="mySlides1 w3-display-container w3-center">
    <img src="images/img3.png" style="width:70%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
       
    </div>
    
  </div>
<!----------------->
  <div class="w3-container w3-white w3-padding-64 w3-large" id="show">
    <div class="w3-content w3-border w3-border-grey" style="background-color: lightgrey ;" >
    
      <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Books</h1>
      <div class="w3-row w3-center w3-border w3-border-grey">
        <a href="javascript:void(0)" onclick="openMenu(event, 'new');" id="myLink">
          <div class="w3-col s4 tablink w3-padding-large w3-hover-purple">NEW</div>
        </a>
        <a href="javascript:void(0)" onclick="openMenu(event, 'recommend');">
          <div class="w3-col s4 tablink w3-padding-large w3-hover-purple">RECOMMEND</div>
        </a>
        <a href="javascript:void(0)" onclick="openMenu(event, 'Popular');">
          <div class="w3-col s4 tablink w3-padding-large w3-hover-purple">POPULAR</div>
        </a>
      </div>
  
      <div id="new" class="w3-container menu w3-padding-32 w3-white">
        <div class="table1">
        <table>
            <tr>
                <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=20514419">
                  <img src="images/economy1.jpg" style="width: 350px; height: auto;"></a></td>
                <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=14740358">
                  <img src="images/travel2.jpg" style="width: 350px; height: auto; padding-left: 40px;"></a></td>
            </tr>
            <tr>
              <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=20541171">
                <img src="images/novel4.jpg" style="width: 350px; height: auto;"></a></td>
              <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=14088087">
                <img src="images/self8.jpg" style="width: 400px; height: auto; padding-left: 40px;"></a></td>
          </tr>
          </table>
        </div>
      </div>     
        
      
  
      <div id="recommend" class="w3-container menu w3-padding-32 w3-white">
        <div class="table1">
          <table>
              <tr>
                  <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=14384887">
                    <img src="images/self4.jpg" style="width: 350px; height: auto;"></a></td>
                  <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=151055">
                    <img src="images/novel9.jpg" style="width: 350px; height: auto; padding-left: 40px;"></a></td>
              </tr>
              <tr>
                <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=5186">
                  <img src="images/novel10.jpg" style="width: 340px; height: auto;"></a></td>
                <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=17191260">
                  <img src="images/essay3.jpg" style="width: 400px; height: auto; padding-left: 40px;"></a></td>
            </tr>
            </table>
          </div>
      </div>
  
  
      <div id="Popular" class="w3-container menu w3-padding-32 w3-white">
        <div class="table1">
          <table>
              <tr>
                  <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=20579864">
                    <img src="images/economy4.jpg" style="width: 370px; height: auto;"></a></td>
                  <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=18563609">
                    <img src="images/essay2.jpg" style="width: 400px; height: auto; padding-left: 40px;"></a></td>
              </tr>
              <tr>
                <td><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=20512463">
                  <img src="images/social2.jpg" style="width: 370px; height: auto;"></a></td>
                <td>><a href="https://book.naver.com/bookdb/book_detail.nhn?bid=15028705">
                  <img src="images/novel7.jpg" style="width: 400px; height: auto; padding-left: 40px;"></a></td>
            </tr>
            </table>
          </div>
      </div><br>
  
    </div>
  </div>

  <!-- The Tour Section -->
  <div class="w3-white" id="benner">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/popup1.png" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/popup2.png" style="width:100%">
          
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/popup3.png" style="width:100%">
         
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
    </div>
  </div>
  

</div>

<script>

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides1");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-purple", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-purple";
}
document.getElementById("myLink").click();

//benner
var slideIndex = 4;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<footer class="footer">
				11159 경기도 포천시 호국로 1007(선단동) 대진대학교<br>
				DAEJIN UNIVERSITY, 1007 HOGUK-RO, POCHEON-SI, GYEONGGI-DO 11159, KOREA<br><br>
				<i class="material-icons">call</i> 031)0000-0000 &nbsp 
				<i class="material-icons">print</i> 031)0000-0001<br><br>
				<i class="material-icons">facebook</i>페이스북 &nbsp &nbsp 
				<i class="material-icons">share</i> 공유하기
				</footer>
</body>
</html>