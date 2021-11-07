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
                text-align: center;
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
			#serchbar{
				padding-left: 200px;
			  
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
			.bookcart {
				background: linear-gradient(to top, #f2f2f2 50%, transparent 50%);
				color : $9979c1;
				font-family: 'east sea dokdo', cursive;
				font-size: 70px;
				margin-top: 50px;
			}
			h2 {
				background: linear-gradient(to top, #f2f2f2 50%, transparent 50%);
				color : #9979c1;
				font-family: 'East Sea Dokdo', cursive;
				font-size : 110px;
			}
            #book {
                font-family: font-family: 'Noto Sans KR', sans-serif;
				font-size: 18px;
                border-collapse: collapse;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
            #book td, #book th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #book tr:nth-child(even){background-color: #f2f2f2;}
            #book tr:hover {background-color: #ddd;}
            #book th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #dccbed;
                color: white;
            }
			#book img {
				width: 150px;
				height: 200px;
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
            </td></tr>
            </table>
                <div class="dropmenu">
                    <ul id="main-menu">
                        <a href="notice.php" class="w3-bar-item w3-button w3-xlarge ">공지사항</a>
                        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge">소장도서</a>
                        <a href="list.php" class="w3-bar-item w3-button w3-xlarge">이야기 마당</a>
                        <a href="question.php" class="w3-bar-item w3-button w3-xlarge">자주 묻는 질문</a>
                        <div class="w3-dropdown-hover">
                            <button class="w3-button w3-xlarge w3-purple">마이페이지</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                              <a href="change.php" class="w3-bar-item w3-button">내 정보수정</a>
                              <a href="likecart.php" class="w3-bar-item w3-button">찜한 도서</a>
                              <a href="showcart.php" class="w3-bar-item w3-button">대출 도서</a>
                              <?php
                $query2 = "select * from member";
                $result2 = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    if (isset($_SESSION['uid']) && $_SESSION['uid']==$row['uid'] && $row['role'] == 'admin') { ?><a href="admincare.php" class="w3-bar-item w3-button w3-purple">도서 관리</a><?php  };
                 } ?>
                              
                            </div>
                          </div>
                    </ul>
                </div>
            </header>
        </div>
        <?php

		
		if(!isset($_SESSION['uid'])){
			echo "<script>";
			echo "alert('로그인을 한 다음 이용할 수 있습니다.');";
			echo "history.back()";
			echo "</script>";

		}
		else {
			$sql = "SELECT * FROM cart";
			$result = $conn->query($sql);
			?>
			<h2 class="bookcart">Managing Books</h2>
					<hr>
					<table id="book">
						<tr>
							<th>NO</th><th>이용자</th><th>서명</th><th>작가</th><th>출판사</th><th>대출일</th><th>반납일</th>
						</tr>
						<?php
			if(!isset($result)) die("목록 검색 오류 : ".$conn->error);
					if($result-> num_rows > 0) {
						$no = 1;
					?>
					
						<?php while($row = $result->fetch_assoc()) { ?>
						<form action="remove_cart.php" method="POST">

						<tr>
							<td><?=$no?></td>
                            <td><?=$row['uid']?></td>
							<input type="text" name="no" value="<?= $row['no']?>" hidden>
							<td><?=$row['mybook']?></td>
							<input type="text" name="mybook" value="<?= $row['mybook']?>" hidden>
							<td><?=$row['writer']?></td>
							<td><?=$row['publisher']?></td>
							<td><?=$row['bdate']?></td>
          					 <td><?=$row['rdate']?><p>
                               <?php 
                                $query2 = "select * from member";
                                $result2 = mysqli_query($conn, $query2);
                                while ($row = mysqli_fetch_array($result2)) {
                                    if (isset($_SESSION['uid']) && $_SESSION['uid']==$row['uid'] && $row['role'] == 'admin') {
                            ?><input type="submit" value="반납하기"><?php  };
                                } ?></td>
							    </td>
                               

						</tr>
						<?php $no++; } ?>
					
					<?php } else { ?>
						<tr style="text-align: center;">
							 <td colspan='7'><?php echo "관리할 도서가 없습니다.<br> <a href='main.php'>DJ 도서관</a>"; ?></td>
						</tr>
				<?php }	} ?>
						
				</table>
				
					
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