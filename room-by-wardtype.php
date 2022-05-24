<?php
 require "db_config.php";
$selected_wardtype = $_POST["selected_wardtype"];
$query = "select room_number from rooms where ward_type='$selected_wardtype'";
$result=mysqli_query($conn,$query);
?>
<option value="none" hidden>Select the Room Number</option>
<?php
while($row = mysqli_fetch_array($result)) 
{

 echo '<option value="'.$row['room_number'].'">'.$row['room_number'].'</option>';

}
?>