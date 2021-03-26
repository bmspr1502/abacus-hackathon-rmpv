<?php
if(isset($_POST['roomno'])){
    include 'db.php';
    $room = $_POST['roomno'];
    $query = "SELECT * FROM complaints WHERE roomno = $room";
    if($result = $con->query($query)){
        ?>
        <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>Complaint Id</th>
            <th>Complaint</th>
            <th>Status</th>
            <th>Response</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['compid'] ?></td>
                <td><textarea class="form-control" disabled><?php echo $row['complaint'] ?></textarea></td>
                <td><?php if($row['status']){
                    echo "<p class='bg-success text-white'>Complaint Noted</p>";
                    echo "</td><td><textarea class='form-control' disabled>" . $row['response'] ."</textarea></td>";
                    }else{
                        echo "<p class='bg-danger text-white'>Not responded</p>";
                    }?></td>
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
}else{
    echo "NOT VIEWABLE";
}