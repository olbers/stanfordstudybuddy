<?php

require_once "header.php";

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" /><?php print $userInfo['first_name'] . ' ' . $userInfo['last_name']; ?>'s Profile</div>
    <div class="viewPadding">
      <p><img src="userpic.png" class="userPic" />
      <?php
        if(count($userInfo['lastSeen'])) {
          print '<b>Last Seen:</b><br />' . $userInfo['lastSeen']['location_name'] . ', ' . lastSeenTime($userInfo['lastSeen']['end_time']);
        } else {
          print 'You haven\'t logged any study sessions yet... get going!';
        }
      ?>
      </p>
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Past 7 Days Study Data</div>
    <div class="viewPadding">
    <?php
      $xRange = "";
      for($x = 6; $x >= 0; $x--) {
        $xRange .= date('n/j', strtotime("-{$x} days")) . "|";
      }
      $xRange = substr($xRange, 0, -1);
      
      $sql = "SELECT start_time, end_time FROM cs247.StudySession WHERE start_time >= '" . strtotime("-6 days") . "' AND end_time <= '" . time() . "' AND user_id = '{$userInfo['id']}' AND end_time > 0 ORDER BY start_time ASC";
      $firstDay = date('z', strtotime("-6 days"));
      $result = @mysql_query($sql);
      $totalHours = 0;
      $studyHours = array();
      while($s = mysql_fetch_assoc($result)) {
        $numSeconds = $s['end_time'] - $s['start_time'];
        $numHours = $numSeconds/3600;
        $studyHours[date('z', $s['start_time'])] += $numHours;
        $totalHours += $numHours;
      }
      
      $yValues = "";
      for($d = $firstDay; $d <= $firstDay + 6; $d++) {
        $yValues .= ($studyHours[$d]) ? "{$studyHours[$d]}," : "0,";
      }
      $yValues = substr($yValues, 0, -1);
    ?>
      <p align="center"><img src="http://chart.apis.google.com/chart?chxl=0:|<?php print $xRange; ?>|1:||6|12&chxr=1,10,100&chxt=x,y&chs=275x180&cht=lc&chco=90032D&chds=0,12&chd=t:<?php print $yValues; ?>&chg=25,50,5,4&chls=1.5&chm=o,AA0033,0,-1,8|b,3399CC44,0,0,0" width="275" height="180" alt="" /><br /><b>Total = <?php print round($totalHours, 1); ?> hrs.</b></p>

      <p align="center"><input type="button" value="See More Data" onclick="window.location='userdata.php'" /></p>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />My Classes</div>
    <table class="deleteableTable">
      <?php
        foreach($userInfo['courses'] as $course) {
          print '<tr>';
          print '<td onclick="window.location=\'deleteclass.php?courseID=' . $course['id'] . '\'">' . $course['name'] . '</td>';
          print '</tr>';
        }
      ?>
    </table>
    <p align="center"><input type="button" value="Add Class" onclick="window.location='addclass.php';" /></p>
  </div>
  
  <p align="center">
    <input type="button" value="Logout" onclick="window.location='logout.php'" />
  </p>
  
</div>

<!--
<p align="center"><a href="swap_user.php">Dev: Swap User</a></p>
-->

<?php

require_once "footer.php";

?>