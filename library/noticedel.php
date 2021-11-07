<?php
    include "dbconn.php";


    $idx = $_GET['idx'];


    $query= "delete from notice where idx='$idx' ";

    mysqli_query($conn, $query);
?>

<script>
        location.href="notice.php";
</script>
