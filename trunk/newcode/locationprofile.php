<?php

require_once "header.php";

$locationID = (int) $_GET['id'];
$sql = "SELECT * FROM cs247.Location WHERE id = '{$locationID}' LIMIT 1";
$result = @mysql_query($sql);
$locData = @mysql_fetch_assoc($result);

if(strlen($locData['location_name'])) { // Location exists

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" /><?php print $locData['location_name']; ?></div>
    <div class="viewPadding">
      <p>
      <?php
        if(file_exists("locations/{$locationID}.png")) print '<img src="locations/' . $locationID . '.png" class="locationProfilePic" />';
        $currentNoiseRating = calculateAvgLoudness($locationID);
        print "<b>Noise Rating:</b><br />&nbsp;&nbsp;" . (($currentNoiseRating > 0) ? $loudnessRating[$currentNoiseRating] : "No data");
        if($locData['location_opens_at'] != "00:00:00" || $locData['location_closes_at'] != "00:00:00") {
          print "<br /><br /><b>Hours:</b><br />&nbsp;&nbsp;";
          if($locData['location_opens_at'] == $locData['location_closes_at']) {
            print "Open 24 hours";
          } else {
            print formatLocationHours($locData['location_opens_at']) . " - " . formatLocationHours($locData['location_closes_at']);
          }
        } // end hours
        if($locData['location_food'] == 1) {
          print '<br /><br /><b>Food:</b> Available!';
        }
        if(strlen($locData['location_description'])) print '<br /><br />' . htmlspecialchars($locData['location_description']);
      ?>
      </p>
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <p align="center"><input type="button" onclick="history.go(-1)" value="&laquo; Results" /></p>
  
  <?php
    $sql = "SELECT c.course_number, u.first_name, u.last_name FROM cs247.StudySession AS s, cs247.Course AS c, cs247.User AS u WHERE s.location_id = '{$locationID}' AND s.end_time = 0 AND s.course_id = c.id AND s.user_id = u.id ORDER BY s.start_time ASC";
    $result = @mysql_query($sql);
    $numPeople = mysql_num_rows($result);
    
    if($numPeople > 0) {
  ?>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Other People Here (<?php print $numPeople; ?>)</div>
    <table class="formattedTable">
      <?php
        $count = 0;
        while($data = mysql_fetch_assoc($result)) {
          $count++;
          print '<tr>';
          print '<td';
          if($count > 5) {
            print ' class="hiddenPerson';
            if($count == $numPeople) print ' lastClickableCell';
            print '"';
          } elseif($numPeople < 5 && $count == $numPeople) {
            print ' class="lastClickableCell"';
          }
          print '><b>' . $data['first_name'] . ' ' . $data['last_name'] . '</b> is studying <b>' . $data['course_number'] . '</b>.</td>';
          print '</tr>';
        }
      ?>
    </table>
    <?php
      if($numPeople > 5) print '<p align="center" id="showMorePeopleButton"><input type="button" value="Show More" onclick="showMorePeople()"></p>';
    ?>
  </div>
  
  <?php } // end show people ?>
  
  <?php if(!is_array($userInfo['studySession'])) { // We only want to allow them to check-in somewhere if a session isn't already going ?>
  
  <form method="post" action="checkin-exec.php">
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Quick Check-In</div>
    
    <input type="hidden" name="checkin-place" id="checkin-place" value="<?php print $locationID; ?>" />
    
    <table id="classList" cellspacing="6">
      <?php
        $count = 0;
        foreach($userInfo['courses'] as $id => $info) {
          if($count % 3 == 0) print '<tr>';
          print '<td class="selectableBox selectCourse" rel="' . $id . '">' . $info['name'] . '</td>';
          if($count % 3 == 2) print '</tr>';
          $count++;
        }
      ?>
    </table>
    <input type="hidden" name="checkin-course" id="checkin-course" value="0" />
    
    <div class="viewPadding">
      <div class="ratingBox ratingBoxSelected" id="1"></div>
      <div class="ratingBox ratingBoxSelected" id="2"></div>
      <div class="ratingBox ratingBoxSelected" id="3"></div>
      <div class="ratingBox" id="4"></div>
      <div class="ratingBox" id="5"></div>
      <input type="hidden" name="checkin-rating" id="checkin-rating" value="3" />
      <div class="clearerDiv"></div>
    </div>
    
    <p align="center"><input type="submit" value="Check In!" /></p>
    
  </div>  
  
  </form>
  
  <?php } else { // Tell them they are checked in ?>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Quick Check-In</div>

    <div class="viewPadding">
      <!--<p align="center">You're already checked in to <b><?php print $userInfo['studySession']['location_name']; ?></b>. Would you like to check out?</p>-->
      <p align="center">You're already studying somewhere else! End your other session before checking in here.</p>
    </div>
    
  </div> 
  
  <?php } ?>
  
</div>

<?php

} else { // Location Does not exist
  print '<div class="pageShell">';
  print_error("Oops! We could not find that location in our records. Please go back and try again.");
  print '</div>';
}

require_once "footer.php";

?>