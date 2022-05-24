<?php
 require "db_config.php";
$selected_room = $_POST["selected_room"];
$query = "select b.bed_number from beds b inner join rooms r on b.room_id=r.room_id where 
r.room_number='$selected_room' AND b.bed_assigned_status=0 ";
$result=mysqli_query($conn,$query);
?>
<option value="none" hidden>Select the Available Bed Number</option>
<?php
while($row = mysqli_fetch_array($result)) 
{

 echo '<option value="'.$row['bed_number'].'">'.$row['bed_number'].'</option>';

}
?>