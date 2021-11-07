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

$sql="select * from member where uid = '$uid' and password = '$password'";

$result = $conn->query($sql);
if($result->num_rows > 0) {
	$row=$result->fetch_assoc();
	$name=$row['name'];
	$_SESSION['uid']=$row['uid'];
	$_SESSION['name']=$row['name'];
	$_SESSION['is_login'] = true;
	echo "$name 회원님 환영합니다.<br><br>";
	echo "<a href='main.php'><i class='material-icons'>home
			</i>홈페이지로 돌아가기</a>";
			
	
}
else {
	echo "<i class='material-icons'>pan_tool</i>&nbsp 아이디 또는 비밀번호가 맞지 않습니다.<br><br>";
	echo"<a href='login.html'><i class='material-icons'>keyboard_return</i>&nbsp&nbsp로그인</a>";
}

?>
	</div>
</body>
</html>