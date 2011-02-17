<?php
require_once "common/header.php";

/**
@author: Anant Bhardwaj
@date: 02/16/2011

Study Buddy Main Page
*/

?>


<div class="wrapper" style="padding:0px !important; border-bottom:0px;">
<table cellpadding="3" cellspacing="0" width="100%">
<tbody>
<tr>
<td class="section-title">
<span class="title-text"><?php echo $_GET["place"] ?></span>
</td>
</tr>
<tr>
<td class="cellClicker">
Welcome to to
<b>
<?php echo $_GET["place"] ?></b>. <br />
You have successfully checked-in.
<br />
<br />
You are studying since <?php date_default_timezone_set('PST'); echo date("D M j G:i:s T Y");  ?>
<br />
<br />
<a href="index.php">Click Here</a> to checkout.
</td>
</tr>
</tbody>
</table>
</div>

<?php
require_once "common/footer.php";

?>