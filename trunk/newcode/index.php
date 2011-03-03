<?php

require_once "header.php";

if(is_array($userInfo['studySession'])) { // Study session in progress, show the checked in page!

?>

<script language="JavaScript" type="text/javascript">
<!--

var checkedIn = true;

//-->
</script>


<div class="pageShell">

  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Your Study Session...</div>
    <div class="viewPadding">
      <?php
        //Array ( [id] => 6 [start_time] => 1299133730 [end_time] => 0 [location_id] => 1 [user_id] => 1 [course_id] => 2 [rating] => 5 )
        
        $sessionLength = time() - $userInfo['studySession']['start_time'];
        $hours = ($sessionLength - $sessionLength % 3600) / 3600;
        if($hours < 10) $hours = "0{$hours}";
        $minutes = (($sessionLength % 3600) - (($sessionLength % 3600) % 60)) / 60;
        if($minutes < 10) $minutes = "0{$minutes}";
        
        print "<p>You've been studying at <b>{$userInfo['studySession']['location_name']}</b> for...</p>";
        print "<p align='center'><b>{$hours}:{$minutes}</b></p>"; 
        
      ?>
      
      <form method="post" action="end-study-session.php">
        <p align="center"><input type="submit" value="Check Out" /></p>
      </form>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Update course you're working on...</div>
    <div class="viewPadding" id="classList">
      <?php
      foreach($userInfo['courses'] as $id => $info) {
        if($userInfo['studySession']['course_id'] == $id) {
          print '<div class="selectableBox selectCourse selectableBoxHighlighted" rel="' . $id . '">' . $info['name'] . '</div>';
        } else {
          print '<div class="selectableBox selectCourse" rel="' . $id . '">' . $info['name'] . '</div>';
        }
      }
      ?>
      <input type="hidden" name="checkin-course" id="checkin-course" value="0" />
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Update how busy it is...</div>
    <div class="viewPadding">
      <?php
      for($x = 1; $x <= 5; $x++) {
        if($userInfo['studySession']['rating'] >= $x) {
          print '<div class="ratingBox ratingBoxSelected" id="' . $x . '"></div>';
        } else {
          print '<div class="ratingBox" id="' . $x . '"></div>';
        }
      }
      
      ?>
      <input type="hidden" name="checkin-rating" id="checkin-rating" value="3" />
      <div class="clearerDiv"></div>
    </div>
  </div>

</div>

<?

} else { // No study session, show ability to check in to favorites

?>

<div class="pageShell">
  
  <form method="post" action="checkin-exec.php">
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Where are you studying?</div>
    <div class="viewPadding">
      <?php
      $count = 0;
      foreach($locationData as $id => $info) {
        print '<div class="selectableBox selectPlace" rel="' . $id . '">' . $info['name'] . '</div>';
        $count++;
        if($count == 3) break;
      }
      
      ?>
      <div class="clearerDiv"></div>
      <input type="hidden" name="checkin-place" id="checkin-place" value="0" />
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />What class are you working on?</div>
    <div class="viewPadding" id="classList">
      <div class="selectableBox selectCourse" rel="1">CS 247</div>
      <div class="selectableBox selectCourse" rel="2">CS 109</div>
      <div class="selectableBox selectCourse" rel="3">CS 142</div>
      <input type="hidden" name="checkin-course" id="checkin-course" value="0" />
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />How loud is it right now?</div>
    <div class="viewPadding">
      <div class="ratingBox ratingBoxSelected" id="1"></div>
      <div class="ratingBox ratingBoxSelected" id="2"></div>
      <div class="ratingBox ratingBoxSelected" id="3"></div>
      <div class="ratingBox" id="4"></div>
      <div class="ratingBox" id="5"></div>
      <input type="hidden" name="checkin-rating" id="checkin-rating" value="3" />
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <p align="center"><input type="submit" value="Check In!" /></p>
  
  </form>
  
</div>

<?php

}

require_once "footer.php";

?>