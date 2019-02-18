<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>AddEvent</title>
    <link rel="shortcut icon" type="image/x-icon" href="icons/font-awesome_4-7-0_star_32_8_f15b58_none.png">
	<link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="main2.css">
	<link rel="stylesheet" href="style.css">
   
    <meta charset="utf-8">
</head>
<body>
<?php 
	include('includes/header.php');
	
    if(!isset($_SESSION['login'])){
        header('Location: login.php');
     }
    if(isset($_SESSION['message'])){
        echo "<div class='topBar'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    
?>
    <div class="login_welcome">
        <div class="login_welcome_left">
            <ul class="login_list">
                <li><a href="index.php">Home</a></li>
                <li class="seperator"><span class="boldtext">AddEvent</span></li>
            </ul>
        </div>
   	</div>
       <br>
       <br>
	<div class="login_middle">
  		 <div class="event_wrapper">
    		<div class="register_wrapper">
				<h3 class="both_title">Event Form</h3>

				<div class="register_message" id="register_message">Add your events like concert,theater or something like that.</div>
				
                <form name="register_form" id="register_form" action="controls/addeventreg.php" method="post">
                
				<label class="register_label" for="register_title">Event Title
      				<input type="text" name="register_title" id="register_title" class="register_input" autocomplete="off" spellcheck="false" required>
	 			</label>
               
    			<label class="register_label">Date 
      				<input type="date" name="register_date" id="register_date" class="register_input" autocomplete="off" spellcheck="false" required>
      			</label>
                  <label class="register_label">Time 
      				<input type="time" name="register_time" id="register_time" class="register_input" autocomplete="off" spellcheck="false" required>
      			</label>

      			
				<label class="register_label">Location
 	  				<input 
                    type="text" name="register_location" id="register_location" class="register_input" autocomplete="off" spellcheck="false" required>
 	  			</label>
 	  			
    			

                  
			
    			
    			<label class="register_terms_label">
    				<input type="checkbox" name="terms_checkbox" id="terms_checkbox" checked="checked" class="both_checkbox">
                    <a href="terms.php" class="both_checkbox"  title="Kullanim Kosullari">Accept Terms of Use.</a>
    			</label>
				<label class="register_terms_label">
			<input type="submit" class="register_button" id="register_button" name="register_button" value="Add Event">
                </label>
                </form>
            </div>
            
            <div class="login_wrapper floatright">
            <label class="register_label">Upload Poster
                  <?php
                    if(isset($_SESSION['eid'])){
                                  
                                     echo "<div style='padding:5px;margin:3px;'>
                                            <form action='uploadposter.php' method='POST' enctype='multipart/form-data'>
                                            <input type='file' name='file'>
                                            <button type='submitPoster' name='submitPoster'>UPLOAD</button>
                                            </form></div>";
                    } 
    
    ?>
      			</label>
                <label class="register_label">
                    
            <?php 
                    $eid = $_SESSION['eid'];
                    $sql = "SELECT * from eventimg Where eventid = '$eid';";
                    $res = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_assoc($res)){
                     if ($row['status'] == 0){
                            echo "<img src='images/poster/$eid.jpg'>";
                     }else {
                            echo "<img src='https://via.placeholder.com/350x300'>";
                    }
                    
                    }
                    
                    
                    ?>

                </label>
                


            </div>
            

            
			
		</div>
	</div>  


	
	
	
</body>

</html>
