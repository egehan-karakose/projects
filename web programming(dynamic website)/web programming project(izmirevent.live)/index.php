<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="izmir,Izmir,İzmir,Event,event,izmirevent,İzmirevent,IzmirEvent">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    <title>IzmirEvent.live</title>
</head>
<body>
    <!-- Navbar -->
  <?php
  include('includes/header.php') ;
  require_once('database/config.php');
  ?>




  
  <!-- Header2 -->
   <div id="header">
       <div class="bg-image"></div>
       <div class="content">
           <h1>Welcome to IzmirEvent.live</h1>
           <p>You can add your events that is like concert, theater or party via this website and all people that is in website can see you events! </p>
           <a href="readmore.php" class="btn">Read About Izmir</a>
       </div>
       
   </div>
   
   
   
   <!-- Main -->
   <div id="main">
     
      <div id="section-a">
          <div class="content">
              <h2>ADD EVENT</h2>
              <p>If you are giving a concert, theater or party ,or if you know something about it, you can add an event to call somebody to your event. You should add information, poster and location for each event you add. Unless it might be LIE or if somebody want to come they get information from this site.   </p>
          </div>
          
      </div>
      
      <div id="section-b">
          <div class="content">
              <ul>
              <?php
  

                    $sql = "SELECT * from event";
                    $res = mysqli_query($link,$sql);
                    if(mysqli_num_rows($res) > 0){
                    while ($row = mysqli_fetch_assoc($res)){
                         $title = $row['title'];
                         $date = $row['date'];
                         $time = $row['time'];
                         $location = $row['location'];
                         $id = $row['id'];
                         echo "<li>";
                         echo "<div class='col'>";
                        
                        $sql1 = "SELECT * from eventimg Where eventid = '$id';";
                        $res1 = mysqli_query($link, $sql1);
                        while($row1 = mysqli_fetch_assoc($res1)){
                                if ($row1['status'] == 0){
                            echo "<img src='images/poster/$id.jpg'>";
                            }else {
                            echo "<img src='https://via.placeholder.com/350x300'>";
                            }
                    
                            }
                        echo "<div class='col-content'>";
                        echo  "<h3 class='col-title'>$title</h3>";
                        echo "<hr>";
                        echo  "<p><i class='fas fa-calendar-alt'></i> Date :$date</p>";
                        echo  "<p><i class='far fa-clock'></i> Time :$time</p>";
                        echo  "<p><i class='fas fa-map-marked-alt'></i> Location :$location</p>";
                        echo "</div>
                        
                          
                        </div>
                    </li>";
                    
                
            }
            
        } 

  ?>
              </ul>
          </div>
          
      </div>
      <div id="section-c">
          <div class="content">
              <h2 class="content-title">Carpe Diem</h2>
              <p>The exact meaning of this phrase is to “seize the day.” It is a proverb, which means that one should act today, and not wait for the future. More precisely, it refers to the plucking of the fruits. Thus, the full meaning of this line is to pluck your day, trust in the future as little as possible. In simple words, it means to enjoy today and the moment, without wasting time, because no one knows what may happen in the future.</p>
              
          </div>
      </div>
       
       <div id="section-d">
          
            <div class="box">
               <h2 class="content-title">
                   About Us
               </h2>
               <p>Actualy There Is No 'About Us' Because 'Us' Meaning A Group, But I Am Only One Person, That Name Is 'Egehan'</p>
               <p>IzmirEvent.live</p>
           </div>
           <div class="box">
               <h2 class="content-title">
                   Contact Us
               </h2>
               <p>Just Send Mail To Me <br/></p>
               <hr/>
               <br/>
               <a href="mailto:egehankarakose@std.iyte.edu.tr?Subject=Hello%20again" target="_top">Send Mail</a>
               
               
           </div>
           
           
       </div>
       
   </div>
   
   
   
   <!-- Footer -->
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
