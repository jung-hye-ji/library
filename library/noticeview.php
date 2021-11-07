<?php
    include "dbconn.php";
    session_start();

    $idx = $_GET['idx'];

    $query= "select * from notice where idx='$idx'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);


?>
<!doctype html>
    <head>
        <title>DJ 도서관 : 이야기 마당</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="common.js"></script>
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
        .content {
            min-height: 100vh;
            width: 1200px;
            margin: 0 auto;
        }
        .header img {
            vertical-align: bottom;
            width: 250px;
            height: 250px;
            margin-top: 160px;
        }
        span {
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 25px;
            font-weight: 300;
            font-weight: bold;
            margin-left: 20px;
        }
        #plus-menu, #main-menu {
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
        footer {
                display: block;
                height: 200px;
                margin-top: 200px;
                bottom: 0;
                background-color: #dccbed;
				text-align: center;
				padding:40px;
				
        }
        .board_list {
            width: 100%;
            border-top: 2px solid rgb(65, 2, 102);
        }
        .board_list tr {
            border-bottom: 1px solid #999;
        }
        .board_list th {
            width: 200px;
        }
        .board_list td {
            padding: 10px;
            font-size: 16px;
        }
    .container {
        margin-bottom: 80px;
    }
    .space {
            padding: 80px;
        }
        .logo {
            margin-left: 10px;
        }
        .button {
            margin:10px;
            border: 1px solid #eee;
            background: #eee;
            border-radius: 100px;
            padding: 5px 10px;
        }
</style>
<body>
    <div class="wrapper">
        <ul id="plus-menu">
                <?php 			   
                       if(!isset($_SESSION['uid'])){
                           echo "<script>";
                           echo "alert('로그인을 한 다음 이용할 수 있습니다.');";
                           echo "history.back()";
                           echo "</script>";
               
                       }
                       else {


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
                    </td></tr>
                    </table>
            <div class="dropmenu">
                <ul id="main-menu">
                <a href="notice.php" class="w3-bar-item w3-button w3-xlarge w3-purple">공지사항</a>
                        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge">소장도서</a>
                        <a href="list.php" class="w3-bar-item w3-button w3-xlarge ">이야기 마당</a>
                        <a href="question.php" class="w3-bar-item w3-button w3-xlarge">자주 묻는 질문</a>
                        <div class="w3-dropdown-hover">
                            <button class="w3-button w3-xlarge">마이페이지</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <a href="change.php" class="w3-bar-item w3-button">내 정보수정</a>
                                <a href="addcart.php" class="w3-bar-item w3-button">찜한 도서</a>
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
<!--------- 상단메뉴-------------->
<div class = "content">
        <div class="container">
                <div class="header"><img src="images/Wavy_Edu-03_Single-04.jpg" align="middle">
                    <span>DJ 도서관 공지사항</span>
                </div>
        </div>
    <div class="list_board">
        <form action="noticewritepost.php" method="post">
        <table class="board_list" width=800 border="1" cellpading=10>
                <tr>
                    <th> 이름 </th>
                    <td> <?=$data['name']?> </td>
                </tr>
                <tr>
                    <th> 제목 </th>
                    <td> <?=$data['subject']?> </td>
                </tr>
                <tr>
                    <th> 내용 </th>
                    <td style="height: 400px; text-align: left;"> <?=nl2br($data['memo'])?>
                        
                    </td>
                </tr>

            <tr>
                <td colspan="2">
                    <div class="button" style="float:right;" >
                            <?php
                            $query2 = "select * from member";
                            $result2 = mysqli_query($conn, $query2);
                            while ($row = mysqli_fetch_array($result2)) {
                                if (isset($_SESSION['uid']) && $_SESSION['uid']==$row['uid'] && $row['role'] == 'admin') { ?><a style="float:right" href="noticedel.php?idx=<?=$idx?>" onclick="return confirm('정말 삭제할까요?')">삭제</a><?php  };
                                
                        } ?>
                    </div>
                    <div class="button" style="float:left;" >
                        <a href="notice.php">목록</a>
                    </div>
                </td>
            </tr>
</table>
                    
</form>
    </div>
</div>
    <?php } ?> <!--// if문-->
    

            

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
