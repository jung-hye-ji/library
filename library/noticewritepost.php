<?php
    include "dbconn.php";


    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $memo = $_POST['memo'];

    $tmpfile = $_FILE['b_file']['tmp_name'];
    $o_name = $_FILE['b_file']['name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILE['b_file']['name']);
    $forder = "upload/".$filename;
    move_uploaded_file($tmpfile,$folder);


            $regdate = date("Y-m-d");

            $query= "insert into notice(name, subject, memo, regdate,file)
                    values('$name','$subject','$memo','$regdate','$o_name') ";

            mysqli_query($conn, $query);
    
?>

<script>
        location.href="notice.php";
</script>