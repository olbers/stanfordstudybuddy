<?php

/* Study Session Assigner */
/* Generates study sessions */

require_once "../dbconnect.php";

if($_GET['go'] == 1) {
  
  // Close all other sessions
  $sql = "SELECT * FROM cs247.StudySession WHERE end_time = 0";
  $result = @mysql_query($sql);
  while($data = mysql_fetch_assoc($result)) {
    $hours = rand(1,5); // between 1-5 hours
    if(rand(1,3) == 1) $hours -= 0.5; // randomly subtract half an hour
    $end_time = $data['start_time'] + ($hours * 3600);
    $sql2 = "UPDATE cs247.StudySession SET end_time = '{$end_time}' WHERE id = '{$data['id']}' LIMIT 1";
    @mysql_query($sql2);
  }
  
  
  // Now, start generating new ones
  $sql = "SELECT id FROM cs247.User";
  $totalPeople = mysql_num_rows(@mysql_query($sql));
  
  $generateFor = rand($totalPeople - round($totalPeople/3), $totalPeople);
  
  print '<p>Generating for ' . $generateFor . ' random people.</p>';
  
  $sql = "SELECT * FROM cs247.User ORDER BY RAND() LIMIT {$generateFor}";
  $result = @mysql_query($sql);
  
  while($data = mysql_fetch_assoc($result)) {
    
    $locSql = "SELECT id FROM cs247.Location ORDER BY RAND() LIMIT 1";
    $locData = mysql_fetch_assoc(@mysql_query($locSql));
    
    $courseSql = "SELECT course_id FROM cs247.User_Course WHERE user_id = '{$data['id']}' ORDER BY RAND() LIMIT 1";
    $courseData = mysql_fetch_assoc(@mysql_query($courseSql));
    
    $start_time = time();
    $locationID = $locData['id'];
    $courseID = $courseData['course_id'];
    $rating = rand(1,5);
    
    $sql3 = "INSERT INTO cs247.StudySession (start_time, location_id, user_id, course_id, rating) VALUES('{$start_time}', '{$locationID}', '{$data['id']}', '{$courseID}', '{$rating}')";
    @mysql_query($sql3);

  }


} else {
  print '<p>This script closes all currently open study sessions (assigning them a random end time) and then randomly generates new ones for a random subset of users. Would you like to continue?</p>';

  print '<input type="button" value="Yes, close all and generate anew!" onclick="window.location=\'generate_studysessions.php?go=1\'">';
}

?>