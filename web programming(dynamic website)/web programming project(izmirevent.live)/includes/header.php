<?php
    require_once('database/config.php');
    include('functions/check-info.php');
?>
<div id="container">
   <a id="icon"></a>
    <div id="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#section-b">Events</a></li>
            <li><a href="index.php#section-c">About</a></li>
            <li><a href="index.php#section-c">Contact</a></li>
            <li><a href="index.php#footer">Referances</a></li>
        </ul>

    </div>

    <?php if(!isset($_SESSION['login'])): ?>
    <div id="login">
    <ul>
        <li ><a href="login.php" class="reg">Register</a></li>
        <li ><a href="login.php" class="log">Login</a></li>
      </ul>  
    </div>
    
    <?php 
         else:
             $user_id = $_SESSION['login'];
             $user = mysqli_query($link,"select * from user where id = '$user_id' ");
             
             

             $fetch_user = mysqli_fetch_array($user);
             
             
         ?>
        <div id="login" >
                   <ul>
                        <li> 
                            <a href="controls/logout.php">Log Out</a>
                         </li> 
                    
                         <li class="profilePhoto">
                         <a href="profile.php" title="Profile">
                        <div class="header_profile">
                        
                        <?php 
                            $id = $_SESSION['id'];
                            $sql = "SELECT * from profileimg Where userid = '$id';";
                             $res = mysqli_query($link, $sql);
                            while($row = mysqli_fetch_assoc($res)){
                             if ($row['status'] == 0){
                                 echo "<div class='header_pic' style='background-image:url(images/profile/"."$id".".jpg)'></div>";
                             }else {
                            echo "<div class='header_pic' style='background-image:url(icons/no-profile.png)'></div>";
                            }
                    
                    }
                    ?>
                    </a>
                    <a href="profile.php"><span class='username' ><?php echo $fetch_user['name']; ?></span></a>
                        </div>
                         </li>
                         <li> 
                            <a href="addevent.php">Add Event</a>
                         </li> 
                        
                  
                         
                    </ul>      
                        
               
            </div>
            <?php endif; ?>
   </div>