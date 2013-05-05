<?php
session_start();
	include "dbconnect.php";
if(isset($_GET['sidebar_view']))
{
	$_SESSION['status_project_no']=$_GET['sidebar_view'];
    echo "<script>window.location.href=\"project_status.php\"</script>";
}



echo " <meta name=\"description\" content=\"website description\" />
  <meta name=\"keywords\" content=\"website keywords, website keywords\" />
  <meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1252\" />
  <link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\" title=\"style\" />
  <div id=\"main\">
   <div id=\"header\">
        <div id=\"logo\">
	     <div id=\"logo_text\">
          <h1><u>Research and Consultancy </u></br>MNNIT</h1>
          <h2></h2>
        </div>
      </div>
      <div id=\"menubar\">
        <ul id=\"menu\">
         ";
		  
		  if(isset($_SESSION['emp_code']))
		  {
          echo "<li><a href=\"logout.php\">Log Out</a></li><li><a href=\"home.php\">Home</a></li>";
		  $inc_ec=$_SESSION['emp_code'];
		  include "dbconnect.php";
		  $q=mysql_query("select * from consultancy.notify where  emp_code like '$inc_ec' and flag like '0'");
		  
		  echo "<li><a href=\"wall.php\">Wall(".mysql_num_rows($q).")</a></li>";
		  
		  }
        echo "<li><a href=\"status.php\">View Projects Received</a></li>";
		
		echo "</ul>
      </div>
    </div>
    <div id=\"site_content\">
      <div class=\"sidebar\">
        <h3><u>Latest Projects</u></h3>";
        

	$inc_q=mysql_query("select * from project_letter_detail,project_contact_detail where project_contact_detail.project_no = project_letter_detail.project_no order by project_letter_detail.time desc limit 0,2") or die(mysql_error());
	if($inc_q)
	while($inc_array=mysql_fetch_array($inc_q))
	{
		$str=substr($inc_array['subject'],0,30);
		echo "<h4>New Testing Received</h4>";
    echo "<h5>".$inc_array['rec_date']."</h5>
        <p>".$str."<br /><a href=\"?sidebar_view=".$inc_array['project_no']."\">Read More</a></p>
        <br />";
	}
	
    echo "  </div>
      <div id=\"content\">";
?>