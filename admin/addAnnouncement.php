<?php
if(isset($_POST['submit'])){
    include '../student/db.php';
    $ann = $con->real_escape_string($_POST['announce']);
    $qry = "INSERT INTO announcements (announce) VALUES ('$ann')";
    if($con->query($qry)){
        echo "<script>alert('Announced to all');";
        echo "window.location.href='index.php'</script>";
    }else{
        echo $con->error;
    }

}else{
    echo "NOT VIEWABLE";
}