<?php
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);
include "dbconnect.php";

$q="select * from consultancy.project_letter_detail where project_no like '100'";
$query=mysql_query($q) or die(mysql_error());
$array=mysql_fetch_array($query);// or die(mysql_error());

$q1="select * from consultancy.project_contact_detail where project_no like '$projectno'";
$query1=mysql_query($q1) or die(mysql_error());
$array1=mysql_fetch_array($query1);// or die(mysql_error());

$q2="select * from consultancy.project_bill_amount where project_no like '100'";
$query2=mysql_query($q2) or die(mysql_error());
$array2=mysql_fetch_array($query2);// or die(mysql_error());

$q3="select * from consultancy.project_cheque_detail where project_no like '$projectno'";
$query3=mysql_query($q3) or die(mysql_error());
$array3=mysql_fetch_array($query3);// or die(mysql_error());

$q4="select * from consultancy.project_advance_detail where project_no like '$projectno'";
$query4=mysql_query($q4) or die(mysql_error());
$array4=mysql_fetch_array($query4);// or die(mysql_error());

$q5="select * from consultancy.project_track_record where project_no like '$projectno'";
$query5=mysql_query($q5) or die(mysql_error());
$array5=mysql_fetch_array($query5);// or die(mysql_error());

$q6="select * from consultancy.standard_rates";
$query6=mysql_query($q6) or die(mysql_error());
$array6=mysql_fetch_array($query6);// or die(mysql_error());

$q7="select * from consultancy.project_official_detail where project_no like '$projectno'";
$query7=mysql_query($q7) or die(mysql_error());
$array7=mysql_fetch_array($query7);// or die(mysql_error());

$q8="select personalinfo.name from project_team_detail,project_letter_detail,personalinfo where project_team_detail.project_no = project_letter_detail.project_no and project_team_detail.emp_code = personalinfo.emp_code and project_letter_detail.project_no like '100'";
$query8=mysql_query($q8) or die(mysql_error());
$i=0;
$count=0;
while($row=mysql_fetch_array($query8))
{
$name[$i]=$row['name'];
$i=$i+1;
}
$count=$i;
mysql_close();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Proforma Form</title>
</head>

<body>
<h2 align="center"><u>RESEARCH & CONSULTANCY CELL</u></h2>
<h2 align="center"><u>Moti Lal Nehru National Institute of Technology, Allahabad</u></h2>
<h2 align="center"><U>Proforma for Testing/ Testing cum Consultancy/ Consultancy Works</U></h2>


<table width="1091" border="0">
  <tr>
    <td colspan="5">&nbsp; <strong>Letter No</strong>:- <u><?php echo $array['letter_no']?></u> &nbsp;&nbsp;&nbsp;</td>
    <td width="278"><div align="center"><strong>Dated </strong> :- <u><?php echo $array['date']?></u></div></td>
    <td width="63">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="231">&nbsp;</td>
    <td colspan="3" rowspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td width="47"><div align="right"><strong>1.</strong></div></td>
    <td width="239"><strong>Name of Department</strong>&nbsp;:</td>
    <td><u><?php echo $array1['s_department']?></u> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>2.</strong></div></td>
    <td><strong>Name of the Project</strong>&nbsp;:</td>
    <td><u><?php echo $array['subject']?></u> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>3.</strong></div></td>
    <td><strong> Sponsoring Agency</strong>&nbsp;:</td>
    <td><u><?php echo $array['organization']?></u></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>4.</strong></div></td>
    <td colspan="3"><strong>Category of Project </strong>&nbsp;(Strike Off which is not applicable)</td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><div align="center">(a) Testing </div></td>
    <td>(b) Testing cum Consultancy</td>
	 <td>(c) Design Consultancy</td>
	  <td>&nbsp;</td>
	   <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>5.</strong></div></td>
    <td><strong>Total Fee Charged</strong>&nbsp;: </td>
    <td>Rs &nbsp;<u><?php echo $array2['amount']+$array2['service_tax']?></u></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td>( <strong>Testing Fee</strong>&nbsp;: Rs &nbsp;<u><?php echo $array2['amount']?></u> </td>
    <td><strong>Service Tax</strong> ( <u><?php echo $array6['rate']?></u>% )&nbsp;: Rs. <u><?php echo $array2['service_tax']?></u></td>
	 <td><strong>Interest on (ST)</strong>&nbsp;: Rs <u>450000</u> ) </td>
	  <td>&nbsp;</td>
	   <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>6.</strong></div></td>
    <td><strong>Details of Cheque/ Draft enclosed</strong>&nbsp;:</td>
    <td><u><?php echo $array3['cheque_no']; echo $array['drawee_bank'];?></u> </td>
    <td width="202">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>7.</strong></div></td>
    <td><strong> Name of Team Involved </strong>&nbsp;: </td>
    <td>1. <strong>Principal Investigator (PI)</strong>&nbsp;:&nbsp;</td>
    <td><u><?php
	$i=0;
	if($i<$count)
	{    
	echo $name[$i];
	$i=$i+1; }?></u></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><table width="639" border="0">
      <tr>
        <td width="53">&nbsp;</td>
        <td width="102" height="26">2. <strong>Member</strong>&nbsp;:</td>
        <td width="165"><u><?php
	if($i<$count)
	{    
	echo $name[$i];
	$i=$i+1; }
	else echo "NA" ?></u> </td>
        <td width="118">3. <strong>Member</strong>&nbsp;:</td>
        <td width="167"><u><?php
	if($i<$count)
	{    
	echo $name[$i];
	$i=$i+1;  } 
	else echo "NA" ?></u></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>4. <strong>Member</strong>&nbsp;:</td>
        <td><u><?php
	if($i<$count)
	{    
	echo $name[$i];
	$i=$i+1;  }
	else echo "NA" ?></u></td>
        <td>5. <strong>Member</strong>&nbsp;:</td>
        <td><u><?php
	if($i<$count)
	{    
	echo $name[$i];
	$i=$i+1; }
	else echo "NA"; ?></u></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Signature of Head of Department </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Signature(with date) of PI</strong></td>
  </tr>
