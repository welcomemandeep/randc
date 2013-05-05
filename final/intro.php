<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Intro</title>
<style>
.sb_btn{
font:17px Verdana, Helvetica, sans-serif;
height:25px;
font-weight:bold;
}
a:link {
	color: #242424;
}
</style>
</head>

<body>

<?php include "inctop.php"; ?>
</div>
	<div id="center" align="center">
		<p>
		<table width="200" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='intro_project_received.php'" style="height:2em; width:10em;" value="Projects Received">
</td>
  </tr>
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='intro_bill_issued.php'" style="height:2em; width:10em;" value="Bill Issued">
</td>
  </tr>
  <tr>
    <td ><input type="button" name="new_user" onclick="location.href='intro_fee_received.php' "  style="height:2em; width:10em;" value="Fee Received">
</td>
  </tr>
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='intro_receipt_issued.php' " value="Receipt Issued" style="height:2em; width:10em;">
</td>
  </tr>
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='intro_project_team.php' " value="Project Team" style="height:2em; width:10em;">
</td>
  </tr>
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='intro_report.php' " value="Report" style="height:2em; width:10em;">
</td>
  </tr>
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='intro_distribution.php' " value="Distribution" style="height:2em; width:10em;">
</td>
  </tr>
  <tr>
    <td><input type="button" name="new_user" onclick="location.href='../new_user/form.php' " value="TDS" style="height:2em; width:10em;">
</td>
  </tr>
</table>

</p>
		
	</div>
</div>

</div>
<?php 

include "incbottom.php";
?>
</body>
</html>
