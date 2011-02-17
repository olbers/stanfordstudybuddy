<?php
require_once "common/header.php";

/**
@author: Anant Bhardwaj
@date: 02/16/2011

Study Buddy Main Page
*/

?>

<div style="font-weight:bold; color:#4D4D4D; width:100%; padding:0px; text-align:left;">
CONFIRM CHECK-IN
</div>
<div class="wrapper" style="padding:0px !important; border-bottom:0px;">
<table cellpadding="3" cellspacing="0" width="100%">
<tbody>
<tr>
<td class="section-title">
<span class="title-text"><?php date_default_timezone_set('UTC'); echo $_GET["place"] ?></span>
</td>
</tr>
<tr>
<td class="cellClicker">
Welcome to
<b>
<?php echo $_GET["place"] ?></b> <br />
<form method="post" action="checkin-success.php">
<table>
<tr>
<td>
<b>
Select the class:</b>
</td>
<td>
<select>
<option value="CS 109">CS 109 </option>
<option value="CS 247">CS 247 </option>
<option value="CS 221">CS 221 </option>
<option value="CS 547">CS 547 </option>
</select>
</td>
</tr>
<tr>
<td>
<b>Rating:</b>
</td>
<td>
<select>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</td>
</tr>
<tr>
<td>
<a href="checkin-success.php?place=<?php echo urlencode($_GET["place"]) ?>">Confirm Check-In </a>
</td>
</tr>
</table>
</form>
</td>
</tr>
</tbody>
</table>
</div>

<?php
require_once "common/footer.php";

?>