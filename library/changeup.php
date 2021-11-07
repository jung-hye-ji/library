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
			session_start();
			include_once('dbconn.php');
			$uid = $_POST['uid'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$mobile = $_POST['mobile'];

			$sql = "update member set password = '$password', 
			name = '$name', mobile = '$mobile' where uid = '$uid'";

			if($conn->query($sql)) {
			   $_SESSION['name'] = $name;
			   echo "$name 회원의 회원정보가 변경하였습니다.<br>";
			   echo "<a href='main.php'><i class='material-icons'>home
			</i>홈페이지로 돌아가기</a>";
			}
			else {
			   echo "회원정보변경 중에 오류가 발생하였습니다.". $conn->error;
			}
		?>
	</div>
	</body>
</html>
