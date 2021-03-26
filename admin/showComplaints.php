<?php
    include '../student/db.php';

    //$room = $_POST['roomno'];
    $query = "SELECT * FROM complaints ";
    if($result = $con->query($query)){
        ?>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Complaint Id</th>
                <th>Complaint</th>
                <th>Room No.</th>
                <th>Hostel Name</th>
                <th>Response</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($row = $result->fetch_assoc()){
                ?>
                <tr>

                        <td><?php echo $row['compid'] ?> </td>
                        <td><textarea class="form-control" disabled><?php echo $row['complaint'] ?></textarea></td>
                        <td><?php echo $row['roomno'] ?></td>
                            <td><?php echo $row['hostelname'] ?></td>
                            <td>
                                <?php
                                if($row['status']==0){
                                ?>
                                <form action="sendResponse.php" method="post">
                                    <input type="hidden" value="<?php echo $row['compid'] ?>" name="compid">
                                    <textarea class="form-control" name="response"></textarea>
                    <input type="submit" class="btn btn-info" value="Send Response" name="update">
                                </form>
                                    <?php
                                } else {
                                    ?>
                                    <textarea class="form-control" disabled><?php echo $row['response'] ?></textarea>
                                    <?php
                                }
                                    ?>
                            </td>


                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }else{
        echo $con->error;
    }
