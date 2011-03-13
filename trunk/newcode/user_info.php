<?php

/*
if($_GET['browser'] == "android") { // In native app
  $userInfo = array('id' => $_GET['login_id']);
} else
*/

if($_COOKIE['userid'] > 0) {
  $userInfo = array('id' => (int) $_COOKIE['userid']);
} else { // Not logged in... send to login!
  $filePath = explode("/", $_SERVER['PHP_SELF']);
  $fileName = $filePath[count($filePath)-1];
  if($fileName != "login.php") header("Location: login.php");
}

if($_GET['get'] == 1) print_r($_GET);

// Get user name & info
$sql = "SELECT * FROM cs247.User WHERE id = '{$userInfo['id']}' LIMIT 1";
$result = @mysql_query($sql);
if(mysql_num_rows($result) > 0) {
  $userInfo = array_merge($userInfo, mysql_fetch_assoc($result));
}

// Deal with user location; default values are -1 (location can't be accessed)
if(isset($_GET['longitude']) && $_GET['longitude'] != -1 && isset($_GET['latitude']) && $_GET['latitude'] != -1) { // Location is being passed in via the app
  //print "Updating Location";
  $userInfo['user_longitude'] = round($_GET['latitude'], 6); // Anant has them reversed in the native APK
  $userInfo['user_latitude'] = round($_GET['longitude'], 6); // This is a fix for that
  $sql = "UPDATE cs247.User SET user_longitude = '{$userInfo['user_longitude']}', user_latitude = '{$userInfo['user_latitude']}' WHERE id = '{$userInfo['id']}' LIMIT 1";
  @mysql_query($sql);
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