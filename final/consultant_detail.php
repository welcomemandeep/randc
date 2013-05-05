<?php 
session_start();
include "dbconnect.php";
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);


//Access rules 
if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag'] != 2)
{
 echo "<script>alert(\"You are not allowed to enter in this page!! \")</script>";
 echo "<script>window.location.href=\"home.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}



if(!isset($_SESSION['test_info_loaded']))
{
	 echo "<script>alert(\"Please enter the test detail first!! \")</script>";
     echo "<script>window.location.href=\"test_detail.php\"</script>";
	 die("Turn on your javascript");
}


//Access rules 





   
	define ("MAX_SIZE","500"); 
	 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 //$errors=0;
	
	//Array to store validation errors

	$errmsg_arr = array();

	

	//Validation error flag

	$errflag = false;
	
$cur_date=date("Y-m-d");
$sfname="";
 $smname="";
 $slname="";
 $sdesignation="";
 $sdepartment="";
 $semailid="@gmail.com";
 $scno="";
 
 $cfname="";
 $cmname="";
 $clname="";
 $cdesignation="";
 $cdepartment="";
 $cemailid="";
 $ccno="";
 
 $receiveno="Receive_No";
 $copyto="Copy_To";
	
	if(isset($_POST['Submit']))
{
	
 // Variables being initalized 
 $sntitle=trim($_POST['Name_Title']);
 $sfname=trim($_POST['F_Name']);
 $smname=trim($_POST['M_Name']);
 $slname=trim($_POST['L_Name']);
 $sdesignation=trim($_POST['Designation']);
 $sdepartment=trim($_POST['Department']);
 $semailid=trim($_POST['Email_Id']);
 $scno=trim($_POST['Contact_No']);
 $cntitle=trim($_POST['C_Name_Title']);
 $cfname=trim($_POST['C_F_Name']);
 $cmname=trim($_POST['C_M_Name']);
 $clname=trim($_POST['C_L_Name']);
 $cdesignation=trim($_POST['C_Designation']);
 $cdepartment=trim($_POST['C_Department']);
 $cemailid=trim($_POST['C_Email_Id']);
 $ccno=trim($_POST['C_Contact_No']);
 
 $mm2 = trim($_POST['date_2_1']);
	$dd2 = trim($_POST['date_2_2']);
	$yyyy2= trim($_POST['date_2_3']);
	$date2 = $yyyy2 . '-' . $mm2. '-' . $dd2;
	$receiveno = trim($_POST['Receive_No']);
	$copyto = trim($_POST['Copy_To']);
	$markto = trim($_POST['Mark_To']);
	
	$err=0;
	if($date2>$cur_date)
  $err=1;
	
	$image=$_FILES['image']['name'];
	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errflag=true;
 		}
 		else
 		{
//get the size of the image in bytes
 //$_FILES['image']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['image']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	echo '<h1>You have exceeded the size limit!</h1>';
	$errflag=true;
}
		}
	}
	
 //error checking
 
 
 	
 
 if($sfname=="")
 {	$errmsg_arr[] = "first name missing";
 	$errflag = true;
 }
 if($slname=="")
 {	$errmsg_arr[] = "last name missing";
 	$errflag = true;
 }
 if($sdesignation=="")
 {	$errmsg_arr[] = "designation missing";
 	$errflag = true;
 }
 if($sdepartment=="")
 {	$errmsg_arr[] = "department missing";
 	$errflag = true;
 }
 if($semailid=="")
 {	$errmsg_arr[] = "email id missing";
 	$errflag = true;
 }
 if($scno=="")
 {	$errmsg_arr[] = "contact no missing";
 	$errflag = true;
 }
 if($cfname=="")
 {	$errmsg_arr[] = "contact person's first name missing";
 	$errflag = true;
 }if($clname=="")
 {	$errmsg_arr[] = "contact person's last name missing";
 	$errflag = true;
 }if($cdesignation=="")
 {	$errmsg_arr[] = "contact person's designation missing";
 	$errflag = true;
 }
if($cdepartment=="")
 {	$errmsg_arr[] = "contact person's department missing";
 	$errflag = true;
 }
