<?php
require_once "common/header.php";

/**
@author: Anant Bhardwaj
@date: 02/16/2011

Study Buddy Main Page
*/

?>

<div style="font-weight:bold; color:#4D4D4D; width:100%; padding:0px; text-align:left;">
CHECK-IN
</div>
<div class="wrapper" style="padding:0px !important; border-bottom:0px;">
<table cellpadding="3" cellspacing="0" width="100%">
<tbody>
<tr>
<td class="section-title">
<span class="title-text">Favorite Places</span>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Old Student Union&quot;;">
<b>
Old Student Union</b> <br />
<small>
<span class="gray-text">Distance: 0.7 Miles </span><br />
<span class="gray-text">Rating: 3 </span><br />
<span class="gray-text">Your 7 friends are studying there</span><br/>
</small>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Graduate Community Center&quot;;">
<b>
Graduate Community Center</b> <br />
<small>
<span class="gray-text">Distance: 0.4 Miles </span><br />
<span class="gray-text">Rating: 4.5 </span><br />
<span class="gray-text">Your 3 friends are studying there</span><br/>
</small>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Meyer Library&quot;;">
<b>
Meyer Library</b> <br />
<small>
<span class="gray-text">Distance: 0.7 Miles </span><br />
<span class="gray-text">Rating: 3 </span><br />
<span class="gray-text">Your 17 friends are studying there</span><br/>
</small>
</td>
</tr>
</tbody>
</table>
</div>
<br />

<div class="wrapper" style="padding:0px !important; border-bottom:0px;">
<table cellpadding="3" cellspacing="0" width="100%">
<tbody>
<tr>
<td class="section-title">
<span class="title-text">Places Nearby</span>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Engineering Library&quot;;">
<b>
Engineering Library</b> <br />
<small>
<span class="gray-text">Distance: 0.2 Miles </span><br />
<span class="gray-text">Rating: 2.5 </span><br />
<span class="gray-text">Your 2 friends are studying there</span><br/>
</small>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Green Library&quot;;">
<b>
Green Library</b> <br />
<small>
<span class="gray-text">Distance: 0.4 Miles </span><br />
<span class="gray-text">Rating: 4.7 </span><br />
<span class="gray-text">Your 11 friends are studying there</span><br/>
</small>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Math Library&quot;;">
<b>
Math Library</b> <br />
<small>
<span class="gray-text">Distance: 0.2 Miles </span><br />
<span class="gray-text">Rating: 3.7 </span><br />
<span class="gray-text">Your 3 friends are studying there</span><br/>
</small>
</td>
</tr>
</tbody>
</table>
</div>

<br />

<div class="wrapper" style="padding:0px !important; border-bottom:0px;">
<table cellpadding="3" cellspacing="0" width="100%">
<tbody>
<tr>
<td class="section-title">
<span class="title-text">Recommended Places</span>
</td>
</tr>
<tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Tresidder Student Union&quot;;">
<b>
Tressider Student Union</b> <br />
<small>
<span class="gray-text">Distance: 0.4 Miles </span><br />
<span class="gray-text">Rating: 4.9 </span><br />
<span class="gray-text">Your 11 friends are studying there</span><br/>
</small>
</td>
</tr>
<td class="cellClicker" onclick="window.location = &quot;checkin-exec.php?place=Meyer Library&quot;;">
<b>
Meyer Library</b> <br />
<small>
<span class="gray-text">Distance: 0.7 Miles </span><br />
<span class="gray-text">Rating: 3 </span><br />
<span class="gray-text">Your 17 friends are studying there</span><br/>
</small>
</td>
</tr>
</tbody>
</table>
</div>
<?php
require_once "common/footer.php";

?>