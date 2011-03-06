<?php

ob_start();

require_once "header.php";

if($_POST['courseID'] > 0) {

  $courseID = (int) $_POST['courseID'];
  $sql = "INSERT INTO cs247.User_Course (user_id, course_id) VALUES('{$userInfo['id']}', '{$courseID}')";
  @mysql_query($sql);
  if(mysql_affected_rows() > 0) {
    header("Location: myprofile.php");
  } else {
    print '<div class="pageShell">';
    print_error("We could not add your class. Are you sure you picked a valid one? Go back and try again.");
    print '</div>';
  }

} else {

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Add A Class</div>
    <div class="viewPadding">
      <form method="post" action="addclass.php">
        <p align="center"><select name="courseID">
          <?php
            $sql = "SELECT id, course_number FROM cs247.Course ORDER BY course_number ASC";
            $result = @mysql_query($sql);
            while($data = mysql_fetch_assoc($result)) {
              if(!is_array($userInfo['courses'][$data['id']])) print '<option value="' . $data['id'] . '">' . $data['course_number'] . '</option>';
            }
          ?>
        </select></p>
        <p align="center"><input type="submit" value="Add This Class" /></p>
      </form>
    </div>
  </div>
</div>

<?php

}

require_once "footer.php";

ob_end_flush();

?>