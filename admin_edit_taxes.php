<?php
session_start();
//Access rules 
if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag'] !=1)
{
 echo "<script>alert(\"You are not allowed to enter in this page!! \")</script>";
 echo "<script>window.location.href=\"home.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);


// edit user
if(isset($_POST['admin_edit_taxes']))
{
 
 $newtaxrate=trim($_POST['new_tax_rate']);
 $taxname=trim($_POST['select_tax']);
 
 if($newtaxrate != "")
 {
	 include "dbconnect.php";
 $q="UPDATE standard_rates SET rate='$newtaxrate' WHERE name='$taxname' ";
 mysql_query($q) or die(mysql_error());
 mysql_close();
 }
  echo "<script>alert(\"Tax rates updated\")</script>";
 echo "<script>window.location.href=\"admin_home.php\"</script>";	
 die("Error , Please turn on your javascript");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMINISTRATOR</title>
<style type="text/css">
<!--
body {
	background-color:#FFFFFF;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.inputbox{
height:75px;
width:98%;
}
-->
</style>
</head>

<body>
<h1 align="center"><u>ADMINISTRATOR</u></h1>

<table width="100%" height="312" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="88%" height="21" bgcolor="#DADADA"><marquee bgcolor="#DADADA">Welcome Admin !!</marquee></td>
<td width="12%" align="center"><b><?php echo date("D, d M Y")?></b></td>
</tr>

<tr height="80%" align="center">
<!--
Here the center body is situated
-->

<td width="88%" height="489">

<!--
Here the code is for the edit taxes !!
-->
<form action="" method="post" name="edit_taxes">
<table align="center"  border="1" bordercolorlight="#999999" id="editstates" >
<tr>
<td width="167" height="36" bgcolor="#C3C3C3"><span class="style1"> Select Tax &nbsp;</span></td>
<td width="269" align="center" bgcolor="#E8E8E8" ><select name="select_tax" >
<option value=""></option>
 <?php 
		  include "dbconnect.php";
		  $query=mysql_query("select * from standard_rates");
		   while($array=mysql_fetch_array($query))
		   {
		    echo "<option value=\"".$array['name']."\">".$array['name']."  @  ".$array['rate']."</option>";
		   }
		   
		  ?>
		  </select> </td>
</tr>

<tr>
<td width="167" height="36" bgcolor="#C3C3C3"><span class="style1"> Enter new rate &nbsp;</span></td>
<td width="269" align="center" bgcolor="#E8E8E8" ><input type="text" value="" name="new_tax_rate" /></td>
</tr>
<tr bgcolor="#999999">
<td colspan="2" align="center"><input type="submit" value="Confirm" name="admin_edit_taxes"  /></td>
</tr>
</table>
</form>

</td>

<!--
Here the side coloumn begins
-->
<td width="12%" align="justify"><p align="center"><img src="<?php 
include "dbconnect.php";
$array=mysql_fetch_array(mysql_query("SELECT * FROM project_official_detail WHERE project_no=100"));
echo $array['address_of_scan_image'];
mysql_close();
?>" alt="Image not found" name="admin" width="176" height="114" border="1" /></p>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td width="69%"><strong>Number of -- </strong></td>
    <td width="31%"><strong>Count</strong></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="justify">Users</div></td>
    <td bgcolor="#CCCCCC" align="center"><?php echo "5"?></td>
  </tr>
 
</table>
<br />
<table width="71%" border="0" cellspacing="1" cellpadding="1" align="center">
  <tr>
    <td bgcolor="#C3C3C3" align="center"><a href="javascript:edit_user()">Edit User </a></td>
  </tr>
  <tr>
    <td bgcolor="#E8E8E8"align="center"><a href="javascript:update_user()">Update user</a></td>
  </tr>
 
  <tr>
    <td bgcolor="#E8E8E8" align="center"><a href="admin_home.php">Home Page</a></td>
  </tr>
  <tr>
    <td bgcolor="#C3C3C3" align="center"><a href="logout.php">Logout</a></td>
  </tr>
  
</table>

</td>
</tr>

<tr>
<td width="100%" height="21" colspan="2" align="center" bgcolor="#DADADA">Last Access : December 31, 2010 9:59 AM</td>
</tr>
</table>

</body>
</html>
