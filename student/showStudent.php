<?php
include 'db.php';
$query = "SELECT * FROM marutham ";


if($result = $con->query($query)){
    ?>
    <table class="table table-dark table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Room No</th>
        <th>Status</th>
        <th>View Details</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($row = $result->fetch_assoc()){
        ?>

            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['roomno']?></td>
                <td><?php if($row['status']){
                        echo "<p class='bg-success text-white'>In Hostel</p>";
                    }else{
                        echo "<p class='bg-danger text-white'>Not In Hostel</p>";
                    }?></td>
                <td>
                    <form action="student.php" method="post">
                    <button id="<?php echo $row['rollno']?>" class="btn btn-success" value="<?php echo $row['rollno']?>" name="rollno" >View Details</button>
                    </form>
                </td>
            </tr>


<?php
    }

    ?>
    </tbody>
    </table>
    <?php
}