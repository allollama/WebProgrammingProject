<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_swhitcom", $con);

$result = mysql_query("SELECT * FROM Forum");

echo "<html lang='en'><head><meta charset='utf-8'/><title> Donate </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'></head>
	   <body><header><span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span></br>
        Forum</header><main>";

echo "<table border='1' width='100%'>";

while($row = mysql_fetch_array($result))
{
	echo "<tr><td style='padding:1em'>";
	echo "Project: " . $row['Project'] . " Posted by: " . $row['Name'];
	echo "<br/>" . $row['Updated'] . "";
	echo "</td></tr>";
}
echo "</table></main><footer><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";

mysql_close($con);
?>
