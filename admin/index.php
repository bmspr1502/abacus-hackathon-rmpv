<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
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

    <a class="btn btn-info" href="../index.php">Go Back</a>
    <a class="btn btn-warning" href="addStudent.php">Add New Student</a>
</div>

<div class="container">
    <div id="showann"></div>
    <div id="announcement">
        <form action="addAnnouncement.php" method="post">
            <div class="form-group">
                <label for="announ">Enter announcement: </label>
                <textarea class="form-control" id="announ" name="announce" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Add" name="submit">
            </div>
        </form>
    </div>
    <div id="status"></div>
    <div id="result"></div>
</div>

<script>
    $(document).ready(function(){
        showDet();
        showAnn();
    });

    function status(roll, set){
        set = set?0:1;
        //console.log(set);
        $.post('updateStatus.php',{
            rollno: roll,
            set: set
        }, function (data){
            $('#status').html(data);
            showDet();
        })

    }

    function showDet(){
        $.post('showComplaints.php', function (data){
            $('#result').html(data);
        })
    }

    function showAnn(){
        $.post('loadAnnouncements.php', function (data){
            $('#showann').html(data);
        })
    }
</script>

</body>
</html>
