<?php

ob_start();

require_once "dbconnect.php";

require_once "user_info.php";

if($_POST['checkin-place'] > 0 && strlen($_POST['checkin-course']) && $_POST['checkin-rating'] > 0) { // Process a checkin
  
  $locationID = (int) $_POST['checkin-place'];
  $course = (int) $_POST['checkin-course'];
  $rating = (int) $_POST['checkin-rating'];
  
  $sql = "INSERT INTO cs247.StudySession (start_time, location_id, course_id, rating, user_id) VALUES ('" . time() . "', '{$locationID}', '{$course}', '{$rating}', '{$userInfo['id']}')";
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