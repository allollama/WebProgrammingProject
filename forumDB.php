<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
     
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_swhitcom", $con);

$sql="INSERT INTO Forum (Project, Name, Updated)
VALUES
('$_POST[project]','$_POST[name]','$_POST[update]')";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}

echo "<html lang='en'><head><meta charset='utf-8'/><title> Donate </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'></head>
	   <body><header><span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span></br>
        Forum</header><main>";
echo "Your submission was successful. ";
echo "<a href='showForum.php'><input type='button' value='See Forum'/></a>";
echo "</main><footer><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";


mysql_close($con)
?>
