<?php

$filePath = explode("/", $_SERVER['PHP_SELF']);
$fileName = $filePath[count($filePath)-1];

?>

<div id="bottomNavBar">
  <div class="bottomNavButton"><a href="index.php">
    <?php
      if($fileName == "index.php") {
        print '<img src="icon_home_on.png" />';
      } else {
        print '<img src="icon_home.png" />';
      }
    ?>
  </a></div>
  <div class="bottomNavButton"><a href="myprofile.php">
    <?php
      if($fileName == "myprofile.php" || $fileName == "addclass.php" || $fileName == "deleteclass.php") {
        print '<img src="icon_myprofile_on.png" />';
      } else {
        print '<img src="icon_myprofile.png" />';
      }
    ?>
  </a></div>
  <div class="bottomNavButton"><a href="search.php">
    <?php
      if($fileName == "search.php" || $fileName == "locationprofile.php") {
        print '<img src="icon_search_on.png" />';
      } else {
        print '<img src="icon_search.png" />';
      }
    ?>
  </a></div>
  <div class="bottomNavButton"><a href="campus-data.php">
    <?php
      if($fileName == "campus-data.php") {
        print '<img src="icon_campusdata_on.png" />';
      } else {
        print '<img src="icon_campusdata.png" />';
      }
    ?>
  </a></div>
</div>

</body>
</html>