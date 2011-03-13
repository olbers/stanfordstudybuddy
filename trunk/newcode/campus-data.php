<?php

require_once "header.php";

?>

<script language="JavaScript" type="text/javascript">
<!--

var showClasses = new Array();
<?php
  $classesToShow = array();
  if(count($_GET['classes'])) {
    foreach($_GET['classes'] as $classID) {
      print 'showClasses[' . $classID . '] = ' . $classID . ';' . "\n";
      $classesToShow[$classID] = array('id' => $classID, 'name' => ''); 
    }
  } else {
    foreach($userInfo['courses'] as $id => $info) {
      print 'showClasses[' . $id . '] = ' . $id . ';' . "\n";
      $classesToShow[$id] = array('id' => $id, 'name' => '');
    }
  }
?>

//-->
</script>


<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Campus Wide Study Hours By Class</div>
    <p align="center">
    <select id="newClass">
      <?php
        $sql = "SELECT id, course_number FROM cs247.Course ORDER BY course_number ASC";
        $result = @mysql_query($sql);
        while($data = mysql_fetch_assoc($result)) {
          if(!is_array($userInfo['courses'][$data['id']])) print '<option value="' . $data['id'] . '">' . $data['course_number'] . '</option>';
        }
      ?>
    </select>
    <input type="button" value="Add" onclick="addClassData($('#newClass').val())" />
    </p>
    
    <?php if(count($classesToShow) > 5) { ?>
      <p align="center"><b style="color:red;">Only 5 courses are shown at a time.</b></p>
    <?php } ?>
    
    <?php
    
    $yValues = "";
    $legends = "";
    $totalHours = array();
    $classCount = 0;
    foreach($classesToShow as $classID => $courseInfo) {
      $classCount++; // # of classes we're looking for
      
      if($classCount <= 5) { // Only show 5 classes max
        $sql = "SELECT start_time, end_time, user_id FROM cs247.StudySession WHERE course_id = '{$classID}' AND end_time > 0 ORDER BY start_time ASC";
        $result = @mysql_query($sql);
        $studyHours = array(); // Will keep track of the number of hours studied for each course per week
        $studyPeople = array(); // Will keep track of the number of people that studied a course that week
        while($s = mysql_fetch_assoc($result)) {
          $numSeconds = $s['end_time'] - $s['start_time'];
          $numHours = round($numSeconds/3600, 2);
          $weekNumber = (int) date('W', $s['start_time']);
          $studyHours[$weekNumber] += $numHours;
          $studyPeople[$weekNumber][$s['user_id']] = 1;
        }
        
        // Build the data to feed to the graph
        for($d = 1; $d <= 10; $d++) {
          if(isset($studyHours[$d])) {
            $avg = round($studyHours[$d] / count($studyPeople[$d]), 1);
            $totalHours[$d] += $avg;
            $yValues .= "{$avg},";
          } else {
            $yValues .= "0,";
          }
        }
        $yValues = substr($yValues, 0, -1) . "|";
      
      } // end if(classes <= 5)
      
      // Grab class name
      $sql = "SELECT course_number FROM cs247.Course WHERE id = '{$classID}' LIMIT 1";
      $course = mysql_fetch_assoc(@mysql_query($sql));
      $classesToShow[$classID]['name'] = $course['course_number'];
      if($classCount <= 5) $legends .= $course['course_number'] . "|";
      
    } // end course loop
    
    // Now, add in the total hours data
    for($d = 1; $d <= 10; $d++) {
      if(isset($totalHours[$d])) {
        $yValues .= "{$totalHours[$d]},";
      } else {
        $yValues .= "0,";
      }
    }
    //print_r($totalHours);
    $classCount = ($classCount > 5) ? 5 : $classCount;
    $legends .= ($classCount == 2) ? "Both|" : "All {$classCount}|";
    
    // Do some trimming
    $yValues = substr($yValues, 0, -1);
    $legends = substr($legends, 0, -1);
    
    // Do the y-axis labeling & scaling
    switch($classCount) {
      case 1:
        $yAxis = "6|12|18|24";
        $scaling = "0,24";
        break;
      case 2:
        $yAxis = "6|12|18|24|30|36";
        $scaling = "0,36";
        break;
      case 3:
        $yAxis = "6|12|18|24|30|36|42|48";
        $scaling = "0,48";
        break;
      case 4:
        $yAxis = "6|12|18|24|30|36|42|48|54|60";
        $scaling = "0,60";
        break;
      case 5:
        $yAxis = "12|24|36|48|60|72";
        $scaling = "0,72";
        break;
      default:
        $yAxis = "6|12|18|24|30|36|42|48";
        $scaling = "0,48";
        break;
    }
    
    ?>
      <p align="center"><img src="http://chart.apis.google.com/chart?chxl=0:|1|2|3|4|5|6|7|8|9|10|1:||<?php print $yAxis; ?>&chxr=1,10,100&chxt=x,y&chs=275x300&cht=lc&chco=90032D,0000FF,FF9900,00FF00,D400FF,FF0000&chds=<?php print $scaling; ?>&chdl=<?php print $legends; ?>&chd=t:<?php print $yValues; ?>&chg=25,50,5,4&chls=1.5&chtt=Avg. Hours Per Week" width="275" height="300" alt="" /></p>

      <table class="deleteableTable" style="border-top:1px solid black;">
      <?php
        $count = 0;
        foreach($classesToShow as $id => $info) {
          $count++;
          print '<tr>';
          print '<td';
          //if($count == count($classesToShow)) print ' class="lastClickableCell"';
          print ' onclick="removeClassData(' . $info['id'] . ')">' . $info['name'] . '</td>';
          print '</tr>';
        }
      ?>
      </table>
      <p align="center"><input type="button" value="Reset Graph" onclick="window.location='campus-data.php'" /></p>
  </div>
</div>

<script language="JavaScript" type="text/javascript">
<!--

function removeClassData(id) {
  var url = "?";
  for(var i in showClasses) {
    if(showClasses[i] != id) url = url + "classes[]=" + showClasses[i] + "&";
  }
  window.location = 'campus-data.php' + url;
}

function addClassData(id) {
  var url = "?classes[]=" + id + "&";
  for(var i in showClasses) {
    if(showClasses[i] != id) url = url + "classes[]=" + showClasses[i] + "&";
  }
  window.location = 'campus-data.php' + url;
}

//-->
</script>


<?php

require_once "footer.php";

?>