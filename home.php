<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>


<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
      <title>Welcome - <?php echo $userRow['email']; ?></title>
             <script src="//code.jquery.com/jquery-1.10.2.js"></script>
             <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            
              <link rel="stylesheet" href="CSS/style.css">
  </head>
  
<body>
  
    <div id="header">
          <div id="left">
            <label>MyTvTimetable.ie</label>
          </div>
             <div id="right">
               <div id="content">
                     Welcome, <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
              </div>
            </div>
    </div>

        <div id=img>
          <img src="img/TimetableLogo.png"/>
        </div>
	
    	    <button type="button" id="randomiser"> Random show generator </button>
    	        <button type="button" id="PersonalisedTT"><a href="../../timetable.html">Personalised Timetable</a>  </button>
	
	
                <div class="timetable"></div>
    
                 <script src="timetable.js"></script>
    <script>
          var timetable = new Timetable();
    
          timetable.setScope(00,00)
          timetable.addLocations(['RTE1', 'RTE2', 'BBC1']);
    
    	  //Friday RTE
    	  timetable.addEvent('The Good Wife', 'RTE1', new Date(2015,7,17,00,00), new Date(2015,7,17,01,30), '#');
    	  
          timetable.addEvent('How To Get Away With Murder', 'RTE2', new Date(2015,7,17,01,00), new Date(2015,7,17,02,25), '#');
          
          timetable.addEvent('This Week', 'BBC1', new Date(2015,7,17,03,00), new Date(2015,7,17,04,45), '#');
          
          var renderer = new Timetable.Renderer(timetable);
          renderer.draw('.timetable');
    </script>

          
	  
	    <div id="personal"></div>
	
		    
</body>
</html>
