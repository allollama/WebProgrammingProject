<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
// mysql_connect("dbserver.engr.scu.edu","username","password");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_swhitcom", $con);

$result = mysql_query("SELECT * FROM Forum");

echo "<table border='1'>
<tr>
<th>Project</th>
<th>Update</th>
</tr>";

while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['Project'] . "</td>";
	echo "<td>" . $row['Updated'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysql_close($con);
?>
