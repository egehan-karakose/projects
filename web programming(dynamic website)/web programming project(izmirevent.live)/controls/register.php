<?php
    require_once('../database/config.php');
    require_once('../securimage/securimage.php');
    

    $securimage = new Securimage();
    $captcha = $_POST['register_captcha'];
    $name = $_POST['register_name'];
    $email = $_POST['register_email'];
    $query = mysqli_query($link,"select * from user where email = '$email'");
    $result = mysqli_num_rows($query);
    


    if($securimage->check($captcha) == false){
        $_SESSION['message'] = 'You write wrong security code.';
        header("Location: ../login.php");
    }
    elseif($result > 0){
        $_SESSION['message'] = 'This email address was previously registered.';
        header("Location: ../login.php");
    }
    else{
        $rand = md5(rand(0,100000));
        $password = md5($_POST['register_password']);
        
        $reqister_query = mysqli_query($link,"insert into user (name,email,code,password) values('$name','$email','$rand','$password')");

        
        
        }

        $sql = "SELECT * from user where email='$email'";
        $res = mysqli_query($link,$sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){
                $userid = $row['id'];
                $sql="INSERT into profileimg (userid,status) values ('$userid',1)";
                mysqli_query($link,$sql);
                
            }

        } 
        header("Location: ../login.php");


        

        
    

?>