if($cemailid=="")
 {	$errmsg_arr[] = "contact person's email id missing";
 	$errflag = true;
 }
 if($ccno=="")
 {	$errmsg_arr[] = "contact person's contact no  missing";
 	$errflag = true;
 }
 if($date2=="")
 {	$errmsg_arr[] = "recieved date  missing";
 	$errflag = true;
 }
 if($receiveno=="")
 {	$errmsg_arr[] = "receive no missing";
 	$errflag = true;
 }
 if($copyto=="")
 {	$errmsg_arr[] = "copy to  missing";
 	$errflag = true;
 }
 if($markto=="Mark to")
 {	$errmsg_arr[] = "mark to missing";
 	$errflag = true;
 }
  //check the validity of the email 
 include "email.php";
 if( checkmail($semailid) == 0 )
 {	$errmsg_arr[] = "Wrong email id";
	 	$errflag = true;
 }
  
 if( checkmail($cemailid) == 0 )
 {	$errmsg_arr[] = "Wrong email id";
	 	$errflag = true;
 }
 if(!$errflag)
 {
	$project_no=$_SESSION['project_no'];	  
 	
 	//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="upload/".$image_name;
  move_uploaded_file($_FILES['image']['tmp_name'],$newname);
 $query1=mysql_query("INSERT INTO project_contact_detail(s_title,s_first_name,s_middle_name,s_last_name,s_designation,s_department,s_email_id,s_contact_no,c_title,c_first_name,c_middle_name,c_last_name,c_designation,c_department,c_email_id,c_contact_no,project_no)VALUES ('$sntitle','$sfname','$smname','$slname','$sdesignation','$sdepartment','$semailid','$scno','$cntitle','$cfname','$cmname','$clname','$cdesignation','$cdepartment','$cemailid','$ccno','$project_no')")or die(mysql_error());
 $query2=mysql_query("INSERT INTO project_official_detail(project_no,receive_date,diary_no,copy_to,mark_to,address_of_scan_image) VALUES('$project_no','$date2','$receiveno','$copyto','$markto','$newname')") or die(mysql_error());
 
 
 
 
  	$cur_time=date("Y-m-d  g:i:s");
	mysql_query("insert into project_track_record (project_no,`1`,`1_time`) values ('$project_no','1','$cur_time') ") or die(mysql_error());
	mysql_query("insert into project_stages (project_no,flag) values ('$project_no','1') ") or die(mysql_error());
 
 
   $msg="You have been marked for the project numbered ".$project_no;
  mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$markto','$msg')")or die(mysql_error());

   mysql_query("insert into project_mark_to (project_no,hod_emp_code) values('$project_no','$markto')") or die(mysql_error());
 
 unset($_SESSION['test_info_loaded']);
  mysql_close();
  
  //session_unset($_SESSION['test_info_loaded']);  
  echo "<script>window.location.href=\"home.php\"</script>";
  die("Turn on your javascript");


 
 
  
  
 }
  else
 {	if (count($errmsg_arr)>0)
 	{	
		
		echo '<ul class="err">';

		foreach($errmsg_arr as $msg) {

			echo '<li>',$msg,'</li>'; 

		}

		echo '</ul>';
		
	}
 }
}
	
?>






<html>
<head>
<title>Consultant Detail</title>
</head>
<body>
<?php
include "inctop.php"; 
if($err==1)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Date entered exceeds the current date.</p>";
?>

<!-- include it for calender-->
<link rel="stylesheet" type="text/css" href="style/calender/view.css" media="all">
<script type="text/javascript" src="style/calender/calendar.js"></script>
<script type="text/javascript" src="style/calender/view.js"></script>
<h1><a>Step-2</a></h1>

<div id="center" align="center">

<form action="" enctype="multipart/form-data" method="post" name="consultant_detail">

<table align="center" cellpadding="0" cellspacing="2">


<tr>
<th colspan="2" align="center"><strong><?php echo $_SESSION['project_no']?></strong>&nbsp;</th>
</tr>


<tr>
<th colspan="2" align="center"><strong>Details Of Signatory</strong>&nbsp;</th>
</tr>



<tr>
<td>First Name &nbsp;:</td>
<td><select  name="Name_Title">
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value="M/s">M/s</option>
</select>
<input name="F_Name" type="text" value="<?php echo $sfname ?>"  maxlength="20" /></td>
</tr>

<tr>
<td>Middle Name &nbsp;:</td>
<td><input name="M_Name" type="text" value="<?php echo $smname ?>"   maxlength="20" /></td>
</tr>
<tr>
<td>Last Name&nbsp;:</td>
<td><input name="L_Name" type="text" value="<?php echo $slname ?>"   maxlength="20" /></td>
</tr>
<tr>
<td>Designation&nbsp;:</td>
<td><input name="Designation" type="text" value="<?php echo $sdesignation ?>"   maxlength="20" /></td>
</tr>

