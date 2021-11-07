<?php
# MySQL 서버의 특정 데이터베이스로 연결하기
$server = "localhost"; // mysql 서버가 동작하는 호스트 컴퓨터의 IP주소 또는 도메인 이름
$user = "root"; 	// mysql 서버의 접속 계정
$passwd = ""; // 계정의 비밀번호
$dbname = "library";   // 연결할 데이터베이스 이름
// $conn 객체는 mysqli 클래스의 객체. 연결이 성공하면 정상적으로 생성된 것.
$conn = new mysqli($server, $user, $passwd, $dbname);  // db 서버에 접속 요청
if ($conn->connect_error)
	die("library 접속 오류");



?>
