<?php
if(isset($_POST['rollno'])){
    $roll = $_POST['rollno'];
    $set = $_POST['set'];

    $qry = '';
    include '../student/db.php';
    if($set == 1)
    $qry = "UPDATE marutham SET status  =$set WHERE rollno = $roll";
    else{
        $qry = "UPDATE marutham SET status  =$set, fan=0, light=0 WHERE rollno = $roll";
    }
    if($con->query($qry)){
        echo "Updated";
    }else{
        echo $con->error;
    }
}