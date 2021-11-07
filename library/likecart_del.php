<?php
    include_once('dbconn.php');


    $no = $_POST['no'];



        for($i=0; $i < count($no); $i++) {
            $sql = "delete from likecart where no = $no[$i]";
            $result = $conn->query($sql);
        }
        
        echo "<script>alert('선택하신 목록이 삭제되었습니다.'); location.href='likecart.php';</script>";

?>