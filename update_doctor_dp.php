<?php

session_start();
require "db_config.php";

$id = $_SESSION['doctor_id'];
$name= $_SESSION['doctor_name'];
$mail = $_SESSION['doctor_email'];

if(isset($_POST["submit"])){
    if(!empty($_FILES["file"]["name"])){
       /* Getting file name */
	    $filename = basename($_FILES['file']['name']);
        $targetLoc = "Doctor_dp_uploads/";
	/* Location */
	    $location = $targetLoc . $filename;
	    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	    

	/* Valid extensions */
	    $valid_extensions = array('jpg','jpeg','png');
        if(in_array($imageFileType, $valid_extensions)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
                // Insert image file name into database
                $query="UPDATE doctor_profile_pic
                        SET pic_file_name = '$filename'
                        WHERE doctor_id='$id'";
                
                if(mysqli_query($conn,$query)){
                    $response = "Your Profile Picture is updated successfully.";
                }else{
                    $response = "Failed updating your Profile Picture";
                } 
            }else{
                $response = "There occured some error in uploading your file";
            }
        }else{
            $response = "No other formats allowed except JPG, JPEG, PNG";
        }
    }else{
        $response = 'Please select a file to upload.';
    }
    header('Location:edit_doc_profile.php');

}
?>