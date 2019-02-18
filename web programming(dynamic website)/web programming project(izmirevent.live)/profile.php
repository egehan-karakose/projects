<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>My Profile</title>
    
    <link rel="stylesheet" href="main2.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
</head>
<body>
<?php 
    require_once('database/config.php');
    include('includes/header.php');
    if(!isset($_SESSION['login']) || !isset($_SESSION['id'])){
        header('Location: login.php');
    }
    if(isset($_SESSION['message'])){
        if(isset($_SESSION['message_type'])){
            $color = $_SESSION['message_type'];
            echo "<div class='topBar $color'>".$_SESSION['message']."</div>";
            unset($_SESSION['message_type']);
        }
       else{
           echo "<div class='topBar'>".$_SESSION['message']."</div>";
       }
        
        unset($_SESSION['message']);
    }

?>
<br>
<br>
<br>
<br>

<div id="header">
       <div class="bg-image"></div>
       <div class="content">
	<div class="profile_photo">
		<div class="profile_square">
        	<div class="circle_wrapper">
            	<a class="fancy_update" data-fancybox data-src="#update">
                    <?php 
                    $id = $_SESSION['id'];
                    $sql = "SELECT * from profileimg Where userid = '$id';";
                    $res = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_assoc($res)){
                     if ($row['status'] == 0){
                            echo "<div class='profile_circle' style='background-image:url(images/profile/"."$id".".jpg)'></div>";
                     }else {
                            echo "<div class='profile_circle' style='background-image:url(icons/no-profile.png)'></div>";
                    }
                    
                    }
                    
                    
                    ?>
                	
                </a>
            </div>
        </div>
    </div>
    <div class="profile_name">
        <?php echo $fetch_user['name']; ?>    
    </div>
    <br>
    
    <hr>
    
    <?php
    if(isset($_SESSION['id'])){
        
        $id = $_SESSION['id'];
                    $sql = "SELECT * from profileimg Where userid = '$id';";
                    $res = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_assoc($res)){
                     if ($row['status'] == 0){
                            
                     }else {
                         echo "<p>Choose A Profile Photo</p>";
                        echo "<div>
                        <form action='upload.php' method='POST' enctype='multipart/form-data'>
                        <input type='file' name='file'>
                        <button type='submitImg' name='submitImg'>UPLOAD</button>
                    </form></div>";
                    }
                    
                    }
        
        
        
        
        
        
        }
    
        
    
    
    ?>
    
    <br>
    
    <br>
    </div>
       
   </div>
   
    <div id="footer">
       <div>Carpe Diem</div>
       <div>All Events in<a href="#" target="_blank"> IzmirEvent</a></div>
       <div>
       <table>
            <th><a href="https://www.facebook.com/egehan.karakose"><i class="fab fa-facebook-f"></i></a></th>
            <th><a href="https://twitter.com/egehan205"><i class="fab fa-twitter"></i></a></th>
            <th><a href="https://www.instagram.com/egehan205/"><i class="fab fa-instagram"></i></a></th>
              </table>
          
           
        </div>
       
   </div>

    

</body>
</html>