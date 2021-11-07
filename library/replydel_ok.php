<?php
    include "dbconn.php";


    $idx = $_GET['idx'];
    $password = $_POST['passwd_confirm'];

    $query = "Select password from reply";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

   

    if(in_array("$password", $data)) {
    
        $query= "delete from reply where con_num='$idx' && password = '$password'";

        mysqli_query($conn, $query);
        echo "<script>alert('댓글이 삭제되었습니다.'); 
        location.href='listview.php?idx=$idx';</script>";

    }
    else {
        echo "<script>alert('비밀번호 인증에 실패했습니다.'); 
        location.href='listview.php?idx=$idx';</script>";
    }
    ?>