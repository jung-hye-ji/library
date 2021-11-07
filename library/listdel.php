<?php
    include "dbconn.php";


    $idx = $_GET['idx'];


    $query= "delete from book_board where idx='$idx' ";

    mysqli_query($conn, $query);
?>

<script>
        location.href="list.php";
</script>