<tr>
<td>Department/Section &nbsp;:</td>
<td><input name="Department" type="text" value="<?php echo $sdepartment ?>"  maxlength="20" /></td>
</tr>

<tr>
<td>Email ID&nbsp;:</td>
<td><input name="Email_Id" type="text" value="<?php echo $semailid ?>" onClick="value=''"  maxlength="30"  /></td>
</tr>

<tr>
<td>Contact No&nbsp;:</td>
<td><input name="Contact_No" type="text" value="<?php echo $scno ?>"  maxlength="10" /></td>
</tr>
<!--conatct person details-->

<tr>
<th colspan="2" align="center"><strong>Details Of Contact Person</strong></th></tr>

<tr>
<td>First Name&nbsp;:</td>
<td><select  name="C_Name_Title">
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value ="Ms">Ms</option>
</select>
<input name="C_F_Name" type="text" value="<?php echo $cfname ?>"  maxlength="20" /></td>
</tr>
<tr>
<td>Middle Name&nbsp;:</td>
<td><input name="C_M_Name" type="text" value="<?php echo $cmname ?>"  maxlength="20" /></td>
</tr>
<tr>
<td>Last Name&nbsp;:</td>
<td><input name="C_L_Name" type="text" value="<?php echo $clname ?>" maxlength="20" /></td>
</tr>
<tr>
<td>Designation&nbsp;:</td>
<td><input name="C_Designation" type="text" value="<?php echo $cdesignation ?>"   maxlength="20" /></td>
</tr>

<tr>
<td>Department/Section&nbsp;:</td>
<td><input name="C_Department" type="text" value="<?php echo $cdepartment ?>"   maxlength="20" /></td>
</tr>


<tr>
<td>Email ID&nbsp;:</td>
<td><input name="C_Email_Id" type="text" value="<?php echo $cemailid ?>" onClick="value=''"  maxlength="30"  /></td>
</tr>
<tr>
<td>Contact No&nbsp;:</td>
<td><input name="C_Contact_No" type="text" value="<?php echo $ccno ?>" maxlength="10" /></td>
</tr>

<tr>
<th colspan="2" align="center"><strong>Office Details</strong></th></tr>



<tr>
<td><strong>Received on</strong>&nbsp;:</td>
<td>
<li id="2" >
		<label class="description" for="date_2"> </label>
		<span>
			<input id="date_2_1" name="date_2_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="date_2_1">MM</label>
		</span>
		<span>
			<input id="date_2_2" name="date_2_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="date_2_2">DD</label>
		</span>
		<span>
	 		<input id="date_2_3" name="date_2_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="date_2_3">YYYY</label>
		</span>
	
		<span id="calendar_2">
			<img id="cal_img_2" class="datepicker" src="style/calender/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "date_2_3",
			baseField    : "date_2",
			displayArea  : "calendar_2",
			button		 : "cal_img_2",
			ifFormat	 : "%d/%m/%Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		
</td>
</tr>
<tr>
<td><strong>Receive/Diary No</strong>&nbsp;:</td>
<td><input name="Receive_No" type="text" value="<?php echo $receiveno ?>" onClick="value=''"  maxlength="20" /></td>
</tr>
<tr><td>
<strong>Copy to</strong>&nbsp;:</td>
<td><input name="Copy_To" type="text" value="<?php echo $copyto ?>" onClick="value=''"  maxlength="40" /></td>
</tr>
<tr><td>
<strong>Mark to</strong>&nbsp;:</td>
<td>
<select name="Mark_To">
<?php 
include "dbconnect.php";
$r=mysql_query("select logintable.emp_code ,name from logintable,personalinfo where flag like '3' and designation like 'Head of Department' and logintable.emp_code like personalinfo.emp_code");
while($ar=mysql_fetch_array($r))
{
	echo "<option value=\"".$ar['emp_code']."\">".$ar['name']."</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td>
<strong>Upload file</strong>&nbsp;:</td>
<td>
		
			<input type="file" name="image"/> 
		
		
        </td></tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="Submit" value="Submit Details" /></td>
</tr>

</table>
</form>
</div>
</body>
</html>
<?php include "incbottom.php" ?>
