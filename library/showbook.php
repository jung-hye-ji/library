<?php
    session_start();
    include_once('dbconn.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DJ 도서관 : Show</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&family=Nanum+Pen+Script&family=Noto+Sans+KR&display=swap" rel="stylesheet">
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
		a:active {
            background: rgb(190, 154, 236);
        }
        #plus-menu > li > a:hover {
            text-decoration: underline;
        }
		.navbox {
            text-align: center;
				font-size: 24px;
				font-family: 'Noto Sans KR', sans-serif;
				padding: 50px;
				margin-right: 10px; background-color: #f2f2f2;
                margin-bottom: 100px;
        }
        #serchbar{
            padding-left: 200px;
          
        }
		h1 {
                text-align: center;
                padding: 30px;
        }
		h2, p{
            font-family: 'Noto Serif KR', serif;
        }
        h3 {
            font-weight: 50px;
            font-family: 'Noto Sans KR', sans-serif;
        }
        .container {
            margin-top: 100px;
            margin-left: 100px;
            margin-right: 100px;
        }
		
		.table-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 1;
        }
		.card {
              background: #fff;
              border-radius: 2px;
              display: inline-block;
              height: 540px;
              margin: 30px;
              /*position: relative;*/
              width: 300px;
                border: 1px solid #999;
		} 
        .card-1 {
              box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
              /*transition: all 0.3s cubic-bezier(.25,.8,.25,1);*/
                overflow: hidden;
		}
		
		.card-1 img {
                object-fit: cover;
                display: block;
                width: 100%;
                height: 60%;
                transition: .3s transform ease-out;
        }
			
		.card-1:hover img{
              /*box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);*/
              transform: scale(1.15);
        }
			
		.card-1:hover h3 {
               color: navy;
               text-shadow: 1px 1px 1px darkorange;
               border-bottom: 1px dotted gray;
        }
		.navbox a:hover {
			font-weight: bold;
			text-decoration: underline;
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
                            <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge w3-purple">소장도서</a>
                            <a href="list.php" class="w3-bar-item w3-button w3-xlarge ">이야기 마당</a>
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
                              </div>
                        </ul>
                    </div>
                </div>
    <div class="content">
                <div class="container">
                    <div class="navbox">
                        <a href="#novel">[소설]</a>
                        <a href="#essay">[에세이]</a>
                        <a href="#human">[인문학]</a>
                        <a href="#self">[자기 계발]</a>
                        <a href="#socialeconomy">[사회 과학 / 경제]</a>
                        <a href="#travel">[여행]</a>
                    </div>
                        
                    
                    <hr>
                <div class="novel">
                <h3><a name="novel">[소설]</a></h3>
					<?php
					$sql = "select * from book where photo like 'novel%'";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<div class="card card-1">
						<a href="addbook.php?bookname=<?=$row['bookname']?>&writer=<?=$row['writer']?>&
						publisher=<?=$row['publisher']?>"><img src="images/<?=$row['photo']?>"></a>
						<div class="write">
							<h3 style= "font-size: 30px;
            font-family: 'Nanum Pen Script', cursive; text-align: center; font-weight: 700;"><?=$row['bookname']?></h3>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Writer: <?=$row['writer']?></h4>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Publisher: <?=$row['publisher']?></h4>
						</div>
					</div>
					<?php } // while
					} else echo "등록된 책이 없습니다.";
					?>
					</div>
                    <hr>

                    <div class="essay">
					<h3><a name="essay">[에세이]</a></h3>
					<?php
					$sql = "select * from book where photo like 'essay%'";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<div class="card card-1">
						<a href="addbook.php?bookname=<?=$row['bookname']?>&writer=<?=$row['writer']?>&
						publisher=<?=$row['publisher']?>"><img src="images/<?=$row['photo']?>"></a>
						<div class="write">
							<h3 style= "font-size: 30px;
            font-family: 'Nanum Pen Script', cursive; text-align: center; font-weight: 700;"><?=$row['bookname']?></h3>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Writer: <?=$row['writer']?></h4>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Publisher: <?=$row['publisher']?></h4>
						</div>
					</div>
					<?php } // while
					} else echo "등록된 책이 없습니다.";
					?>
					</div>
                    <hr>

                    <div class="human">
					<h3><a name="human">[인문학]</a></h3>
					<?php
					$sql = "select * from book where photo like 'human%'";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<div class="card card-1">
						<a href="addbook.php?bookname=<?=$row['bookname']?>&writer=<?=$row['writer']?>&
						publisher=<?=$row['publisher']?>"><img src="images/<?=$row['photo']?>"></a>
						<div class="write">
							<h3 style= "font-size: 30px;
            font-family: 'Nanum Pen Script', cursive; text-align: center; font-weight: 700;"><?=$row['bookname']?></h3>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Writer: <?=$row['writer']?></h4>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Publisher: <?=$row['publisher']?></h4>
						</div>
					</div>
					<?php } // while
					} else echo "등록된 책이 없습니다.";
					?>
					</div>
                    <hr>

                    <div class="self">
					<h3><a name="self">[자기 계발]</a></h3>
					<?php
					$sql = "select * from book where photo like 'self%'";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<div class="card card-1">
						<a href="addbook.php?bookname=<?=$row['bookname']?>&writer=<?=$row['writer']?>&
						publisher=<?=$row['publisher']?>"><img src="images/<?=$row['photo']?>"></a>
						<div class="write">
							<h3 style= "font-size: 30px;
            font-family: 'Nanum Pen Script', cursive; text-align: center; font-weight: 700;"><?=$row['bookname']?></h3>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Writer: <?=$row['writer']?></h4>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Publisher: <?=$row['publisher']?></h4>
						</div>
					</div>
					<?php } // while
					} else echo "등록된 책이 없습니다.";
					?>
					</div>
                    <hr>

                    <div class="socialeconomy">
					<h3><a name="socialeconomy">[사회과학/경제]</a></h3>
					<?php
					$sql = "select * from book where (photo like 'social%' or photo like'economy%')";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<div class="card card-1">
						<a href="addbook.php?bookname=<?=$row['bookname']?>&writer=<?=$row['writer']?>&
						publisher=<?=$row['publisher']?>"><img src="images/<?=$row['photo']?>"></a>
						<div class="write">
							<h3 style= "font-size: 30px;
            font-family: 'Nanum Pen Script', cursive; text-align: center; font-weight: 700;"><?=$row['bookname']?></h3>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Writer: <?=$row['writer']?></h4>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Publisher: <?=$row['publisher']?></h4>
						</div>
					</div>
					<?php } // while
					} else echo "등록된 책이 없습니다.";
					?>
					</div>
                    <hr>

                    <div class="travel">
					<h3><a name="travel">[여행]</a></h3>
					<?php
					$sql = "select * from book where photo like 'travel%'";
					$result = $conn->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						?>
						<div class="card card-1">
						<a href="addbook.php?bookname=<?=$row['bookname']?>&writer=<?=$row['writer']?>&
						publisher=<?=$row['publisher']?>"><img src="images/<?=$row['photo']?>"></a>
						<div class="write">
							<h3 style= "font-size: 30px;
            font-family: 'Nanum Pen Script', cursive; text-align: center; font-weight: 700;"><?=$row['bookname']?></h3>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Writer: <?=$row['writer']?></h4>
							<h4 style="text-align: center; font-family: 'Noto Sans KR', sans-serif;">Publisher: <?=$row['publisher']?></h4>
						</div>
					</div>
					<?php } // while
					} else echo "등록된 책이 없습니다.";
					?>
					</div>
                    <hr>
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