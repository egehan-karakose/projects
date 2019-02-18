<?php
session_start();
require_once('database/config.php');
$id = $_SESSION['id'];

if(isset($_POST['submitImg'])){
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
                $fileNameNew = $id."."."jpg";
                $fileDestination = 'images/profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $sql = "UPDATE profileimg SET status= 0 WHERE userid='$id';";
                mysqli_query($link, $sql);
                header("Location: profile.php");
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