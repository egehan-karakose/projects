<?php
session_start();
require_once('database/config.php');
$eid = $_SESSION['eid'];

if(isset($_POST['submitPoster'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError == 0){
            if($fileSize < 100000000){
                $fileNameNew = $eid."."."jpg";
                $fileDestination = 'images/poster/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $sql = "UPDATE eventimg SET status= 0 WHERE eventid='$eid';";
                mysqli_query($link, $sql);
                header("Location: addevent.php");
            }else{
                echo "Your file is too big!";
            }
 
        }else{
            echo "There was an error uploading this file!";
        }
    }else{
        echo "You cannot upload files of this type!";
        
    }    
}
?>   