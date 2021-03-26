<?php
if(isset($_POST['submit'])){
    $room = $_POST['room'];
    $roll = $_POST['roll'];
    $name = $_POST['name'];

    include '../student/db.php';

    $query = "INSERT INTO marutham (name, rollno, roomno) VALUES ('$name', $roll, $room);";
    if($con->query($query)){
        echo "<script>alert('added')</script>";
    }else{
        echo $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>Admin</h1>

    <a class="btn btn-info" href="index.php">Go Back</a>

</div>

<div class="container">

        <form action="addStudent.php" method="post">
            <div class="form-group">
                <label for="name">Enter Name: </label>
                <textarea class="form-control" id="name" name="name" required></textarea>
            </div>
            <div class="form-group">
                <label for="rno">Enter Roll: </label>
                <textarea class="form-control" id="rno" name="roll" required></textarea>
            </div>
            <div class="form-group">
                <label for="room">Enter Roomno: </label>
                <textarea class="form-control" id="room" name="room" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Add" name="submit">
            </div>
        </form>

</div>



</body>
</html>
