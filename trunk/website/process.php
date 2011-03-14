<?php
require_once("resources/inc/header.php");
?>
    
<td class="main-panel" style="text-align:left">
<div class="box">
<h1>1. Need Finding</h1>
<hr />
<p>
We observed that a lot of data centered around "studying experience" on campus have never been logged but
should be very useful to college students.</p>
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/needfinding-1.jpg" alt="resources/images/process/needfinding-1.jpg" style="margin:0px auto; width:580px; height:440px;"  />
<br />
<br />
<img src="resources/images/process/needfinding-2.jpg" alt="resources/images/process/needfinding-1.jpg" style="margin:0px auto; width:580px; height:440px;" />

</div>
<p>
Thinking about "how might we encourage students to study more
efficiently and frequently," we decided to make a mobile app that provides users logged information about where &
what their friends are studying and how loud study spots are at the moment.</p>
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/needfinding-3.jpg" alt="resources/images/process/needfinding-1.jpg" style="margin:0px auto; width:580px; height:440px;" />
<br />
<br />
<img src="resources/images/process/needfinding-4.jpg" alt="resources/images/process/needfinding-1.jpg" style="margin:0px auto; width:580px; height:440px;" />

</div>
<p>
We came up with the idea of "study logging" to collect those data inspired by the check-in process by FourSquare.
</p>
</div>
<br />
<br />
<div class="box">
<h1>2. Paper Prototyping</h1>
<hr />
<p>
We started with doing a paper prototype so that we can get early design feedback.</p>
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/paperprototyping-1.jpg" alt="resources/images/process/paperprototyping-1.jpg" style="margin:0px auto; width:580px; height:440px;"  />
<br />
<br />
<img src="resources/images/process/paperprototyping-2.png" alt="resources/images/process/paperprototyping-2.png" style="margin:0px auto; width:580px; height:640px;" />

</div>
</div>
<br />
<br />
<div class="box">
<h1>3. Project Planning</h1>
<hr />
<p>
After paper prototyping, we focused on figuring out the setup and the resources required for the project. 
We set-up up the database and the web-server required for our application. 
We also set-up up our svn for sharing code among our group.
</p>
<p>
Then,we began drawing up plans for the implementation. We started with a client server architecture where we planned to 
write a native android app that would make a HTTP request to a server side back-end module to get data in JSON/XML and do a native rendering.
</p>

</div>

<br />
<br />
<div class="box">
<h1>4. Alpha Prototype</h1>
<hr />
<p>
For this phase, we aimed to get the check in and check out functionality implemented.
 We also gave it an initial black/white/grey-scale design that would eventually go through several iterations.
 </p>
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/alpha-1.png" alt="resources/images/process/alpha-1.png" style="margin:0px auto; width:333px; height:492px;"  />
 <br />
 <br />
<img src="resources/images/process/alpha-2.png" alt="resources/images/process/alpha-2.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/alpha-3.png" alt="resources/images/process/alpha-3.png" style="margin:0px auto; width:333px; height:492px;"  />
 <br />
 <br />
<img src="resources/images/process/alpha-4.png" alt="resources/images/process/alpha-4.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/alpha-5.png" alt="resources/images/process/alpha-5.png" style="margin:0px auto; width:333px; height:492px;"  />

</div>
</div>

<br />
<br />
<div class="box">
<h1>5. Beta Prototype</h1>
<hr />
<p>
For this phase, we aimed to implement the remaining functionality, such as searching locations, and adding/deleting classes from your profile. 
We also aimed to streamline our checkin process by chucking the old homepage and making the homepage the actual checkin page. Thus, you could 
now check in by clicking 4 times, whereas in our previous iteration, 
the user had to find the check in page and then go through the process.
</p>
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/beta-1.png" alt="resources/images/process/beta-1.png" style="margin:0px auto; width:333px; height:492px;"  />
 <br />
 <br />
<img src="resources/images/process/beta-2.png" alt="resources/images/process/beta-2.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/beta-3.png" alt="resources/images/process/beta-3.png" style="margin:0px auto; width:333px; height:492px;"  />
 
</div>
</div>



<br />
<br />
<div class="box">
<h1>6. User Testing</h1>
<hr />
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/usertesting-1.jpg" alt="resources/images/process/usertesting-1.jpg" style="margin:0px auto; width:580px; height:440px;"  />
 <br />
 <br />
<img src="resources/images/process/usertesting-2.jpg" alt="resources/images/process/usertesting-2.jpg" style="margin:0px auto; width:580px; height:440px;" />
 <br />
 <br />
<img src="resources/images/process/usertesting-3.jpg" alt="resources/images/process/usertesting-3.jpg" style="margin:0px auto; width:580px; height:440px;"  />
  <br />
 <br />
<img src="resources/images/process/usertesting-4.jpg" alt="resources/images/process/usertesting-4.jpg" style="margin:0px auto; width:580px; height:440px;"  />
 
</div>
</div>

<br />
<br />
<div class="box" id="finalversion">
<h1>7. Final Version</h1>
<hr />
<p>
For the final version, we redid the layout and made a lot of UI tweaks. The changes were all based on feedback from user testing and 
from our own internal debates on how things should look. Compared to our beta prototype, our final version is much more professional 
looking and feels more like a mobile app.
</p>
<div style="margin:0px auto; text-align:center;">
<img src="resources/images/process/final-1.png" alt="resources/images/process/final-1.png" style="margin:0px auto; width:333px; height:492px;"  />
 <br />
 <br />
<img src="resources/images/process/final-2.png" alt="resources/images/process/final-2.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/final-3.png" alt="resources/images/process/final-3.png" style="margin:0px auto; width:333px; height:492px;"  />
  <br />
 <br />
<img src="resources/images/process/final-4.png" alt="resources/images/process/final-4.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/final-5.png" alt="resources/images/process/final-5.png" style="margin:0px auto; width:333px; height:492px;"  />
  <br />
 <br />
<img src="resources/images/process/final-6.png" alt="resources/images/process/final-6.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/final-7.png" alt="resources/images/process/final-7.png" style="margin:0px auto; width:333px; height:492px;"  />
  <br />
 <br />
<img src="resources/images/process/final-8.png" alt="resources/images/process/final-8.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/final-9.png" alt="resources/images/process/final-9.png" style="margin:0px auto; width:333px; height:492px;"  />
 <br />
 <br />
 <img src="resources/images/process/final-10.png" alt="resources/images/process/final-10.png" style="margin:0px auto; width:333px; height:492px;"  />
 <br />
 <br />
<img src="resources/images/process/final-11.png" alt="resources/images/process/final-11.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/final-12.png" alt="resources/images/process/final-12.png" style="margin:0px auto; width:333px; height:492px;"  />
  <br />
 <br />
<img src="resources/images/process/final-13.png" alt="resources/images/process/final-13.png" style="margin:0px auto; width:333px; height:492px;" />
 <br />
 <br />
<img src="resources/images/process/final-14.png" alt="resources/images/process/final-14.png" style="margin:0px auto; width:333px; height:492px;"  />
 
</div>

</div>
</td>
<?php
require_once("resources/inc/footer.php");
?>