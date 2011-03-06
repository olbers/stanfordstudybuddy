<?php

require_once "header.php";

?>

<div class="pageShell">
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Your Profile</div>
    <div class="viewPadding">
      <p><img src="userpic.png" class="userPic" />
      <?php
        if(count($userInfo['lastSeen'])) {
          print '<b>Last Seen:</b><br />' . $userInfo['lastSeen']['location_name'] . ', ' . lastSeenTime($userInfo['lastSeen']['end_time']);
        } else {
          print 'You haven\'t logged any study sessions yet... get going!';
        }
      ?>
      </p>
      <div class="clearerDiv"></div>
    </div>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />Your Classes</div>
    <table class="deleteableTable">
      <?php
        foreach($userInfo['courses'] as $course) {
          print '<tr>';
          print '<td onclick="window.location=\'deleteclass.php?courseID=' . $course['id'] . '\'">' . $course['name'] . '</td>';
          print '</tr>';
        }
      ?>
    </table>
    <p align="center"><input type="button" value="Add Class" onclick="window.location='addclass.php';" /></p>
  </div>
  
  <div id="curvyShell">
    <div class="curvyHeading"><img src="clear.gif" class="curvyHeadingSpacer" />This Week's Study Data</div>
    <div class="viewPadding">
      <p align="center"><img src="http://chart.apis.google.com/chart?chxl=0:|Sun|Mon|Tues|Wed|Thu|Fri|Sat|1:|0|6|12&chxr=1,10,100&chxt=x,y&chs=275x180&cht=lc&chco=90032D&chds=0,12&chd=t:2,5,7,6,4,3,5&chg=25,50,5,4&chls=1.5&chm=o,AA0033,0,-1,8|b,3399CC44,0,0,0" width="275" height="180" alt="" /></p>
    </div>
  </div>
</div>

<?php

require_once "footer.php";

?>