<?php
session_start();


if(!isset($_SESSION['emp_code']))
{
	header("location:login.php");
}
?>

<!DOCTYPE HTML>
<html>

<head>

<title>HOME PAGE</title>
</head>
<body>
  <?php 
  include "inctop.php";
  ?>
        <!-- insert the page content here -->
<div id="center" align="center">
  <p align="center">
  <form action="" method="post" enctype="multipart/form-data">
 <table width="581" border="0" cellspacing="0" cellpadding="0">

<tr>
<th align="center">Please upload your file</th>
<td align="center"><input type="file" name="report" /></td>
</tr>

</table>
</form>
     </p>
    </div>
    <?php 
  include "incbottom.php";
  ?>
  </body>
  
</html>
