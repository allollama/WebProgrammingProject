<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_swhitcom", $con);

$date = date("m/d/Y h:ia");

$sql="INSERT INTO Donations (Name, Donation, Time)
VALUES
('$_POST[name]','$_POST[donation]','$date')";

if (!mysql_query($sql,$con))
{
	die('Error: ' . mysql_error());
}
echo "<html lang='en'><head><meta charset='utf-8'/><title> Donate </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'></head>
	   <body><header><span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span></br>
        Donations</header><main>";
echo "Thank you for donating " . $_POST['name'];
echo "</main><footer><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";

mysql_close($con)
?>
