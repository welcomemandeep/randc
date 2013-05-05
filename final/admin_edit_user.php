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


$empcode=$_SESSION['empcode_admin'];
if(isset($empcode))
{
include "dbconnect.php";

$array_up_user=mysql_fetch_array(mysql_query("select * from personalinfo where emp_code like '$empcode'"));
$array_up_user1=mysql_fetch_array(mysql_query("select * from logintable where emp_code like '$empcode'"));

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
<script>
	function check()
	{
        var a = document.getElementById('matchs');
		var x=document.getElementById("new").value;
		var y=document.getElementById("old").value;
		
		
		if (y.length==0) {
		a.innerHTML = '<span style="color:red"><img src=error.png></img><font size=-1></font></span>';}
		else if(y==x){
		a.innerHTML = '<span style="color:blue"><img src=success.png></img><font size=-1></font></span>';}
		else {
		a.innerHTML = '<span style="color:red"><img src=error.png></img><font size=-1></font></span>';}
		
		
	}
</script>
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
Here the code is for the edit user !!
-->
<form action="admin_action.php" method="post" name="edit_user">
<table align="center"  border="1" bordercolorlight="#999999" id="edituser" >
<tr>
<td width="167" height="36" bgcolor="#C3C3C3"><span class="style1">Name &nbsp;</span></td>
<td width="269" align="center" bgcolor="#E8E8E8" ><input type="text" value=" <?php echo $array_up_user['name']?> " name="name" /></td>
</tr>

<tr>
<td height="27" bgcolor="#C3C3C3" class="style1">Gender &nbsp;</td>
<td align="center" bgcolor="#E8E8E8"> Male &nbsp;
<input name="gender"  value="male" type="radio" <?php if($array_up_user['gender']=="male") echo "checked=\"checked\"" ?>/>&nbsp;Female&nbsp;<input name="gender"  value="female" type="radio" <?php if($array_up_user['gender']=="female") echo "checked=\"checked\"" ?>/></td>
</tr>

<tr>
<td height="37" bgcolor="#C3C3C3" class="style1">Department &nbsp;</td>
<td align="center" bgcolor="#E8E8E8"><select name="department" >
<option value="<?php echo $array_up_user['department']?>"><?php echo $array_up_user['department']?></option>
 <?php 
		  include "dbconnect.php";
		  $query=mysql_query("select * from state_department where flag like '1'");
		   while($array=mysql_fetch_array($query))
		   {
		    echo "<option value=\"".$array['name']."\">".$array['name']."</option>";
		   }
		  ?>
		  </select> </td>
</tr>

<tr>
<td height="37" bgcolor="#C3C3C3" class="style1">Emp Code &nbsp;</td>
<td align="center" bgcolor="#E8E8E8"> <input type="text" value="<?php echo $array_up_user['emp_code']?>" name="emp_code" /></td>
</tr>

<tr>
<td height="37" bgcolor="#C3C3C3" class="style1">Designation &nbsp;</td>
<td align="center" bgcolor="#E8E8E8"> <select name="designation">
			<option value="<?php echo $array_up_user['designation']?>"><?php echo $array_up_user['designation']?></option>
          <option value="Director">Director</option>
		  <option value="Head of Department">Head of Department</option>
          <option value="Professor">Professor</option>
          <option value="Associate Professor">Associate Professor</option>
          <option value="Assistant Professor">Assistant Professor</option>
          <option value="Lecturer">Lecturer</option>
          <option value="Others">Others</option>
		  </select></td>
</tr>

<tr>
<td height="37" bgcolor="#C3C3C3" class="style1">Email Id &nbsp;</td>
<td align="center" bgcolor="#E8E8E8"> <input type="text" value="<?php echo $array_up_user['email']?>" name="email" /></td>
</tr>

<tr>
<td height="45" bgcolor="#C3C3C3" class="style1">Password</td>
<td align="center" bgcolor="#E8E8E8"> <input type="password" value="<?php echo $array_up_user1['password']?>" name="password"  id="new"  maxlength="10"/></td>
</tr>

<tr>
<td height="45" bgcolor="#C3C3C3" class="style1">Re-Type Password</td>
<td align="center" bgcolor="#E8E8E8"> <input type="password" value="<?php echo $array_up_user1['password']?>" name="rpassword"  id="old" onkeyup="return check();" maxlength="10" /><span id="matchs"></span></td>
</tr>

<tr>
<td height="45" bgcolor="#C3C3C3" class="style1" colspan="2"><b><u>Delete account</u></b>
 <input name="deluser" type="checkbox" value="1"  />&nbsp; &nbsp; &nbsp; <b><u>Administrator</u></b>&nbsp;Yes<input type="radio" value="1" name="makeadmin" <?php  if($array_up_user1['flag']==1)echo "checked=\"checked\"" ?>/>No<input type="radio" value="0" name="makeadmin" <?php  if($array_up_user1['flag']!=1)echo "checked=\"checked\"" ?> /></td>
</tr>

<tr bgcolor="#999999">
<td colspan="2" align="center"><input type="submit" value="Confirm" name="admin_edit"  /></td>
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
?>" alt="Image not found" name="admin" width="176" height="114" class="resize" border="1" /></p>
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
    <td bgcolor="#C3C3C3" align="center"><a href="javascript:post_event()">Post Event</a></td>
  </tr>
  <tr>
    <td bgcolor="#E8E8E8"align="center"><a href="javascript:edit_user()">Update user</a></td>
  </tr>
 
  <tr>
    <td bgcolor="#E8E8E8" align="center"><a href="profile.php">Home Page</a></td>
  </tr
    ><tr>
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
