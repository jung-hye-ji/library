<?php
    include "dbconn.php";
    session_start();

    $bookname = $_GET['bookname'];
	$writer = $_GET['writer'];
	$publisher = $_GET['publisher'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DJ 도서관</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@600&family=Song+Myung&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Song+Myung&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
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
            margin-top: 200px;
        }

        .title {
            font-size: 3rem;
            margin: 2rem 0rem;
			color: white;
			background-color: #dcc2e7;
			border-radius: 10px;
			padding: 40px;
			font-family: 'Lobster', cursive;
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
        .member {
            text-align: center;
            padding-top: 100px;
        }
        .member > h2 {
            text-align: center;
        }
        .heart {
            width:120px;
            height: 40px;
            color: #fff;
            background: #8b6baf;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(61, 3, 78, 0.3);
            transition: 0.3s;
            float: right;
        }
        .heart:focus {
            outline: 0;
        }
        .heart:hover {
            background: rgba(92, 4, 151, 0.9);
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(201, 31, 253, 0.6);
        }
        .borrow {
            width:120px;
            height: 40px;
            color: rgb(255, 255, 255);
            background: #f3adab;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(252, 150, 238, 0.3);
            transition: 0.3s;
            float: right;
        }
        .borrow:focus {
            outline: 0;
        }
        .borrow:hover {
            background: rgba(151, 4, 4, 0.9);
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(134, 2, 2, 0.6);
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
		.space {
            padding: 80px;
        }
        .logo {
            margin-left: 10px;
        }
    </style>
    <body>
	<?php


		if(!isset($_SESSION['uid'])) {
			echo "<script>";
			echo "alert('로그인을 한 다음 책을 대출할 수 있습니다.');";
			echo "history.back()";
			echo "</script>";
		}
		else { ?>
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
                    <a href="notice.php" class="w3-bar-item w3-button w3-xlarge w3-purple">공지사항</a>
                        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge">소장도서</a>
                        <a href="list.php" class="w3-bar-item w3-button w3-xlarge">이야기 마당</a>
                        <a href="question.php" class="w3-bar-item w3-button w3-xlarge">자주 묻는 질문</a>
                        <div class="w3-dropdown-hover">
                            <button class="w3-button w3-xlarge">마이페이지</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                              <a href="change.php" class="w3-bar-item w3-button">내 정보수정</a>
                              <a href="addbook.php" class="w3-bar-item w3-button">찜한 도서</a>
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
			<h1 class="title">The Book</h1>
			<form action="addbooktolike.php" method="get">
				<h2><?php echo $bookname ?></h2>
				<h2><?php echo $writer ?></h2>
				<h2><?php echo $publisher ?></h2>

                
				<input type="text" name="bookname" value="<?=$row['bookname']?>" hidden>
				<input type="text" name="writer" value="<?=$row['writer']?>" hidden>
				<input type="text" name="publisher" value="<?=$row['publisher']?>" hidden>
				<button type="submit" value="heart" class="borrow">찜하기</button>
			
                <br><br><form action="addbookproc.php" method="get">
				<input type="text" name="bookname" value="<?=$bookname?>" hidden>
				<input type="text" name="writer" value="<?=$writer?>" hidden>
				<input type="text" name="publisher" value="<?=$publisher?>" hidden>
				<button type="submit" value="heart" class="heart">대출하기</button>
                </form>
</div>
			<footer class="footer">
				11159 경기도 포천시 호국로 1007(선단동) 대진대학교<br>
				DAEJIN UNIVERSITY, 1007 HOGUK-RO, POCHEON-SI, GYEONGGI-DO 11159, KOREA<br><br>
				<i class="material-icons">call</i> 031)0000-0000 &nbsp 
				<i class="material-icons">print</i> 031)0000-0001<br><br>
				<i class="material-icons">facebook</i>페이스북 &nbsp &nbsp 
				<i class="material-icons">share</i> 공유하기
				</footer>
                <?php } ?>
			
			
				
</body>
</html>
