<?php

include '../student/db.php';

$query = "SELECT * FROM marutham";


if($result = $con->query($query)){
    ?>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Room No</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = $result->fetch_assoc()){
            ?>

            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['roomno']?></td>
                <td>
                    <button id="<?php echo $row['rollno']?>" class="btn <?php if($row['status']==1){echo "btn-success";}else{ echo "btn-danger";}?>" onclick="status(<?php echo $row['rollno']?>, <?php echo $row['status'];?> )" name="rollno" ><?php if($row['status']){
                        echo "Inside Hostel";
                        }else{
                        echo "Outside Hostel";
                        }?></button>
                </td>
            </tr>


            <?php
        }

        ?>
        </tbody>
    </table>
    <?php
}
