<?php

ob_start();

require_once "dbconnect.php";

require_once "user_info.php";

if($_GET['newcourse'] > 0) { // Update the course they're working on
  
  $course = (int) $_GET['newcourse'];
    
  $sql = "UPDATE cs247.StudySession SET course_id = '{$course}' WHERE user_id = '{$userInfo['id']}' AND end_time = 0";
  $result = @mysql_query($sql);
  
  if(mysql_affected_rows() > 0) { // Study session successfully initiated!
    header("Location: index.php");
    // Redirect user to the homepage, which will now dynamically show the checked in session
  } else {
    // Error
    print "Error!" . mysql_error();
  }
  
} elseif($_GET['newrating'] > 0) { // Update the course they're working on
  
  $rating = (int) $_GET['newrating'];
    
  $sql = "UPDATE cs247.StudySession SET rating = '{$rating}' WHERE user_id = '{$userInfo['id']}' AND end_time = 0";
  $result = @mysql_query($sql);
  
  if(mysql_affected_rows() > 0) { // Study session successfully initiated!
    header("Location: index.php");
    // Redirect user to the homepage, which will now dynamically show the checked in session
  } else {
    // Error
    print "Error!" . mysql_error();
  }
  
} else {
  header("Location:index.php");
}

ob_end_flush();

?>