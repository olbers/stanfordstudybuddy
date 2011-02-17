<?php
require_once "common/header.php";

/**
@author: Anant Bhardwaj
@date: 02/16/2011

Study Buddy Main Page
*/

?>



<div align="center">
<table class="icon_layout">
<tr>
<td>
<table class="icon">
<tr>
<td class="icon">
<div style="background-image: url(resources/images/icon_myprofile.png); background-repeat:no-repeat; 
width:100px; height:100px; cursor:pointer;" 
onclick="window.location = &quot;checkin.php&quot;;"/>
</td>
</tr>
<tr>
<td class="icon">
<span class="title-text">My Profile</span>
</td>
</tr>
</table>
</td>
<td>
<table class="icon">
<tr>
<td class="icon">
<div style="background-image: url(resources/images/icon_checkinout.png); background-repeat:no-repeat; 
width:100px; height:100px; cursor:pointer;" 
onclick="window.location = &quot;checkin.php&quot;;"/>
</td>
</tr>
<tr>
<td class="icon">
<span class="title-text">Check-In</span>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table class="icon">
<tr>
<td class="icon">
<div style="background-image: url(resources/images/icon_search.png); background-repeat:no-repeat; 
width:100px; height:100px; cursor:pointer;" 
onclick="window.location = &quot;checkin.php&quot;;"/>
</td>
</tr>
<tr>
<td class="icon">
<span class="title-text">Search</span>
</td>
</tr>
</table>
</td>
<td>
<table class="icon">
<tr>
<td class="icon">
<div style="background-image: url(resources/images/icon_campusdata.png); background-repeat:no-repeat; 
width:100px; height:100px; cursor:pointer;" 
onclick="window.location = &quot;checkin.php&quot;;"/>
</td>
</tr>
<tr>
<td class="icon">
<span class="title-text">Campus Data</span>
</td>
</tr>
</table>
</td>
</tr>
</table>  
  
</div>  


<?php
require_once "common/footer.php";

?>