<?php

if($_POST['userID'] > 0) {
  setcookie("userid", (int) $_POST['userID'], time() + (3600 * 24), "/");
  header("Location: myprofile.php");
}

require_once "header.php";

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Login Below...</div>
    <div class="viewPadding">
      <p>Welcome back to StudyBuddy! Please select your account below.</p>
      <form method="post" action="login.php">
        <p align="center"><select name="userID">
          <option value="4">Jeff Heer</option>
          <option value="2">Liz Lin</option>
          <option value="3">Renata Aryanti</option>
          <option value="5">Sep Kamvar</option>
          <option value="8">Anant Bhardwaj</option>
          <option value="1">Dave Luciano</option>
          <option value="7">Jaiwon Rhi</option>
          <option value="6">Mike Ortiz</option>
        </select></p>
        <p align="center"><input type="submit" value="Login" /></p>
      </form>
    </div>
  </div>
</div>

<?php

require_once "footer.php";

?>