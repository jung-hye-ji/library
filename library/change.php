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
            width: 1200px;
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
                margin-top: 600px;
                bottom: 0;
                background-color: #dccbed;
				text-align: center;
				padding:40px;
				margin-bottom:0px;
				
				
        }
        #serchbar{
            padding-left: 200px;
          
        }
		.tab{
            padding: 40px 20px;
            background-color: white;
			background-color: rgb(190, 188, 188);
			border: 2px solid black;
			border-radius: 30px;
			margin:0 auto;
			margin-top: -700px;
        }
        a{
            text-decoration: none;
            color: rgb(146, 32, 240);
        }
        h4{
            border-bottom: 3px solid gray;
            
        }
		.text{
			border:3px solid black;
			padding: 50px;
			text-align:center;
			margin-top:200px;
			margin-bottom:-400px;
		}
        .content {
            margin-left: 50px;
            margin-right: 50px;
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
                        <a href="notice.php" class="w3-bar-item w3-button w3-xlarge ">공지사항</a>
                        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge">소장도서</a>
                        <a href="list.php" class="w3-bar-item w3-button w3-xlarge">이야기 마당</a>
                        <a href="question.php" class="w3-bar-item w3-button w3-xlarge">자주 묻는 질문</a>
                        <div class="w3-dropdown-hover">
                            <button class="w3-button w3-xlarge w3-purple">마이페이지</button>
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
					
					<?php
							if(!isset($_SESSION['uid'])){?>
							<div class="text">
								<h3>로그인을 먼저 해야합니다.</h3><br>
								<p><a class="btn" href="login.html"
								style="padding:10px; color:white; background-color:black; border-radius:10px;">로그인</a><p>
							</div>
							<?php }
							
							 else{
								$uid = $_SESSION['uid'];
								$sql = "select * from member where uid = '$uid'";
								$result = $conn->query($sql);
								if($result->num_rows == 0){
									die("검색된 데이터가 없습니다.".$conn->error);
							}	
							$row = $result -> fetch_assoc();
						?>
<div class = "content">
						<h4>정보수정하기</h4>
						<form action="changeup.php" method="post">
						<table class="tab">
							<tr>
								<td><label>아이디</label></td></tr>
							<tr><td><input type="text" name="uid"  value="<?= $row['uid']?>" readonly style="padding:6px;"></td></tr>
							
							<tr>
								<td><label>비밀번호</label></td></tr>
							<tr><td><input type="password" name="password" value="<?= $row['password']?>"  style="padding:6px;"></td>
							</tr>
							<tr>
								<td><label>이름</label></td></tr>
							<tr><td><input type="text" name="name" value="<?= $row['name']?>"  style="padding:6px;"></td>
							</tr>
							<tr>
								<td><label>휴대폰번호</label></td></tr>
							<tr><td><input type="text" name="mobile" value="<?= $row['mobile']?>" style="padding:6px;"></td>
							</tr>
							
							<tr>
								<td style="padding-top: 30px; text-align: center; ">
									<input type="submit" value="변경하기" style="margin-right: 20px; background-color:rgb(190, 188, 188);border: none; font-size: 15px; color: red; cursor: pointer;" >
									<button style="margin-left: 15px; background-color: rgb(190, 188, 188); border: none; font-size: 15px;"><a href="main.html">취소</a></button></td>
							</tr>
							<button style="padding:10px; float: right; margin-top:-100px; margin-right: 50px;border-radius:10px;">
							<a href="signout1.php" style="color:red; font-weight: 00;">회원 탈퇴하기</a></button>
							<?php }?>
							
                    </section>
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