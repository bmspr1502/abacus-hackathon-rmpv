<?php
    include '../student/db.php';
    $qry = "SELECT * FROM announcements ";
    if($result = $con->query($qry)){
        ?>
        <div class="col">
            <h1>Announcements</h1>
        <?php
       while($row = $result->fetch_assoc()){
           ?>
           <div class="card">
               <div class="card-header"><h5><?php echo $row['time']?>: Admin</h5></div>
               <div class="card-body"><?php echo $row['announce']?></div>
           </div>
<?php
       }
       ?>

        </div>
            <?php
    }else {
        echo $con->error;
    }
