<?php

require_once "../dbconnect.php";

if(strlen($_POST['input'])) {
  $regex = '%">([A-Za-z0-9[:space:]]*):</span>%';
  preg_match_all($regex, $_POST['input'], $matches);
  //print $regex . '<br>';
  //print '<pre>'; print_r($matches); print '</pre>';
  
  foreach($matches[1] as $courseNum) {
    $courseNum = mysql_real_escape_string($courseNum);
    if($courseNum != "Page") {
      $sql = "INSERT INTO cs247.Course (course_number) VALUES ('{$courseNum}')";
      @mysql_query($sql);
      if(mysql_affected_rows() > 0) {
        print '<p>Inserted <b>' . $courseNum . '</b> into the DB.</p>';
      } else {
        print '<p><b style="color:red;">Could not insert <b>' . $courseNum . '</b> into the DB.</b></p>';
      }
    }
  }

}

?>

<form method="POST" action="">
<textarea name="input" style="width:300px; height:300px;"></textarea>
<input type="submit" value="Go">
</form>