<?php

require 'db_config.php';

$filter_options=$_POST['filter_options'];

foreach ($filter_options as $fo) {

    if($fo == 'Blood Analysis' || $fo == 'Diagonistic Imaging'){
        $query="SELECT * FROM labtest l INNER JOIN test_bookings t ON l.id=t.test_id WHERE category LIKE '$fo'";
        $result=mysqli_query($conn,$query);
        $fetched_result=mysqli_fetch_assoc($result);

        if($fetched_result['category'] === 'Blood Analysis'){

            $query1="SELECT * FROM labtest l INNER JOIN test_bookings t 
                    ON l.id=t.test_id INNER JOIN labtest_report_ba b 
                    ON t.booking_id=b.booking_id WHERE category LIKE '$fo'";
            $result1=mysqli_query($conn,$query1);
            while($row=mysqli_fetch_assoc($result1)){
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
            }
        }else if($fetched_result['category'] === 'Diagonistic Imaging'){

            $query2="SELECT * FROM labtest l INNER JOIN test_bookings t 
                    ON l.id=t.test_id INNER JOIN labtest_report_di d 
                    ON t.booking_id=d.booking_id WHERE category LIKE '$fo'";
            $result2=mysqli_query($conn,$query2);
            while($row=mysqli_fetch_assoc($result2)){
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
    }
    
    else if($fo != 'Blood Analysis' || $fo != 'Diagonistic Imaging'){
        $query="SELECT * FROM labtest l INNER JOIN test_bookings t ON l.id=t.test_id WHERE test_name LIKE '$fo'";
        $result=mysqli_query($conn,$query);
        $fetched_result=mysqli_fetch_assoc($result);

        if($fetched_result['category'] === 'Blood Analysis'){

            $query1="SELECT * FROM labtest l INNER JOIN test_bookings t 
                    ON l.id=t.test_id INNER JOIN labtest_report_ba b 
                    ON t.booking_id=b.booking_id WHERE test_name LIKE '$fo'";
            $result1=mysqli_query($conn,$query1);
            while($row=mysqli_fetch_assoc($result1)){
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
            }
        }else if($fetched_result['category'] === 'Diagonistic Imaging'){

            $query2="SELECT * FROM labtest l INNER JOIN test_bookings t 
                    ON l.id=t.test_id INNER JOIN labtest_report_di d 
                    ON t.booking_id=d.booking_id WHERE test_name LIKE '$fo'";
            $result2=mysqli_query($conn,$query2);
            while($row=mysqli_fetch_assoc($result2)){
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

    }

}

?>