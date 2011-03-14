	<?php
# Database connection to make things go!
//require_once "dbconnect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
  <head>
    <title>Study Buddy</title>
    <link rel="stylesheet" type="text/css" href="resources/stylesheets/style.css" />
    <script src="resources/inc/cufon-yui.js" type="text/javascript"></script>
	<script src="resources/inc/droid-sans.fonts.js" type="text/javascript"></script>
    <script src="resources/inc/grobold.fonts.js" type="text/javascript"></script>
	<script type="text/javascript">
      Cufon.replace('#logo', { fontFamily: 'Droid Sans Bold' }); 
    </script>	
  </head>
  <body style="height:100%;" onload="startSlideShow(0);">
	<script type="text/javascript">
    //<!--
	var j = 0;
    function startSlideShow(i){
		j = (i%14)+1;
        var element_ = document.getElementById("page_home");
		//element_.style.background="url(resources/images/home/slides/screen-"+j+".png)";		
        var src = "<img src=\"resources/images/home/slides/screen-" +j+".png\"" +" alt=\"resources/images/home/slides/screen-" +j+".png\"" +" style=\"height:491px; width:332px;\" />";
		element_.innerHTML=src;
		//
		
		setTimeout('startSlideShow(j);', 5000);
        var left_ = element_.offsetLeft;
        var top_ = element_.offsetTop;
        var width_ = element_.offsetLeft;
        var height_ = element_.offsetTop;
        var left = left_ + width_/2;
        var top = top_ + height_/2;
        
    //-->
    }
    </script> 
  

  <div id="header">
   <div id="wrap-head">
   <a id="logo" style="display:block; padding:0px; margin:0px;" href="index.php">Study Buddy</a>
   </div>
  </div>
  
    <div id="content">
      
    <table class="page">
    <tr>
    <td class="left-panel">
    <!--<div style="background-color:#870701; border:#870701 thick solid;"> -->
    <div style="background:url(resources/images/contentbg.png); repear-x; border-radius:10px;">
    <div class="wrap" style="margin:auto;">
    <h1>Project</h1>
    <p>
    <a href="index.php">Home</a> <br />
    <a href="process.php">Process</a> <br />
    <a href="slide-show.php">Slide Show</a> <br />
    <a href="resources/files/cs247_poster.pdf">Poster [Size: 75MB]</a> <br />
    <a href="people.php">Study Buddy Team</a> <br />
    <!--
    <ul style="margin-top:-10px; margin-bottom:0px; padding-top:0px; padding-bottom:0px;">
    <li style="margin-top:0px; padding-top:0px;"><a href="process.php#needfinding">Need Finding</a> </li>
    <li><a href="process.php#needfinding">Paper Prototyping</a> </li>
    <li><a href="process.php#paperprototyping">Project Planning</a> </li>
    <li><a href="process.php#alphaprototype">Alpha Prototype</a> </li>
    <li><a href="process.php#betaprototype">Beta Prototype</a> </li>
    <li><a href="process.php#usertesting">User Testing</a> </li>
    <li><a href="process.php#finalversion">Final Version</a> </li>
    </ul>-->
    <a href="special_thanks.php">Special Thanks</a> <br />
    </p>    
    </div>
    
    <hr style="color:#FFF;" />
    <div class="wrap" style="margin:auto; margin:auto;">
    <h1>Users</h1>
    <p>
    <a href="http://code.google.com/p/stanfordstudybuddy/wiki/FeatureList">Feature List</a> <br />
    <a href="file://resources/files/StuddyBuddy.Apk">Download</a><br />
    <a href="http://cs247.anantbhardwaj.com">Demo</a> <br />
    </p>
    </div>
    <hr style="color:#FFF;"/>
    <div class="wrap" style="margin:auto;">
    <h1>Developers</h1>
    <p>
    <a href="http://code.google.com/p/stanfordstudybuddy/">Developer Home</a> <br />
    <a href="http://code.google.com/p/stanfordstudybuddy/wiki/ToolsAndTechnology">Tools and Technology</a> <br />
    <a href="http://code.google.com/p/stanfordstudybuddy/source/checkout">Source Repository</a> <br />
    <a href="http://code.google.com/p/stanfordstudybuddy/w/list">Wiki</a> <br />
    </p>
    </div>
    </div>
    </td>

    
    <td class="main-panel" style="text-align:center">
    <div class="box">
    <h1> Slide Show </h1>
	<hr />
    <div id="page_home" style="margin: 0px auto; text-align:center;">
    </div>
    </div>
    </td>
<?php
require_once("resources/inc/footer.php");
?>