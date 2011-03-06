<?php

require_once "header.php";

$inSearch = false;
if(strlen($_GET['q'])) { // Make a query
  $q = mysql_real_escape_string($_GET['q']);
  $sql = "SELECT * FROM cs247.Location WHERE location_name LIKE '%{$q}%' OR location_description LIKE '%{$q}%' ORDER BY location_name ASC";
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

<div class="pageShell">
  <form method="get" action="search.php">
    <p id="searchBar">
    <input type="text" name="q" value="<?php print htmlspecialchars($_GET['q']); ?>" />
    <input type="submit" value="Go" />
    </p>
  </form>

  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" /><?php print $resultsTitle; ?> (<?php print $numResults; ?>)</div>
    <table class="clickableTable">
      <?php
        $count = 0;
        while($data = mysql_fetch_assoc($result)) {
          $count++;
          print '<tr>';
          print '<td';
          if($count == $numResults) print ' class="lastClickableCell"';
          print ' onclick="window.location=\'locationprofile.php?id=' . $data['id'] . '\'">';
          if($data['location_food'] == 1) print '<div style="margin-right:20px; background: url(\'foodicon.png\') no-repeat right center;">';
          print "<b>{$data['location_name']}</b>";
          if($data['location_opens_at'] != "00:00:00" || $data['location_closes_at'] != "00:00:00") {
            if($data['location_opens_at'] == $data['location_closes_at']) {
              print "<br />&nbsp;&nbsp;<span style='font-size:80%;'>Open 24 hours</span>";
            } else {
              print "<br />&nbsp;&nbsp;<span style='font-size:80%;'>Open from " . formatLocationHours($data['location_opens_at']) . " - " . formatLocationHours($data['location_closes_at']) . '</span>';
            }
          }
          
          $sql = "SELECT id FROM cs247.StudySession WHERE location_id = '{$data['id']}' AND end_time = 0";
          $numPeople = mysql_num_rows(@mysql_query($sql));
          if($numPeople > 0) {
            print '<br />&nbsp;&nbsp;<span style="font-size:80%;">Currently <b>' . $numPeople . ' ' . (($numPeople > 1) ? "people" : "person") . '</b> checked in.</span>';
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