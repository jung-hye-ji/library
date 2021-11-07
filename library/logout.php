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
		session_destroy();
		echo "로그아웃되었습니다.<br>";
		echo "<a href='main.html'><i class='material-icons'>home
			</i>홈페이지로 돌아가기</a>";
		?>
	</div>
	</body>
</html>