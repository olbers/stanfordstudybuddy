<?php

ob_start();

require_once "header.php";

$courseID = (int) $_GET['courseID'];

if($_GET['confirmed'] == 1) { // Really delete the class
  $sql = "DELETE FROM cs247.User_Course WHERE user_id = '{$userInfo['id']}' AND course_id = '{$courseID}'";
  @mysql_query($sql);
  if(mysql_affected_rows() > 0) { // Success
    header("Location: myprofile.php");
  } else {
    print '<div class="pageShell">';
    print_error("Something went wrong with deleting your course. Please go back and try again.");
    print '</div>';
  }
} elseif($courseID > 0) {

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Please confirm...</div>
    <div class="viewPadding">
      <p>Are you sure you want to remove</p>
      <p align="center"><b style="font-size:125%;"><?php print $userInfo['courses'][$courseID]['name']; ?></b></p>
      <p>from your list of classes? Study data for this class will also be deleted.</p>
      <p align="center"><input type="button" value="Yes, delete it!" onclick="window.location='deleteclass.php?courseID=<?php print $courseID; ?>&confirmed=1'" /> <input type="button" value="Nevermind!" onclick="window.location='myprofile.php'" /></p>
    </div>
  </div>
</div>

<?php

} else {
  header("Location: myprofile.php");
}

require_once "footer.php";

ob_end_flush();

?>