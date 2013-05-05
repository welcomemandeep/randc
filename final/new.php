<?php 
session_start();
if(isset($_GET['sidebar_view']))
{
	$_SESSION['project_no']=$_GET['sidebar_view'];
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
          <h1><u>Research and Consultancy </u></br><br />MNNIT</h1>
          <h2></h2>
        </div>
      </div>
      <div id=\"menubar\">
        <ul id=\"menu\">
          <li><a href=\"examples.html\">Status</a></li>
          <li><a href=\"page.html\">Pending Projects</a></li>
          <li><a href=\"advance.php\">New Projects</a></li>";
		  
		  if(isset($_SESSION['emp_code']))
          echo "<li><a href=\"home.php\">Home</a></li>
		  <li><a href=\"logout.php\">Log Out</a></li>";
		  
        echo "</ul>
      </div>
    </div>
    <div id=\"site_content\">
      <div class=\"sidebar\">
        <h3>Latest News</h3>";
        
	include "dbconnect.php";
	$inc_q=mysql_query("select * from consultancy.project_work_detail where 1 like 1 order by time desc limit 0,2");
	if($inc_q)
	while($inc_array=mysql_fetch_array($inc_q))
	{
		$str=substr($inc_array['subject_of_letter'],0,30);
		echo "<h4>New Testing Received</h4>";
    echo "<h5>".$inc_array['rec_date']."</h5>
        <p>".$str."<br /><a href=\"?sidebar_view=".$inc_array['time']."\">Read More</a></p>
        <br />";
	}
	
    echo "  </div>
      <div id=\"content\">";
?>