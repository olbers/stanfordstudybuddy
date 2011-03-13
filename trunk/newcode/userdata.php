<?php

require_once "header.php";

$beginningWeek = 1; // according to date('W') of Jan 2nd

?>

<div class="pageShell">
  <p id="studyDataSelector">Show data by
    <span class="studyDataLeft studyDataSelected" onclick="showStudyData('studyDataWeek')" id="studyDataWeek-button">Week</span><!--<span class="studyDataMid" onclick="showStudyData('studyDataMonth')" id="studyDataMonth-button">Month</span>--><span class="studyDataRight" onclick="showStudyData('studyDataCourse')" id="studyDataCourse-button">Course</span>
  </p>
  
  <div class="curvyShell" id="studyDataWeek-data">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Hours Studied Per Week</div>
    <?php
    
    $yValues = "";
    $totalHours = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 'total' => 0);
    
    $sql = "SELECT start_time, end_time FROM cs247.StudySession WHERE user_id = '{$userInfo['id']}' AND end_time > 0 ORDER BY start_time ASC";
    $result = @mysql_query($sql);
    
    // Sort each session into a week bucket in $totalHours
    while($session = mysql_fetch_assoc($result)) {
      //print date('M j', $session['start_time']) . ' => ' . date('W', $session['start_time']) . '<br>';
      $weekNum = (int) date('W', $session['start_time']);
      $numHours = round(($session['end_time'] - $session['start_time']) / 3600, 1);
      $totalHours[$weekNum] += $numHours;
    }
    
    $yValues = "";
    for($x = 1; $x <= 10; $x++) {
      $yValues .= ($totalHours[$x]) ? "{$totalHours[$x]}," : "0,";
      $totalHours['total'] += $totalHours[$x];
    }
    $yValues = substr($yValues, 0, -1);
    
    ?>
      <p align="center"><img src="http://chart.apis.google.com/chart?chxl=0:|1|2|3|4|5|6|7|8|9|10|1:||50|100&chxr=1,10,100&chxt=x,y&chs=275x180&cht=lc&chco=90032D,0000FF,FF9900,00FF00,D400FF&chds=0,100&chd=t:<?php print $yValues; ?>&chg=25,50,5,4&chls=1.5&chtt=Total Hours Per Week" width="275" height="180" alt="" /></p>
      <p align="center"><b>Quarter Totals</b></p>
      
      <table class="formattedTable" style="border-top:1px solid black;">
      <?php
        for($x = 1; $x <= 10; $x++) {
          print '<tr>';
          print '<td width="50%" align="right"><b>Week ' . $x . ':</b></td>';
          print '<td width="50%">' . $totalHours[$x] . ' hrs</td>';
          print '</tr>';
        }
      ?>
      <tr><td class="lastClickableCell" width="50%" align="right"><b>Total:</b></td><td class="lastClickableCell"><?php print $totalHours['total']; ?> hrs</td></tr>
      </table>
  </div>
  
  <!--
  <div class="curvyShell" id="studyDataMonth-data" style="display:none;">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Month By Month</div>
    
  </div>
  -->
  
  <div class="curvyShell" id="studyDataCourse-data" style="display:none;">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Hours Studied Per Course</div>
    <?php
    
    $yValues = "";
    $legends = "";
    $totalHours = array('total' => 0);
    foreach($userInfo['courses'] as $id => $course) {
      $sql = "SELECT start_time, end_time FROM cs247.StudySession WHERE course_id = '{$course['id']}' AND user_id = '{$userInfo['id']}' AND end_time > 0 ORDER BY start_time ASC";
      $result = @mysql_query($sql);
      $studyHours = array();
      while($s = mysql_fetch_assoc($result)) {
        $numSeconds = $s['end_time'] - $s['start_time'];
        $numHours = round($numSeconds/3600, 1);
        $weekNumber = (int) date('W', $s['start_time']);
        $studyHours[] += $numHours;
        $totalHours[$course['id']] += $numHours;
        $totalHours['total'] += $numHours;
      }
      
      for($d = 1; $d <= 10; $d++) {
        $yValues .= ($studyHours[$d]) ? "{$studyHours[$d]}," : "0,";
      }
      $yValues = substr($yValues, 0, -1) . "|";
      $legends .= $course['name'] . "|";
      
    } // end course loop
    
    $yValues = substr($yValues, 0, -1);
    $legends = substr($legends, 0, -1);
    ?>
      <p align="center"><img src="http://chart.apis.google.com/chart?chxl=0:|1|2|3|4|5|6|7|8|9|10|1:||9|18&chxr=1,10,100&chxt=x,y&chs=275x180&cht=lc&chco=90032D,0000FF,FF9900,00FF00,D400FF&chds=0,18&chdl=<?php print $legends; ?>&chd=t:<?php print $yValues; ?>&chg=25,50,5,4&chls=1.5&chtt=Hours Per Week" width="275" height="180" alt="" /></p>
      <p align="center"><b>Quarter Totals</b></p>
      
      <table class="formattedTable" style="border-top:1px solid black;">
      <?php
        foreach($totalHours as $classID => $hours) {
          if($classID != "total") {
            print '<tr>';
            print '<td width="50%" align="right"><b>' . $userInfo['courses'][$classID]['name'] . ':</b></td>';
            print '<td width="50%">' . $hours . ' hrs</td>';
            print '</tr>';
          }
        }
      ?>
      <tr><td class="lastClickableCell" width="50%" align="right"><b>Total:</b></td><td class="lastClickableCell"><?php print $totalHours['total']; ?> hrs</td></tr>
      </table    
  </div>
</div>

<?php

require_once "footer.php";

?>