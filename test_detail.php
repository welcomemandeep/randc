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


if(isset($_SESSION['test_info_loaded']))
{
	 echo "<script>alert(\"You have entered the test details so you can't go back !! \")</script>";
     echo "<script>window.location.href=\"consultant_detail.php\"</script>";
	 die("Turn on your javascript");
}



//Access rules 

$cur_date=date("Y-m-d");

$organization="Organization name";
$city="Allahabad";
$emailid="";
$letterno="Letter_No";
$subject="Subject_Of_Letter";
$testing="Testing_Requested";
$pincode="Pin_Code";



	if(isset($_POST['Submit']))
{
 // Variables being initalized 
 $organization=trim($_POST['Organization']);
 $street=trim($_POST['Street']);
 $city=trim($_POST['City']);
 $state=trim($_POST['State']);
 $pincode=trim($_POST['Pin_Code']);
 $emailid=trim($_POST['Email_Id']);
 $letterno=trim($_POST['Letter_No']);
 $mm = trim($_POST['date_1_1']);
 $dd = trim($_POST['date_1_2']);
 $yyyy= trim($_POST['date_1_3']);
 $date1 = $yyyy . '-' . $mm. '-' . $dd;
 $subject=trim($_POST['Subject_Of_Letter']);
 $testing=trim($_POST['Testing_Requested']);
 
 //error checking
 
 $err=0;
 if($date1>$cur_date)
  $err=4;
  
  if( $organization == "" || $organization == "Organization" )
 	$err=1;

  if( $city == "City"||$pincode=="Pin_Code" ||$letterno=="Letter_No" || $subject=="Subject_Of_Letter" || $testing=="Testing_Requested" )
 	$err=2;
	
 if( $street==""||$city==""|| $state==""||$pincode==""||$emailid==""||$letterno==""||$date1==""||$subject==""||$testing=="" )
	 $err=3;

 
 if($err==0)
 {
 	

 $num=mysql_num_rows(mysql_query("select * from project_letter_detail where 1 like 1"));
 $project_no=date("Y/m/").($num+1);

 
 $query1=mysql_query("INSERT INTO project_letter_detail(organization,street,city,state,pin_code,email_id,letter_no,date,subject,testing,project_no) VALUES ('$organization','$street','$city','$state','$pincode','$emailid','$letterno','$date1','$subject','$testing','$project_no')")or die(mysql_error());
  mysql_close();
  $_SESSION['test_info_loaded']=1;
  $_SESSION['project_no']=$project_no;
   echo "<script>window.location.href=\"consultant_detail.php\"</script>";
   die("Turn on your javascript");

 }

}




	
?>

<html>
<head>
<style>
.textbox1 {
	width:100%;
	height:30;
}
.textbox2 {
	width:100%;
}
</style>
</head>
<body>
<?php include "inctop.php"; 
if($err==4)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Date entered exceeds the current date.</p>";
if($err==1 || $err==2 || $err==3)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! One or more Details are missing.</p>"; 

?>
<link rel="stylesheet" type="text/css" href="style/calender/view.css" media="all">
<script type="text/javascript" src="style/calender/calendar.js"></script>
<script type="text/javascript" src="style/calender/view.js"></script>
<h1><a>STEP-1</a></h1>
<form action="" method="post" name="test_detail">
<table align="center" cellpadding="0" cellspacing="2">
<tr>
<th colspan="2"><strong>Organization</strong>&nbsp;</th>
</tr>

<tr>

<td align="center" colspan="2"><input name="Organization" type="text" value="<?php echo $organization ?>" onClick="value=''"  class="textbox1" /></td>
</tr>

<tr>
<th colspan="2" align="center"><strong>Company's Contact Information</strong></th>
</tr>

<tr>
<td>Street&nbsp;:</td>
<td>
<text area><textarea name="Street" id="textarea" value="<?php echo $street ?>" cols="20" rows="3"  class="textbox2" />
</textarea></text area>
</td>
</tr>
<tr>
<td>City&nbsp;:</td>
<td><input name="City" type="text" value="<?php echo $city?>" maxlength="30" onClick="value=''"/></td>
</tr>
<tr>
<td>State&nbsp;:</td>
<!--<td><input name="State" type="text" value="State" onClick="value=''"  maxlength="20" /></td>
-->
<td>
<select class="element select medium" id="State" name="State"> 
<option value="Uttar Pradesh" selected="selected">Uttar Pradesh</option>
<?php
include "dbconnect.php"; 
$query=mysql_query("SELECT * FROM states");
while($result=mysql_fetch_array($query))
{	
	echo "<option value=\"".$result['name']."\">".$result['name']."</option>";
}
?>
</select>
</td>		
</tr>


<tr>
<td>Pin Code&nbsp;:</td>
<td><input name="Pin_Code" type="text" value="<?php echo $pincode?>" onClick="value=''"  maxlength="6" /></td>
</tr>


<tr>
<td>Email ID&nbsp;:</td>
<td><input name="Email_Id" type="text" value="<?php echo $emailid?>" onClick="value=''"  maxlength="30"  /></td>
</tr>


<tr>
<th colspan="2" align="center"><strong>Letter Details</strong></th>
</tr>



<tr>
<td><strong>Letter No</strong>&nbsp;:</td>
<td><input name="Letter_No" type="text" value="<?php echo $letterno?>" onClick="value=''"  maxlength="20" /></td>
</tr>

<tr>
<td><strong>Dated </strong>&nbsp;:</td>
<td>
<li id="1" >
		<label class="description" for="date_1"> </label>
		<span>
			<input id="date_1_1" name="date_1_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="date_1_1">MM</label>
		</span>
		<span>
			<input id="date_1_2" name="date_1_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="date_1_2">DD</label>
		</span>
		<span>
	 		<input id="date_1_3" name="date_1_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="date_1_3">YYYY</label>
		</span>
	
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="style/calender/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "date_1_3",
			baseField    : "date_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%d/%m/%Y",
			onSelect	 : selectDate
			});
			
		</script>
        
		 
		</li>		
</td>
</tr>

<tr><td><strong>Subject of Letter</strong>&nbsp;:</td>
<td><input name="Subject_Of_Letter" type="text" class="textbox2" onClick="value=''" value="<?php echo $subject?>"  maxlength="100" /></td>
</tr>

<tr><td><strong>Testing/Consultancy Requested</strong>&nbsp;:</td>
<td><input name="Testing_Requested" type="text" class="textbox2" onClick="value=''" value="<?php echo $testing?>"  maxlength="100" /></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" value="Submit Details"  name="Submit"/></td>
</tr>
</table>
</form>
<?php include "incbottom.php" ?>
</body>
</html>

