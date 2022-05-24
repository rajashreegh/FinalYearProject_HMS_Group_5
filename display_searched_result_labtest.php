<?php

require 'db_config.php';
$st=$_GET['st'];

$query="SELECT b.booking_id,t.booking_done_by,l.test_name,t.date,t.amount,b.docs,l.category 
		FROM labtest_report_ba b INNER JOIN test_bookings t 
		ON b.booking_id=t.booking_id INNER JOIN labtest l ON t.test_id=l.id
		WHERE b.booking_id LIKE '%$st%' OR t.booking_done_by LIKE '%$st%' 
		OR t.date LIKE '%$st%'
		UNION
		SELECT d.booking_id,t.booking_done_by,l.test_name,t.date,t.amount,d.docs,l.category 
		FROM labtest_report_di d INNER JOIN test_bookings t 
		ON d.booking_id=t.booking_id INNER JOIN labtest l ON t.test_id=l.id
		WHERE d.booking_id LIKE '%$st%' OR t.booking_done_by LIKE '%$st%' 
		OR t.date LIKE '%$st%'";

$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)!=0){
	while($row=mysqli_fetch_assoc($result)){
		if($row['category'] == 'Blood Analysis'){
			echo '<tr>

                            <td>'.$row['booking_id'].'</td>
                            <td>'.$row['booking_done_by'].'</td>
                            <td>'.$row['test_name'].'</td>';
                            $newDate = date("d-m-Y", strtotime($row['date']));
                    echo    '<td>'.$newDate.'</td>
                            <td>'.$row['amount'].'</td>
                            <td><a href="download_ba_report.php?b_id='.$row['booking_id'].'" target="_blank">View Report</a></td>
                            <td>---</td>

                    </tr>';
                }else if($row['category'] == 'Diagonistic Imaging'){
                	echo '<tr>

                            <td>'.$row['booking_id'].'</td>
                            <td>'.$row['booking_done_by'].'</td>
                            <td>'.$row['test_name'].'</td>';
                            $newDate = date("d-m-Y", strtotime($row['date']));
                    echo    '<td>'.$newDate.'</td>
                            <td>'.$row['amount'].'</td>
                            <td><a href="download_di_report.php?b_id='.$row['booking_id'].'" target="_blank">View Report</a></td>
							<td><a href="diagonistic_imaging_documents/'.$row['docs'].'" target="_blank">'.$row['docs'].'</a></td>

                    </tr>';
                }
		
	}
	
}else{
	echo '<div id="no_data_found"><h1>No data found...</h1></div>';
}


?>