<?php

require_once "header.php";

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Your Profile</div>
    <div class="viewPadding">
      <p><img src="userpic.png" class="userPic" /><b>Last Seen:</b> Meyer Library, yesterday at 5:30pm</p>
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Your Classes</div>
    <div class="viewPadding">
      <ul type="square">
        <li>CS 247</li>
        <li>CS 109</li>
        <li>CS 142</li>
      </ul>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Your Study Data</div>
    <div class="viewPadding">
      <p align="center"><input type="button" value="Your Weekly Study Data" onclick="swapViews('userStudyData')" /></p>
    </div>
  </div>
</div>

<?php

require_once "footer.php";

?>