<!DOCTYPE html>
<html>
    <head>
        <title>DJ 도서관</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@600&family=Song+Myung&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Song+Myung&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
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
# likecart 테이블에 레코드 추가하기
session_start();
include_once('dbconn.php');
if(!isset($_SESSION['uid'])){
    echo "로그인 후 이용하실 수 있습니다.<br>";
    echo "<a href='main.php'>메인으로 돌아가기</a>";

}
else {
        $uid = $_SESSION['uid'];
        $bookname = $_GET['bookname'];
        $writer = $_GET['writer'];
        $publisher = $_GET['publisher'];

        $sql = "insert into likecart (uid,mybook,writer,publisher) 
                values('$uid','$bookname','$writer','$publisher')";

                if($conn->query($sql)) {
                    
                    echo "선택하신 책의 좋아요가 완료되었습니다.<br>";
                    echo "<a href='main.php'>메인으로 돌아가기</a>";
                }
                else echo "대출이 실패하였습니다. ".$conn->error;
    }
?>
</div>
</body>
</html>