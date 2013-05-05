<?php 
session_start();
//Access rules 
if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag'] != 1)
{
 echo "<script>alert(\"You are not allowed to enter in this page!! \")</script>";
 echo "<script>window.location.href=\"home.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);


include "dbconnect.php";
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
-->
</style>
<script type="text/javascript">
var showRow = (navigator.appName.indexOf("Internet Explorer") != -1) ? "block" : "table-row";
function edit_user()
{
	document.getElementById("edituser").style.display=showRow;	
	document.getElementById("edit").style.display=showRow;	
	document.getElementById("txtHint").style.display=showRow;	
	document.getElementById("txtHint1").style.display="none";	
	document.getElementById("updateuser").style.display="none";
	document.getElementById("update").style.display="none";	
	document.getElementById("pendingprojects").style.display="none";	
	document.getElementById("pp").style.display="none";	
	document.getElementById("txtHint2").style.display="none";	
	
		
}
function update_user()
{
	document.getElementById("updateuser").style.display=showRow;	
	document.getElementById("update").style.display=showRow;	
	document.getElementById("txtHint1").style.display=showRow;
	document.getElementById("txtHint").style.display="none";		
	document.getElementById("edituser").style.display="none";	
	document.getElementById("edit").style.display="none";	
	document.getElementById("pendingprojects").style.display="none";	
	document.getElementById("pp").style.display="none";	
	document.getElementById("txtHint2").style.display="none";	
	
	
}
function pending_projects()
{
	document.getElementById("updateuser").style.display="none";	
	document.getElementById("update").style.display="none";	
	document.getElementById("txtHint1").style.display="none";
	document.getElementById("txtHint").style.display="none";		
	document.getElementById("edituser").style.display="none";	
	document.getElementById("edit").style.display="none";	
	document.getElementById("pendingprojects").style.display=showRow;	
	document.getElementById("pp").style.display=showRow;	
	document.getElementById("txtHint2").style.display=showRow;	
	
}
//edit user function
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
// update user function
function showUser1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
// pending project
function pendingProjects(str)
{
if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getpendproj.php?q="+str,true);
xmlhttp.send();
}

</script>
<style type="text/css">
.inputbox{
height:75px;
width:98%;
}
.style1 {
	font-size: large;
	font-weight: bold;
}
    .resize {
    width: 300px;
    height : auto;
    }

    .resize {
    width: auto;
    height :100px;
    }
-->
</style>
</head>

<body>
<h1 align="center"><u>ADMINISTRATOR</u></h1>

<table width="100%" height="312" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="84%" height="21" bgcolor="#DADADA"><marquee bgcolor="#DADADA">Welcome Admin !!</marquee></td>
<td width="16%" align="center"><b><?php echo date("D, d M Y")?></b></td>
</tr>

<tr height="80%" align="center">
<!--
Here the center body is situated
-->

<td width="84%" height="489">

<!--
Here the code is for the edit user !!
-->
<form>
<table align="center"  border="1" bordercolorlight="#999999" id="edituser"  style="display:none">

<tr>
<td width="167" height="36" bgcolor="#C3C3C3"><span class="style1">Enter Name &nbsp;</span></td>
<td width="269" align="center" bgcolor="#E8E8E8" ><select name="uid_search" onChange="showUser(this.value)">
<option value="">Select a person:</option>
<?php 
$query=mysql_query("SELECT * FROM personalinfo");
while($user_hint_array=mysql_fetch_array($query))
{echo "<option value=\"".$user_hint_array['emp_code']."\">".$user_hint_array['name']."  ".$user_hint_array['department']."</option>";}
?></select>
</td>
</tr>


</table>
</form>
<div id="txtHint"></div>
<div align="center" id="edit" style="display:none"><a href="admin_edit_user.php">Edit</a></div>

<!-- here is the code for  
updating user -->

<form>
<table align="center"  border="1" bordercolorlight="#999999" id="updateuser"  style="display:none">

<tr>
<td width="167" height="36" bgcolor="#C3C3C3"><span class="style1">Enter Name &nbsp;</span></td>
<td width="269" align="center" bgcolor="#E8E8E8" ><select name="update" onChange="showUser1(this.value)">
<option value="">Select a person:</option>
<?php 
$query=mysql_query("SELECT * FROM logintable,personalinfo WHERE logintable.emp_code=personalinfo.emp_code AND flag like 6
AND designation!='Others'");
while($user_hint_array=mysql_fetch_array($query))
{echo "<option value=\"".$user_hint_array['emp_code']."\">".$user_hint_array['name']."</option>";}
?></select>
</td>
</tr>


</table>
</form>
<div id="txtHint1"></div>
<div align="center" id="update" style="display:none"><a href="admin_edit_user.php">Update</a></div>

<!-- form for pending project -->

<form>
<table align="center"  border="1" bordercolorlight="#999999" id="pendingprojects"  style="display:none">

<tr>
<td width="167" height="36" bgcolor="#C3C3C3"><span class="style1">Project Status &nbsp;</span></td>
<td width="269" align="center" bgcolor="#E8E8E8" ><select name="pendproj" onChange=" pendingProjects(this.value)">
<option value="">Select a project</option>
<?php 
$query=mysql_query("SELECT * FROM project_letter_detail as pld,project_stages as ps WHERE pld.project_no=ps.project_no AND ps.flag NOT LIKE 12");
while($user_hint_array=mysql_fetch_array($query))
{echo "<option value=\"".$user_hint_array['project_no']."\">".$user_hint_array['project_no']."   ".$user_hint_array['testing']."</option>";}
?></select>
</td>
</tr>


</table>
</form>
<div id="txtHint2"></div>
<div align="center" id="pp" style="display:none"><a href="admin_pending_projects.php">Edit</a></div>


</td>

<!--
Here the side coloumn begins
-->
<td width="16%" align="justify"><p align="center"><img src="<?php 
include "dbconnect.php";
$array=mysql_fetch_array(mysql_query("SELECT * FROM project_official_detail WHERE project_no=100"));
echo $array['address_of_scan_image'];
mysql_close();
?>" alt="Image not found" name="admin" width="176" height="114" border="1" class="resize" /></p>
<table width="83%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td width="69%"><strong>Number of -- </strong></td>
    <td width="31%"><strong>Count</strong></td>
  </tr>
  <tr>
    <td bgcolor="#999999">Users</td>
    <td bgcolor="#CCCCCC" align="center"><?php echo $user_hint_array['count(emp_code)']?></td>
  </tr>
 
  
</table>
<br />
<table width="71%" border="0" cellspacing="1" cellpadding="1" align="center">
  <tr>
    <td bgcolor="#E8E8E8"align="center"><a href="javascript:edit_user()">Edit user</a></td>
  </tr>
  <tr>
    <td bgcolor="#E8E8E8"align="center"><a href="javascript:update_user()">Update new user</a></td>
  </tr>
  <tr>
    <td bgcolor="#E8E8E8"align="center"><a href="javascript:pending_projects()">Pending Projects</a></td>
  </tr>
  <tr>
    <td bgcolor="#E8E8E8" align="center"><a href="admin_edit_states.php">Edit States</a></td>
  </tr>
  <tr>
    <td bgcolor="#E8E8E8" align="center"><a href="admin_edit_taxes.php">Edit Taxes</a></td>
  </tr>
   <tr>
    <td bgcolor="#E8E8E8" align="center"><a href="home.php">Home Page</a></td>
  </tr>
    <tr>
    <td bgcolor="#C3C3C3" align="center"><a href="logout.php">Logout</a></td>
  </tr>
  
</table>

</td>
</tr>

<tr>
<td height="21" colspan="2" align="center" bgcolor="#DADADA">Last Access : December 31, 2010 9:59 AM</td>
</tr>
</table>

</body>
</html>
