<?php
    include "dbconn.php";


    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $memo = $_POST['memo'];


            $regdate = date("Y-m-d");
            $ip = $_SERVER["REMOTE_ADDR"];

            $query= "insert into book_board(name, subject, memo, regdate, ip)
                    values('$name','$subject','$memo','$regdate','$ip') ";

            mysqli_query($conn, $query);
    
?>

<script>
        location.href="list.php";
</script>