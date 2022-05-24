<?php

require 'db_config.php';
$rec_reg_id = $_GET['rec_reg_id'];
$query ="SELECT * FROM recepient_reg
        WHERE Recepient_reg_num='$rec_reg_id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

echo $row['recepient_name'];
?>