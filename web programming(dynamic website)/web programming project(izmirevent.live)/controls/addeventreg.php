<?php
    require_once('../database/config.php');
    

    $title = $_POST['register_title'];
    $date = $_POST['register_date'];
    $time = $_POST['register_time'];
    $time = "$time".":00";
    $location = $_POST['register_location'];
    mysqli_query($link,"insert into event (title,date,time,location) values('$title','$date','$time','$location')");

    $sql = "SELECT * from event where title='$title'";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){
                $eventid = $row['id'];
                $sql="INSERT into eventimg (eventid,status) values ('$eventid',1)";
                mysqli_query($link,$sql);
                $_SESSION['eid'] = $eventid;
                
            }
            header("Location: ../addevent.php");
        } 
        else{
            $_SESSION['message'] = 'Please check your entry.';
            header("Location: ../addevent.php");
        }
        
    
    

?>