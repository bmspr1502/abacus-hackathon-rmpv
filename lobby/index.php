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
    <h1>Lobby</h1>

    <a class="btn btn-info" href="../index.php">Go Back</a>
</div>

<div class="container">
    <div id="status"></div>
    <div id="result"></div>
</div>

<script>
    $(document).ready(function(){
        showDet();
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
        $.post('lobbyList.php', function (data){
            $('#result').html(data);
        })
    }
</script>

</body>
</html>
