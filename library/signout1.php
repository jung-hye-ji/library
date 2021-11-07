<?php
    session_start(); 
    include_once('dbconn.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>main</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <style>
        body {
            background-color:white;
            height: 100vh;
        }
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
        footer {
                display: block;
                height: 200px;
                margin-top: 200px;
                bottom: 0;
                background-color: #dccbed;
				text-align: center;
				padding:40px;
				
        }
        #serchbar{
            padding-left: 200px;
          
        }
        .text{
         display: block;
         width:650px;
         margin: 0 auto;
         margin-top: 90px;   
         margin-bottom: -100px;
        }
        .space {
            padding: 80px;
        }
        .logo {
            margin-left: 10px;
        }
       
    </style>
        <body>
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
                        }?>
                        
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
                            <a href="question.php" class="w3-bar-item w3-button w3-xlarge">질문게시판</a>
                            <div class="w3-dropdown-hover">
                                <button class="w3-button w3-xlarge">마이페이지</button>
                                <div class="w3-dropdown-content w3-bar-block w3-border">
                                  <a href="change.php" class="w3-bar-item w3-button w3-purple">내 정보수정</a>
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
                <article class="content">
                    <section>
                        <div class="text">
                          <h4 style="color: blueviolet;"><strong>"다음 사항을 꼭 확인해 주세요"</strong></h4>
                          <h4 ><strong>회원탈퇴 관련하여 자주 묻는 질문(FAQ)</strong></h4>
                          <p>Q:탈퇴한 계정의 아이디로 다시 가입할 수 있나요?</p>
                          <p>A:네, 가능합니다.</p>
                          <p>Q:전에 가입했던 아이디로 재가입 할 경우 그전에 썼던 정보도 볼 수 있나요?</p>
                          <p>A:회원탈퇴가 이루어졌던 아이디는 탈퇴 순간 영구삭제 되므로 기존에 이용하셨던 내용들은 저장되지 않습니다.</p>
                          <p>Q:대출중인 책이 있는데도 회원을 탈퇴 할 수 있나요?</p>
                          <p>A:대출중인 책이 있는 경우, 회원탈퇴가 불가능합니다.<br>
                            회원탈퇴를 진행 할 경우, 모든 반납이 이루어졌을 시에만 가능합니다.</p>
                            <button style="margin-left: 40%; margin-top: 20px;" ><a href="main.php">취소</a></button>&nbsp;&nbsp;&nbsp;
                            <button style="color: red;"><a href="signout.php">탈퇴하기</a></button>
                        </div>
                    </section>
                </article>
                <footer class="footer">
                    11159 경기도 포천시 호국로 1007(선단동) 대진대학교<br>
                    DAEJIN UNIVERSITY, 1007 HOGUK-RO, POCHEON-SI, GYEONGGI-DO 11159, KOREA<br><br>
                    <i class="material-icons">call</i> 031)0000-0000 &nbsp 
                    <i class="material-icons">print</i> 031)0000-0001<br><br>
                    <i class="material-icons">facebook</i>페이스북 &nbsp &nbsp 
                    <i class="material-icons">share</i> 공유하기</footer>
         </body>
    </html>