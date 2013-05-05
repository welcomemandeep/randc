<?php
session_start();

//Access rules 
if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag'] != 5)
{
 echo "<script>alert(\"You are not allowed to enter in this page!! \")</script>";
 echo "<script>window.location.href=\"home.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

//$project_no=$_SESSION['project_no'];
$project_no='2011/06/1';



define ("MAX_SIZE","500"); 
	 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
 $errflag = false;
 

if(isset($_POST['upload']))
{
	 $image=$_FILES['report']['name'];
	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['report']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 if (($extension != "pdf") && ($extension != "doc")) 
 		{
		//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errflag=true;
 		}
 		else
 		{
//get the size of the image in bytes
 //$_FILES['report']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['report']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	echo '<h1>You have exceeded the size limit!</h1>';
	$errflag=true;
}
		}
	}
	
	 if(!$errflag)
 {
		  
 	include "dbconnect.php";
 	//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="upload/".$image_name;
  move_uploaded_file($_FILES['report']['tmp_name'],$newname);
  $query=mysql_query("INSERT INTO sub_report(project_no,address_of_upload_file) VALUES('$project_no','$newname')") or die(mysql_error());
 }
 else
 	{	echo "error";
	}
	
	$cur_time=date("Y-m-d  g:i:s");
	mysql_query("insert into project_track_record (project_no,`18`,`18_time`) values ('$project_no','18','$cur_time') ") or die(mysql_error());
	mysql_query("insert into project_stages (project_no,flag) values ('$project_no','18') ") or die(mysql_error());
 
}

?>

<!DOCTYPE HTML >
<html>

<head>

<title>HOME PAGE</title>
</head>
<body>
  <?php 
  include "inctop.php";
  ?>
  <br>
<br>
<br>
      <!-- insert the page content here -->
<div id="center" align="center">
  <p align="center">


<form action="" method="post" enctype="multipart/form-data">
<table width="581" border="0" cellspacing="0" cellpadding="0">

<tr>
<th align="center">Please upload your report</th>
<td align="center"><input type="file" name="report" /></td>
</tr>


<tr align="center">
<td align="center" colspan="2"><input type="submit" name="upload" value="CONFIRM" /></td>
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
