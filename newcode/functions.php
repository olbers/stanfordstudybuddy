<?php

$loudnessRating = array(
  1 => 'Very Quiet',
  2 => 'Quiet',
  3 => 'Moderate',
  4 => 'Loud',
  5 => 'Very Loud',
);

function findNearbyLocations($longitude, $latitude) {
  $sql = "SELECT * FROM cs247.Location WHERE (location_latitude < ({$latitude} + 0.001372)) AND (location_latitude > ({$latitude} - 0.001372)) AND (location_longitude < ({$longitude} + 0.001372)) AND (location_longitude > ({$longitude} - 0.001372))";
  return $sql;
}

function formatStudyLengthTime($sessionLength) {
  $hours = ($sessionLength - $sessionLength % 3600) / 3600;
  $minutes = (($sessionLength % 3600) - (($sessionLength % 3600) % 60)) / 60;
  $finalString = "{$minutes} " . (($minutes == 1) ? "minute" : "minutes");
  if($hours > 0) $finalString = "{$hours} " . (($hours == 1) ? "hour" : "hours") . ", {$finalString}";
  return $finalString;
}

function formatLocationHours($time) {
  $time = explode(":", $time);
  $hour = (int) $time[0];
  if($hour > 12) {
    $hour -= 12; // Takes care of 24-hour time
    return "{$hour}:{$time[1]} pm";
  } else {
    if($hour == 0) {
      return "Midnight";
    } else {
      return "{$hour}:{$time[1]} am";
    }
  }
}

function lastSeenTime($time = 0) {
  return date('F jS', $time);
}

function calculateAvgLoudness($locationID) {
  $id = (int) $locationID;
  $sql = "SELECT rating FROM cs247.StudySession WHERE location_id = '{$id}' AND end_time = 0";
  $result = @mysql_query($sql);
  $numRatings = 0;
  $sumRatings = 0;
  while($data = mysql_fetch_assoc($result)) {
    $numRatings++;
    $sumRatings += $data['rating'];
  }
  return ($numRatings == 0) ? 0 : round($sumRatings/$numRatings);
}

function print_error($text) {
  print '<div id="curvyShell"><div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Error!</div><div class="viewPadding"><p>' . $text . '</p><p align="center"><input type="button" value="Back" onclick="history.go(-1);" /></p></div></div>';
}

?>