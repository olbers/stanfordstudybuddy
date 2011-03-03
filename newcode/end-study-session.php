<?php

ob_start();

require_once "dbconnect.php";

require_once "user_info.php";
    
$sql = "UPDATE cs247.StudySession SET end_time = '" . time() . "' WHERE user_id = '{$userInfo['id']}' AND end_time = 0";
$result = @mysql_query($sql);
  
if(mysql_affected_rows() > 0) { // Study session successfully initiated!
  header("Location: index.php");
} else {
  // Error
  print "Error!" . mysql_error();
}

ob_end_flush();

?>