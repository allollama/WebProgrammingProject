<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");  
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_swhitcom", $con);

$sql="INSERT INTO Proposals (ProjName, Name, Summary)
VALUES
('$_POST[project]','$_POST[name]','$_POST[summary]')";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
echo "<html lang='en'><head><meta charset='utf-8'/><title> Proposals </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'></head>
	   <body><header><span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span></br>
        Proposals</header><main>";
echo "Proposal submitted.";
echo "</main><footer><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";

mysql_close($con)
?>
