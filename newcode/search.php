<?php

require_once "header.php";

$inSearch = false;
if(strlen($_GET['q'])) { // Make a location based query
  $q = mysql_real_escape_string($_GET['q']);
  $sql = "SELECT * FROM cs247.Location WHERE location_name LIKE '%{$q}%' OR location_description LIKE '%{$q}%' ORDER BY location_name ASC";
  $resultsTitle = "Results";
} elseif($_GET['course'] > 0) { // Make a course based query
  $courseID = (int) $_GET['course'];
  $sql = "SELECT l.* FROM cs247.Location AS l, cs247.StudySession AS s WHERE l.id = s.location_id AND s.end_time = 0 AND s.course_id = '{$courseID}' ORDER BY location_name ASC";
  $resultsTitle = "Results";
} elseif($_GET['nearby'] == 1) {
  $sql = findNearbyLocations(37.424498,-122.170223);
  $resultsTitle = "Nearby Locations";
} else { // Else, show all places
  $sql = "SELECT * FROM cs247.Location ORDER BY location_name ASC";
  $resultsTitle = "All Locations";
}

$result = @mysql_query($sql);
$numResults = mysql_num_rows($result);

?>

<script language="JavaScript" type="text/javascript">
<!--

function showSearchForm(show, hide) {
  $("#" + show).show();
  $("#" + hide).hide();
  $("#searchSelector span").toggleClass('searchSelected');
}

//-->
</script>


<div class="pageShell">
  <p id="searchSelector">Search by
    <span id="searchLocationForm-button" class="searchLeft<?php if(!($courseID > 0)) print ' searchSelected'; ?>" onclick="showSearchForm('searchLocationForm', 'searchClassForm')">Location</span><span id="searchClassForm-button" class="searchRight<?php if($courseID > 0) print ' searchSelected'; ?>" onclick="showSearchForm('searchClassForm', 'searchLocationForm')">Courses</span>
  </p>
  
  <div id="searchLocationForm"<?php if($courseID > 0) print ' style="display:none;"'; ?>>
    <form method="get" action="search.php">
      <p id="searchBar">
      <input type="text" name="q" value="<?php print htmlspecialchars($q); ?>" />
      <input type="submit" value="Go" />
      </p>
    </form>
  </div>
  
  <div id="searchClassForm"<?php if(!($courseID > 0)) print ' style="display:none;"'; ?>>
    <form method="get" action="search.php">
      <p id="searchBar">
      <select name="course">
        <?php
          foreach($userInfo['courses'] as $id => $course) {
            if($courseID == $id) {
              print '<option value="' . $id . '" selected>' . $course['name'] . '</option>';
            } else {
              print '<option value="' . $id . '">' . $course['name'] . '</option>';
            }
          }
        ?>
      </select>
      <input type="submit" value="Go" />
      </p>
    </form>
  </div>

  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" /><?php print $resultsTitle; ?> (<?php print $numResults; ?>)</div>
    <?php
      if($numResults == 0) {
        print '<p align="center" class="notice">No locations found!<br />Try searching again.</p>';
      }
    ?>
    <table class="clickableTable">
      <?php
        $count = 0;
        while($data = mysql_fetch_assoc($result)) {
          $count++;
          print '<tr>';
          print '<td';
          if($count == $numResults) print ' class="lastClickableCell"';
          print ' onclick="window.location=\'locationprofile.php?id=' . $data['id'] . '&course=' . htmlspecialchars($courseID) . '\'">';
          if($data['location_food'] == 1) print '<div style="margin-right:20px; background: url(\'foodicon.png\') no-repeat right top;">';
          print "<b>{$data['location_name']}</b>";
          if($data['location_opens_at'] != "00:00:00" || $data['location_closes_at'] != "00:00:00") {
            if($data['location_opens_at'] == $data['location_closes_at']) {
              print "<br />&nbsp;&nbsp;<span style='font-size:80%;'>Open 24 hours</span>";
            } else {
              print "<br />&nbsp;&nbsp;<span style='font-size:80%;'>Open from " . formatLocationHours($data['location_opens_at']) . " - " . formatLocationHours($data['location_closes_at']) . '</span>';
            }
          }
          
          if($courseID > 0) { // Course based search
            $sql = "SELECT id FROM cs247.StudySession WHERE location_id = '{$data['id']}' AND course_id = '{$courseID}' AND end_time = 0";
          } else { // Location based search
            $sql = "SELECT id FROM cs247.StudySession WHERE location_id = '{$data['id']}' AND end_time = 0";
          }
          $numPeople = mysql_num_rows(@mysql_query($sql));
          if($numPeople > 0) {
            print '<br />&nbsp;&nbsp;<span style="font-size:80%;">Currently <b>' . $numPeople . ' ' . (($numPeople > 1) ? "people" : "person") . '</b> ';
            if($courseID > 0) {
              print 'studying <b>' . $userInfo['courses'][$courseID]['name'] . '</b>.';
            } else {
              print 'checked in.';
            }
            print '</span>';
          }
          
          if($data['location_food'] == 1) print '</div>'; // end food div
          
          print '</td>';
          print '</tr>';
        }
      ?>
    </table>
  </div>
</div>

<?php

require_once "footer.php";

?>