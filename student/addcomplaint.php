<?php
if(isset($_POST['rollno'])){
    include 'db.php';
    $rollno = $_POST['rollno'];
    $complaint = $con->real_escape_string($_POST['complaint']);
    $query = "INSERT INTO complaints (complaint, rollno) VALUES ('".$complaint."', $rollno)";
    if($con->query($query)){
        echo "ADDED";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}