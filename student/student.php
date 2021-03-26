<?php
if(isset($_POST['rollno'])){
    $rollno = $_POST['rollno'];
    include "db.php";
    $query = "SELECT * FROM marutham where rollno =".$rollno.";";
    if($result = $con->query($query)){
        $row = $result->fetch_assoc();
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
            <h1>STUDENT SITE FOR ROOM NO: <?php echo $row['roomno']?></h1>
            <p>Name: <?php echo $row['name']?></p>
            <p>Roll No: <?php echo $row['rollno']?></p>
        </div>

        <div class="container">
            <div id="result"></div>

            <?php
            if($row['light']==0){
                ?>
                <button id='lightbt' class='btn btn-danger' onclick='light(1)'>Lights Off</button>
                <?php
            }else{
                ?>
                <button id='lightbt' class='btn btn-success' onclick='light(0)'>Lights On</button>
                <?php
            }
            ?>

            <?php
            if($row['fan']==0){
                ?>
                <button id='fanbt' class='btn btn-danger' onclick='fan(1)'>Fans Off</button>
                <?php
            }else{
                ?>
                <button id='fanbt' class='btn btn-success' onclick='fan(0)'>Fans On</button>
                <?php
            }
            ?>

            <div id="cmps"></div>
            <form>
                <div class="form-group">
                    <label for="complaint">Enter Complaint:</label>
                    <textarea class="form-control" placeholder="Enter Complaint" id="complaint" name="complaint"></textarea>
                </div>

                <button type="button" class="btn btn-success" onclick="addcomplaint()">Add Complaint</button>
            </form>

            <div id="showann"></div>

        </div>

        <script>
            var roll = <?php echo $rollno ?>;
            var room = <?php echo $row['roomno'] ?>;

            function light(set){
                //console.log(set);
                let lightbt = $('#lightbt');
                $.post('changelight.php', {
                    rollno: roll,
                    set: set
                }, function (data){
                    $('#result').html(data);
                    if(data==='Not In Hostel'){
                        console.log(data);
                    }else {
                        if (!set) {
                            lightbt.removeClass('btn-success');
                            lightbt.addClass('btn-danger');
                            lightbt.attr('onclick', 'light(1)');
                            lightbt.html('Lights Off');
                        } else {
                            lightbt.removeClass('btn-danger');
                            lightbt.addClass('btn-success');
                            lightbt.attr('onclick', 'light(0)');
                            lightbt.html('Lights On');
                        }
                    }
                })
            }
            function fan(set){
                set = Number(set);
                let fanbt = $('#fanbt');
                $.post('changefan.php', {
                    rollno: roll,
                    set: set
                }, function (data){
                    $('#result').html(data);
                    if(data==='Not In Hostel'){
                        console.log(data);
                    }else {
                        if (!set) {
                            fanbt.removeClass('btn-success');
                            fanbt.addClass('btn-danger');
                            fanbt.attr('onclick', 'fan(1)');
                            fanbt.html('Fans Off');
                        } else {
                            fanbt.removeClass('btn-danger');
                            fanbt.addClass('btn-success');
                            fanbt.attr('onclick', 'fan(0)');
                            fanbt.html('Fans On');
                        }
                    }
                })
            }

            function addcomplaint(){
                let complaint = $('#complaint');
                if(!complaint.val()){
                    $('#result').html('Enter all data');
                    return;
                }
                $.post('addcomplaint.php', {
                    complaint: complaint.val(),
                    roomno: room
                }, function (data){
                    $('#result').html(data);
                    loadcomplaint();
                })
            }

            $(document).ready(function () {
                loadcomplaint();
                showAnn();
            })
            function loadcomplaint(){
                $.post('loadcomplaint.php', {
                    roomno: room
                }, function (data) {
                    $('#cmps').html(data);
                })
            }

            function showAnn(){
                $.post('../admin/loadAnnouncements.php', function (data){
                    $('#showann').html(data);
                })
            }
        </script>
        </body>
        </html>

<?php
    }

}else{
    echo "<script>window.location.href='index.php'</script>";
}