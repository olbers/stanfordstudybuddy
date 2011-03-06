<?php

/* Course Assigner */
/* Assigns courses to people. */

require_once "../dbconnect.php";

if($_GET['deleteAll'] == 1) {

  $sql = "DELETE FROM cs247.User_Course";
  @mysql_query($sql);
  
  print mysql_error();

  $sql = "SELECT * FROM cs247.User ORDER BY last_name ASC, first_name ASC";
  $result = @mysql_query($sql);
  
  print mysql_error();
  
  while($data = mysql_fetch_assoc($result)) {
    $userID = $data['id'];
    $rand = rand(3,5);
    $sql = "SELECT * FROM cs247.Course ORDER BY RAND() LIMIT {$rand}";
    $cresult = @mysql_query($sql);
    while($cdata = mysql_fetch_assoc($cresult)) {
      $csql = "INSERT INTO cs247.User_Course (user_id, course_id) VALUES ($userID, {$cdata['id']})";
      @mysql_query($csql);
    }
  }
  
  print "Done!";

} else {
  print '<form method="get" action="course_assigner.php"><input type="hidden" name="deleteAll" value="1"><input type="submit" value="Do you want to empty the user-course table and completely reassign courses in a random fashion?"></form>';
}


?>