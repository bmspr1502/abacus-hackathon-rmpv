<?php
if(isset($_POST['rollno'])){
    include "db.php";
    $rollno = $_POST['rollno'];
    $set = $_POST['set'];
    $query = "UPDATE marutham SET light=$set WHERE (rollno = $rollno AND status = 1)";
    if($con->query($query)){
        $qr = "SELECT status FROM marutham WHERE rollno = $rollno";
        if($result = $con->query($qr)){
            $row = $result->fetch_assoc();
            if($row['status']==0){
                echo "Not In Hostel";
            }else{
                echo "UPDATED LIGHT $set";
            }
        }
    }else{
        echo $con->error;
    }
}