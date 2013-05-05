<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);


if(!isset($_SESSION['status_project_no']))
 {
    echo "<script>window.location.href=\"status.php\"</script>";
 }
 
 
$project_no= $_SESSION['status_project_no'];
 
include "dbconnect.php"; 
$ld_query=mysql_query("select * from consultancy.project_letter_detail where project_no like '$project_no'") or die(mysql_error());
$ld_array=mysql_fetch_array($ld_query);

$od_query=mysql_query("select * from consultancy.project_official_detail where project_no like '$project_no'") or die(mysql_error());
$od_array=mysql_fetch_array($od_query);

$cd_query=mysql_query("select * from consultancy.project_contact_detail where project_no like '$project_no'") or die(mysql_error());
$cd_array=mysql_fetch_array($cd_query);

$st=mysql_query("select description,time from project_stages,stage_description where project_no like '$project_no' and project_stages.flag=stage_description.flag ") or die(mysql_error());
$st_array=mysql_fetch_array($st);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Project Report</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style1.css" title="style" />

<style type="text/css">
<!--
    .resize {
    width: 300px;
    height : auto;
    }

    .resize {
    width: auto;
    height : 600px;
    }
-->
</style>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><u>Research and Consultancy </u></br><br />
MNNIT</h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <?php 
		  if(isset($_SESSION['emp_code']))
          echo "<li><a href=\"logout.php\">Log Out</a></li><li><a href=\"home.php\">Home</a></li>";
		  else 
		  echo "<li><a href=\"login.php\">Login</a></li>";
     	  ?>
          <li><a href="status.php">View Projects Received</a></li>
         </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3 align="center"><strong><u>PROJECT SUMMARY</u></strong></h3>
        
        <h4 align="center"><strong><u>Organization</u></strong></h4>
        <h4 align="center"><?php echo $ld_array['organization']?></h4>
        <p align="center"><strong><?php echo $ld_array['street'].","?><br />
<?php echo $ld_array['city']?><br />
<?php echo $ld_array['state']."-".$ld_array['pin_code'] ?></strong></p>
               
        
        <h4 align="center"><strong><u>DEPARTMENT</u></strong></h4>
        <h5 align="center"><?php echo $ld_array['date']?></h5>
        <p align="center"><?php echo $od_array['mark_to']?></p>

        <h4 align="center"><strong><u>SIGNATORY</u></strong></h4>
        <p align="center"><strong><?php echo $cd_array['s_title']." ".$cd_array['s_first_name'].$cd_array['s_middle_name']." ".$cd_array['s_last_name']?></strong>
        <br /><?php echo $cd_array['s_designation']?><br />
<?php echo $cd_array['s_department']."."?>
        </p>
        
                <h4 align="center"><strong><u>STATUS</u></strong></h4>
        <h5 align="center"><?php echo $st_array['time']?></h5>
        <p align="center"><?php echo $st_array['description']?>
        </p>

       
		       
        </div>
 
<div id="content"> 
      
 <!-- insert the page content here -->
<h2 align="center"><u>PROJECT NO : <?php echo $project_no;?></u></h2>

<img  align="middle" src="<?php echo $od_array['address_of_scan_image'] ?>" alt="Project Scanned Image" name="project_scan_image" width="960" height="1280" id="project_scan_image" class="resize" />


    <?php 
  include "incbottom.php";
  ?>
  </body>
</html>
