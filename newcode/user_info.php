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

// Last seen information
$sql = "SELECT * FROM cs247.StudySession WHERE user_id = '{$userInfo['id']}' AND end_time > 0 ORDER BY end_time DESC LIMIT 1";
$result = @mysql_query($sql);
if(mysql_num_rows($result)) { // They are in a study session
  $userInfo['lastSeen'] = mysql_fetch_assoc($result);
  $sql = "SELECT location_name FROM cs247.Location WHERE id = '{$userInfo['lastSeen']['location_id']}' LIMIT 1";
  $result = mysql_fetch_assoc(@mysql_query($sql));
  $userInfo['lastSeen']['location_name'] = $result['location_name'];
}

// Get user course info
$sql = "SELECT c.* FROM cs247.Course AS c, cs247.User_Course AS u WHERE u.user_id = '{$userInfo['id']}' AND u.course_id = c.id ORDER BY c.course_number ASC";
$result = @mysql_query($sql);
if(mysql_num_rows($result)) { // Courses have been added
  $userInfo['courses'] = array();
  while($data = mysql_fetch_assoc($result)) {
    $userInfo['courses'][$data['id']] = array('name' => $data['course_number'], 'id' => $data['id']);
  }
} else {
  $userInfo['courses'] = array();
}

?>