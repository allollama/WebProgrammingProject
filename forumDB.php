<?php
//$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
$con = mysql_connect("localhost","root","root");
 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
//mysql_select_db("sdb_swhitcom", $con);
mysql_select_db("webProgrammingLab", $con);

$sql="INSERT INTO Forum (Project, Name, Updated)
VALUES
('$_POST[project]','$_POST[name]','$_POST[update]')";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}

echo "<html lang='en'><head><meta charset='utf-8'/><title> Donate </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'></head>
	   <body><header><object type='image/svg+xml' data='logo2.svg'>
       Your browser does not support SVG</object><div id='header'>
        <span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span>
        </br>Forum</div></header><nav>
            <ul>
                <li><a href='.'>Home</a></li>
                <li><a href='.'>Projects</a></li>
                <li><a href='.'>The Team</a></li>
                <li><a href='donations.html'>Donate</a></li>
                <li><a href='Quiz.html'>Take a Quiz</a></li>
                <li><a href='blogpage.html'>Forum/Blog</a></li>
                <li><a href='proposals.html'>Propose a Project</a></li>
            </ul>
        </nav><main>";
echo "Your submission was successful. ";
echo "<a href='showForum.php'><input type='button' value='See Forum'/></a>";
echo "</main><footer><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";


mysql_close($con)
?>
