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
        
        $sessionLength = time() - $userInfo['studySession']['start_time'];
        print "<p>You've been studying at <b>{$userInfo['studySession']['location_name']}</b> for...</p>";
        print "<p align='center'><b>" . formatStudyLengthTime($sessionLength) . "</b></p>"; 
        
      ?>
      
      <form method="post" action="end-study-session.php">
        <p align="center"><input type="submit" value="Check Out" /></p>
      </form>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Update course you're working on...</div>
    <table id="classList" cellspacing="6">
      <?php
        $count = 0;
        foreach($userInfo['courses'] as $id => $info) {
          if($count % 3 == 0) print '<tr>';
          if($userInfo['studySession']['course_id'] == $id) {
            print '<td class="selectableBox selectCourse selectableBoxHighlighted" rel="' . $id . '">' . $info['name'] . '</td>';
          } else {
            print '<td class="selectableBox selectCourse" rel="' . $id . '">' . $info['name'] . '</td>';
          }
          
          
          if($count % 3 == 2) print '</tr>';
          $count++;
        }
      ?>
    </table>
    <input type="hidden" name="checkin-course" id="checkin-course" value="0" />
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

<script language="JavaScript" type="text/javascript">
<!--
  setTimeout("location.reload(true)", 600000);
//-->
</script>


<?php

} else { // No study session, show ability to check in to favorites

?>

<div class="pageShell">
  
  <form method="post" action="checkin-exec.php">
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Where are you studying?</div>
    <table id="placeList" cellspacing="6">
      <?php
        $count = 0;
        foreach($locationData as $id => $info) {
          if($count % 3 == 0) print '<tr>';
          print '<td class="selectableBox selectPlace" rel="' . $id . '">' . $info['name'] . '</td>';
          if($count % 3 == 2) print '</tr>';
          $count++;
          if($count == 3) break;
        }
      ?>
    </table>
    <input type="hidden" name="checkin-place" id="checkin-place" value="0" />
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />What class are you working on?</div>
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