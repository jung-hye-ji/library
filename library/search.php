<?php
include_once('dbconn.php');
session_start();
?>
<!doctype html>
<head>
        <title>DJ 도서관 : 검색 결과</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
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
        #plus-menu > li > a:hover {
            text-decoration: underline;
        }
	   .heart {
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
        .heart:focus {
            outline: 0;
        }
        .heart:hover {
            background: rgba(151, 4, 4, 0.9);
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(134, 2, 2, 0.6);
        }
        .borrow {
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
        .borrow:focus {
            outline: 0;
        }
        .borrow:hover {
            background: rgba(92, 4, 151, 0.9);
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(201, 31, 253, 0.6);
        }
		
		.box img {
            height: 400px;
            width : 280px;
			margin-top: 15px;
			margin-right: 30px;
		}
		
		.box {
			/*display: inline-block;*/
			background-color: #e3dbeb;
			font-size: 18px;
			border-radius: 20px;
			padding: 60px 60px 60px 60px;
			font-family: 'Nanum Gothic', sans-serif;
            
		}
        .content {
            margin-left: 50px;
            margin-right: 50px;
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
                              </div>
                        </ul>
                    </div>
                </div>
<div class="content">
    <?php

    $search = $_POST['search'];
    echo("<br><br><br><strong>'".$search."'</strong>")."&nbsp<strong>검색 결과</strong><hr><br>";
    $sql= "select * from book WHERE bookname LIKE '%$search%' OR writer LIKE '%$search%' OR publisher LIKE '%$search%'";
    $result = $conn->query($sql);
	?>
<div class="box">
<?php 
    if($result-> num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			?> <hr>
            <table ><tr><td></td>
			<img src="images/<?=$row['photo']?>">
			<td><br><br><?php echo $row['bookname']."<br>";?>
			<?php echo $row['writer']."<br>";?>
			<?php echo $row['publisher']."<br>"; ?>
			
             </td></tr></table>
             
             <br><br><form action="addbooktolike.php" method="get">
				<input type="text" name="bookname" value="<?=$row['bookname']?>" hidden>
				<input type="text" name="writer" value="<?=$row['writer']?>" hidden>
				<input type="text" name="publisher" value="<?=$row['publisher']?>" hidden>
				<button type="submit" value="heart" class="heart">찜하기</button><br><br>
            </form>
            <form action="addbookproc.php" method="get">
				<input type="text" name="bookname" value="<?=$row['bookname']?>" hidden>
				<input type="text" name="writer" value="<?=$row['writer']?>" hidden>
				<input type="text" name="publisher" value="<?=$row['publisher']?>" hidden>
				<button type="submit" value="heart" class="borrow">대출하기</button><br><br><hr><br><br><br>
                </form>
	<?php
		} //while문 
	}	
        else echo "검색 결과가 없습니다.";
		?>
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