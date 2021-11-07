<!doctype html>
<html>
<head>
	<title>signup2</title>
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
		include_once('dbconn.php');
		$uid = $_POST['uid'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];

		$sql="insert into member(uid,password,name,mobile) values('$uid','$password','$name','$mobile')";
		if($uid && $password && $name && $mobile){ 
				if($conn->query($sql)){
					echo "$name 회원의 회원가입이 완료되었습니다.<br><br>";
					echo "<a href='main.html'><i class='material-icons'>home
					</i>홈페이지로 돌아가기</a>";
				}
				else
					echo "회원가입 중에 오류가 발생하였습니다.<br><br>
						<a href='main.html'><i class='material-icons'>home </i>홈페이지로 돌아가기</a>.$conn->error";

			}
		else {
			echo "회원가입 중에 오류가 발생하였습니다.<br><br>
						<a href='main.html'><i class='material-icons'>home </i>홈페이지로 돌아가기</a>.$conn->error";
		}
		?>
	</div>
</body>
</html>