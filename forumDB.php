<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
// mysql_connect("dbserver.engr.scu.edu","username","password"); 
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
echo "1 record added";

mysql_close($con)
?>
