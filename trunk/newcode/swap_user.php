<?php

if($_POST['userID'] > 0) {
  setcookie("userid", (int) $_POST['userID'], time() + (3600 * 24), "/");
  header("Location: myprofile.php");
}

require_once "header.php";

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Who do you want to be?</div>
    <div class="viewPadding">
      <p>You can select which user to use the app as.</p>
      <form method="post" action="swap_user.php">
        <p align="center"><select name="userID">
          <?php
            $sql = "SELECT * FROM cs247.User ORDER BY first_name ASC";
            $result = @mysql_query($sql);
            while($data = mysql_fetch_assoc($result)) {
              print '<option value="' . $data['id'] . '">' . $data['first_name'] . ' ' . $data['last_name'] . '</option>';
            }
          ?>
        </select></p>
        <p align="center"><input type="submit" value="Swap Your Identity" /></p>
      </form>
    </div>
  </div>
</div>

<?php

require_once "footer.php";

?>