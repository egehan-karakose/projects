<?php
    require_once('../database/config.php');
    $email = $_POST['login_email'];
    $password = md5($_POST['login_password']);

    $login = mysqli_query($link,"select * from user where email = '$email' and password = '$password' ");
    if(mysqli_num_rows($login) > 0){
        if(isset($_POST['remember'])){
	        setcookie('remember', $email, time() + (60*60*24) , '/');
        }
        $login_fetch = mysqli_fetch_array($login);
        $_SESSION['login'] = $login_fetch['id'];
        $_SESSION['id']= $login_fetch['id'];
    
        header("Location: ../index.php");
    }
    else{
        $_SESSION['message'] = 'Please check your e-mail address and password.';
        header("Location: ../login.php");
    }

?>