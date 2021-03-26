<?php
if(isset($_POST['update'])){
    include '../student/db.php';
    $compid = $_POST['compid'];
    $response = $con->real_escape_string($_POST['response']);
    $up = "UPDATE complaints SET status = 1, response = '$response' WHERE compid = $compid";

    if($con->query($up)){
        echo "<script>    
                alert('Sent');
            window.location.href='index.php'</script>";
    }
}else{
    echo "NOT VIEWABLE";
}