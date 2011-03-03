<?php

if($_GET['browser'] == "android") { // In native app
  $userInfo = array('id' => $_GET['login_id']);
} else { // Not in native app
  $userInfo = array('id' => 1);
}

// See if they have an active study session
$sql = "SELECT * FROM cs247.StudySession WHERE user_id = '{$userInfo['id']}' AND end_time = 0 LIMIT 1";
$result = @mysql_query($sql);
if(mysql_num_rows($result)) { // They are in a study session
  $userInfo['studySession'] = mysql_fetch_assoc($result);
  $sql = "SELECT location_name FROM cs247.Location WHERE id = '{$userInfo['studySession']['location_id']}' LIMIT 1";
  $result = mysql_fetch_assoc(@mysql_query($sql));
  $userInfo['studySession']['location_name'] = $result['location_name'];
}

// Get user course info
$userInfo['courses'] = array(
  1 => array('name' => 'CS 247'),
  2 => array('name' => 'CS 109'),
  3 => array('name' => 'CS 142'),
);

?>