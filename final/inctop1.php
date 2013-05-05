<?php 

echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\" title=\"style\" />
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
          echo " <li><a href=\"logout.php\">Log Out</a></li>
		  <li><a href=\"home.php\">Home</a></li>";
		  else 
		  echo " <li><a href=\"login.php\">Login</a></li>";
		  
        echo "   <li><a href=\"status.php\">View Projects received</a></li>
      </div>
    </div>
    <div id=\"site_content\">
      <div id=\"content\">";
?>