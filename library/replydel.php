<?php
    include "dbconn.php";

    $idx = $_GET['idx'];

    $query= "select * from book_board where idx='$idx'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);


?>

<!doctype html>
<html>
<head>
	<title>password confirm</title>
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


<!-- 댓글 삭제 비밀번호 확인 -->
<form action = "replydel_ok.php?idx=<?php echo $idx ?>" method="POST" id="passwd_form">
                    <div class="del_rp">
                        <input type="password" name="passwd_confirm" class="dat_pw" size="15" placeholder="비밀번호">
                        <input type="submit" value="확인" id="rep_bt" class="re_bt">
                    </div>
</form>
</body>
</html>


