<?php

require_once "dbconnect.php";

$locationData = array();
$sql = "SELECT * FROM cs247.Location";
$result = @mysql_query($sql);
while($data = mysql_fetch_assoc($result)) {
  $locationData[$data['id']] = array('name' => $data['location_name']);
}

require_once "user_info.php";


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>StudyBuddy</title>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />

<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="scripts.js" type="text/javascript"></script>
<script src="cufon-yui.js" type="text/javascript"></script>
<script src="grobold.fonts.js" type="text/javascript"></script>
<script type="text/javascript">
  Cufon.replace('#headerText span, .curvyHeading, .notice', { fontFamily: 'GROBOLD' }); 
</script>

</head>
<body>

<div id="headerText">
  <!--<div id="headerBack"><a href="javascript:goHomeView()">&laquo; Home</a></div>-->
  <span>StudyBuddy</span>
</div>