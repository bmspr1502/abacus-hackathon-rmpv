<?php
if(isset($_POST['roomno'])){
    include 'db.php';
    $room = $_POST['roomno'];
    $complaint = $con->real_escape_string($_POST['complaint']);
    $query = "INSERT INTO complaints (complaint, roomno, hostelname) VALUES ('".$complaint."', $room, 'marutham')";
    if($con->query($query)){
        echo "ADDED";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}