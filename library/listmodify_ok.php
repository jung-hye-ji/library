<?php
include "dbconn.php";

$idx = $_GET['idx'];


    $query= "update book_board set name='$name',
    subject='$subject', 
    memo='$memo'
    where idx='$idx' ";

    mysqli_query($conn, $query);

?>

<script>
        location.href="list.php";
</script>