</table>
  <hr style="border:dashed #000000; border-width:1px 0 0; height:0;">

  <table width="918" border="0">
      <tr>
        <td width="8">&nbsp;</td>
        <td width="95"><div align="center"><strong>Encl</strong>&nbsp;: </div></td>
        <td width="273">(i)Letter received from the party</td>
        <td colspan="2">(iii)DD/Cheque &nbsp;:&nbsp;&nbsp;&nbsp;<u><?php echo $array3['cheque_no']?></u></td>
    </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td> (ii)Bill raised to the part/ firm </td>
        <td colspan="2">(iv)<u></u></td>
    </tr>
      
</table>
 <hr style="border:dashed #000000; border-width:1px 0 0; height:0;">
 <h4 align="left"><?php $i=1; while($i<12)
{
echo "&nbsp;";
$i++;
}?><u><strong>For Use of Dean (R&C) Office Only:</strong></u></h4>
 
 <table width="866" border="0">
   <tr>
     <td width="47"><div align="right"><strong>1.</strong></div></td>
     <td width="191"><strong>Project Number alloted</strong> : </td>
     <td width="197"><u></u></td>
     <td width="128">&nbsp;</td>
     <td width="99"><strong>Dated</strong> :-</td>
     <td width="178"><u></u></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><div align="right"><strong>2.</strong></div></td>
     <td><strong>Advance Taken</strong> :</td>
     <td> (a) <strong>Amount</strong>&nbsp;:</td>
     <td>Rs. <u></u></td>
     <td>(b) <strong>Dated</strong> :-</td>
     <td><u></u></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><div align="right"><strong>3.</strong></div></td>
     <td><strong>Advance Settled</strong> :</td>
     <td>(a) <strong>Refund/ Reimbursement</strong> :</td>
     <td>Rs. <u>567890</u></td>
     <td>(b) <strong>Dated</strong> :-</td>
     <td><u></u></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="2">&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><div align="right"><strong>4.</strong></div></td>
     <td colspan="2"><strong>Project Report Submitted by PI to Party on</strong> :</td>
     <td><u></u></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td><div align="right"><strong>5.</strong></div></td>
     <td><strong>Distribution Sent by PI on</strong> :</td>
     <td><u>02/02/2011</u></td>
     <td>&nbsp;</td>
     <td><strong>Settled on </strong>:</td>
     <td><u>02/02/2011</u></td>
   </tr>
 </table>
 <table width="1058" border="0">
   <tr>
     <td width="40">&nbsp;</td>
     <td width="605">&nbsp;</td>
     <td width="399">&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><strong>Signature of Office Staff</strong></td>
     <td><strong>Signature of Dy.Dean(R&amp;C)/ Dean(R&amp;C) </strong> </td>
   </tr>
 </table>
</body>
</html>
