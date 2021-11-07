<?php
include_once('dbconn.php');
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>DJ 도서관 : 공지사항</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@600&family=Song+Myung&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Song+Myung&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .container {
            min-height: 100vh;
            max-width: 1200px;
            margin: 0 auto;
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
        #serchbar{
            padding-left: 200px;
          
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
        table {
            border-collapse: collapse;
        }

        caption {
            display: none;
        }

        .board_list_wrap {
            padding: 50px;
        }

        .board_list {
            width: 100%;
            border-top: 2px solid rgb(65, 2, 102);
        }

        .board_list tr {
            border-bottom: 1px solid #999;
        }

        .board_list th,
        .board_list td {
            padding: 10px;
            font-size: 14px;
        }

        .board_list td {
            text-align: center;
        }

        .board_list .tit {
            text-align: left;
        }
        .board_list .tit:hover {
            text-decoration: underline;
        }

        .board_list_wrap .paging {
            margin-top: 20px;
            text-align: center;
            font-size: 0;
        }
        .board_list_wrap .paging a {
            display: inline-block;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #000;
            border-radius: 100px;
            font-size: 12px;
        }
        .board_list_wrap .paging a:first-child {
            margin-left: 0;
        }

        .board_list_wrap .paging a.bt {
            border: 1px solid #eee;
            background: #eee;
        }

        .board_list_wrap .paging a.num {
            border: 1px solid rgb(65, 2, 102);
            font-weight: 600;
            color: rgb(65, 2, 102);
        }
        .board_list_wrap .paging a.num.on {
            background: rgb(65, 2, 102);
            color: #fff;
        }
        .header img {
            vertical-align: bottom;
            width: 250px;
            height: 250px;
            margin-top: 130px;
        }
        span {
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 25px;
            font-weight: 300;
            font-weight: bold;
            margin-left: 20px;
        }
        .btn_b02 {
            float : right;
            border: 1px solid #eee;
            background: #eee;
            border-radius: 100px;
            padding: 5px 10px;
            margin-top : 15px;
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
    <div class="wrapper">	
            <ul id="plus-menu">
                <?php 
						
                        if(!isset($_SESSION['uid'])){
                            echo "<li><a href='login.html'>로그인</a></li>";
                            echo "<li><a href='signup.html'>회원 가입</a></li>";
                        }
                        else {
                            $name = $_SESSION['name'];
                            echo "<li> $name 회원님 </li>";
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
            </div></td></tr>
            </table>
                <div class="dropmenu">
                    <ul id="main-menu">
                        <a href="notice.php" class="w3-bar-item w3-button w3-xlarge w3-purple">공지사항</a>
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
 <div class=container>
        <div class="header"><img src="images/Wavy_Edu-03_Single-04.jpg" align="middle">
        <span>DJ 도서관 공지사항</span></div>
        <div class="board_list_wrap">
            <table class="board_list">
                <caption>공지사항</caption>
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>글쓴이</th>
                        <th>작성일</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            $query1 = "select * from notice order by idx desc limit 0,5";
                            $result1 = mysqli_query($conn, $query1);
                            while($data= mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                        <td><?=$data['idx']?></td>
                        <td class="tit">
                        <a href="noticeview.php?idx=<?=$data['idx']?>"><?=$data['subject']?></a>
                        </td>
                        <td>관리자</td>
                        <td><?=substr($data['regdate'],0,10)?></td>
                    </tr>
                </tbody>
                </table>
                <?php } ?>
                <?php
                $query2 = "select * from member";
                $result2 = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    if (isset($_SESSION['uid']) && $_SESSION['uid']==$row['uid'] && $row['role'] == 'admin') { ?><a href="noticewrite.php" class="btn_b02">글쓰기</a><?php  };
                 } ?>

            <div class="paging">
                <a href="#" class="bt">이전 페이지로 이동</a>
                <a href="#" class="num on">1</a>
                <a href="#" class="bt">다음 페이지</a>
            </div>
                </div>
                
                </div>
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
