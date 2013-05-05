<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

include "dbconnect.php";
include "numbers-words.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Receipt Form</title>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
</head>

<body onload="window.print() "> 
<h2 align="center" class="style1"><u>RESEARCH &amp; CONSULTANCY CELL</u></h2>
<h2 align="center"><strong><u> Moti Lal Nehru National Institute of Technology</u></strong></h2>
<p align="center"><strong>Allahabad-211004</strong></p>
<p align="center">&nbsp;</p>
<?php



//PAGE ACCESS RULES

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if(!isset($_SESSION['project_no'])  || $_SESSION['flag']!=7)
{
	 echo "<script>alert(\"you are not allowed to enter this page !! \")</script>";
	  
	 die(" Error ,Turn On Your Javascript !!");	
}

//PAGE ACCESS RULES










$emp_code=$_SESSION['emp_code'];
$project_no=$_SESSION['project_no'];












$sq1="SELECT * FROM project_receipt_detail  WHERE project_no =\"".$project_no."\"";
$result1 = mysql_query($sq1);
$array1=mysql_fetch_array($result1);

$sq2="SELECT * FROM project_letter_detail  WHERE project_no =\"".$project_no."\"";
$result2 = mysql_query($sq2);
$array2=mysql_fetch_array($result2);

$sq3="SELECT * FROM project_bill_detail  WHERE project_no =\"".$project_no."\"";
$result3 = mysql_query($sq3);
$array3=mysql_fetch_array($result3);

$sq4="SELECT * FROM project_cheque_detail  WHERE project_no =\"".$project_no."\"";
$result4 = mysql_query($sq4);
$array4=mysql_fetch_array($result4);

$sq5="SELECT * FROM project_bill_amount  WHERE project_no =\"".$project_no."\"";
$result5 = mysql_query($sq5);
$array5=mysql_fetch_array($result5);

$sq6="INSERT INTO project_receipt_detail (project_no , bill_no) 
VALUES ('".$array5['project_no']."','".$array5['bill_no']."')";
//print_r($array5);





//UPDATE
if(isset($_SESSION['project_no'])  || $_SESSION['flag']==7)
{
	
	
	$cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_track_record SET `12`='1' , `12_time`='$cur_time' WHERE project_no = '$project_no' "); // Stage Track Record
		mysql_query("UPDATE consultancy.project_stages SET `flag`='12'  WHERE project_no = '$project_no' "); // Stage Track Record

			


}

?>

<table width="1114" border="0">
  <tr>
    <td width="40">&nbsp;</td>
    <td><strong>R/No.</strong></td>
    <td><u><?php echo $array1['receipt_no']?></u></td>
    <td width="199">&nbsp;</td>
    <td colspan="2"><div align="right"><strong>Date</strong> <u><?php echo $array1['time']?></u></div></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Received from Shri/M/s: </strong></td>
    <td colspan="5"><u> <?php echo $array2['organization']?> </u></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><strong>The Sum of Rupees in words:</strong></td>
    <td colspan="5"><u> <?php echo number_to_words(($array5['amount']) +($array5['service_tax']));?></u> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Vide Cheque / Bank Draft No. / Cash :</strong></td>
    <td colspan="2"><u><?php echo $array4['cheque_no']?></u> </td>
	<td><strong>Dated</strong> <u> <?php echo($array4['dated'])?> </u></td>
	<td width="101">&nbsp;</td>
    <td width="60" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="22" colspan="5">&nbsp;</td>
    <td colspan="2" rowspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="22" colspan="2"><strong>Testing Amount : </strong></td>
    <td colspan="2">Rs <u><?php echo($array5['amount'])?> </u></td>
    <td width="414">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Service Tax : </strong></td>
    <td colspan="2">Rs <u><?php echo($array5['service_tax'])?> </u></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Total :</strong></td>
    <td colspan="2">Rs <u><?php echo(($array5['amount']) +($array5['service_tax']))?> </u> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td width="58">&nbsp;</td>
    <td width="199" height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td><div align="right"><strong>Accountant's Signature </strong></div></td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p align="center">&nbsp;</p>


<div align="center">
<form action="home.php" method="post">
<input type="submit" name="back" value="BACK" onload="window.print()" />
</form>
</div>
</body>
</html>
