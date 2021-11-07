<?php
	include "dbconn.php";

    $bno = $_GET['idx'];
    $userpw = $_POST['dat_pw'];
    $dat_user = $_POST['dat_user'];
    $content = $_POST['content'];



    if($bno && $dat_user && $userpw && $content){
        $query= "insert into reply(con_num, name, password, content)
                    values('$bno','$dat_user','$userpw','$content') ";

            mysqli_query($conn, $query);
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='listview.php?idx=$bno';</script>";

    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	

?>