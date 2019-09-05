<?php
    include("connection.php");
    $id=$_GET['id'];
    $issued_to=$_GET['issued_to'];
    $today=date("Y-m-d");
    $sql="UPDATE issue_details SET returned_at='$today' WHERE file='$id' and issued_to='$issued_to'";
    $sql2="UPDATE rec_record_master SET is_issued=0 WHERE id='$id'";
    $result=$conn->query($sql);
    $result2=$conn->query($sql2);
    if($result && $result2){
        echo "<script>window.location.href='returnfiles.php'</script>";
    }
?>