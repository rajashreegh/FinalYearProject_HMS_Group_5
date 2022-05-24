<?php

require 'db_config.php';

$query3="SELECT * FROM labtest_report_ba b INNER JOIN test_bookings t 
					ON b.booking_id=t.booking_id INNER JOIN labtest l ON t.test_id=l.id";
$result3=mysqli_query($conn,$query3);
while($row=mysqli_fetch_assoc($result3)){
			echo '<tr>

							<td>'.$row['booking_id'].'</td>
							<td>'.$row['booking_done_by'].'</td>
							<td>'.$row['test_name'].'</td>';
							$newDate = date("d-m-Y", strtotime($row['date']));
					echo	'<td>'.$newDate.'</td>
							<td>'.$row['amount'].'</td>
							<td><a href="download_ba_report.php?b_id='.$row['booking_id'].'" target="_blank">View Report</a></td>
							<td>---</td>
					</tr>';
			}

$query4="SELECT * FROM labtest_report_di d INNER JOIN test_bookings t 
					ON d.booking_id=t.booking_id INNER JOIN labtest l ON t.test_id=l.id";
$result4=mysqli_query($conn,$query4);
			while($row=mysqli_fetch_assoc($result4)){
				echo '<tr>

							<td>'.$row['booking_id'].'</td>
							<td>'.$row['booking_done_by'].'</td>
							<td>'.$row['test_name'].'</td>';
							$newDate = date("d-m-Y", strtotime($row['date']));
					echo	'<td>'.$newDate.'</td>
							<td>'.$row['amount'].'</td>
							<td><a href="download_di_report.php?b_id='.$row['booking_id'].'" target="_blank">View Report</a></td>
							<td><a href="diagonistic_imaging_documents/'.$row['docs'].'" target="_blank">'.$row['docs'].'</a></td>
					</tr>';
			}


?>