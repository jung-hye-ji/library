<!doctype html>
<html>
<head>
	<title>remove_cart</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<style>
	body {
        height: 100vh; 
        margin: 0;
		background-color: rgb(205, 191, 216);
         }
	.container{
		color: black;
        background-color: rgba(207, 205, 205);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 100px 100px;
	}
</style>
<body>
	<div class = "container">
		<?php
		session_start();
		include_once('dbconn.php');
		$no = $_POST['no'];
		$bookname = $_POST['mybook'];
		$sql ="delete from cart where no='$no'";
		if($conn->query($sql)){
			echo"$bookname <br>책 반납을 성공했습니다.<br><br>";
			echo "<a href='main.php'><i class='material-icons'>home
			</i>홈페이지로 돌아가기</a><br>";
			echo "<a href='admincare.php'><i class='material-icons'>home
			</i>도서관리 목록가기</a>";
		}
		else
			 echo "책 반납에 오류가 발생하였습니다.". $conn->error;
		?>
	</div>
	</body>
</html>