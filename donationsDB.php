
<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("sdb_swhitcom", $con);

$sql = "SELECT Name FROM Donations";
if(!($result = mysql_query($sql, $con)))
	die('Error: ' . mysql_error());

$new = TRUE;
while($row = mysql_fetch_array($result)){
	if($row['Name'] == $_POST['name']){
		$new = FALSE;
		break;
	}
}	




$date = date("m/d/Y h:ia");
$donation = $_POST['donation'];
$name = $_POST['name'];

if($new) {
	//adds the info if there has not been an addition in this name
	$sql="INSERT INTO Donations (Name, Donation, Time)
	VALUES
	('$name','$donation','$date')";
	if (!mysql_query($sql,$con))
	{
		die('Error: ' . mysql_error());
	}
}
else {
	//updates the donation and time for a previous donation.
	//adds to previous to store total amount donated.
	$sql = "SELECT Donation FROM Donations WHERE Name='$name'";
	if(!($result = mysql_query($sql, $con)))
	{
		die('Error: ' . mysql_error());
	}
	
	$row = mysql_fetch_array($result);
	$totaldonation = $row['Donation'];
	$donation = $donation + $totaldonation;
	
	$sql = "UPDATE Donations SET Donation='$donation', Time='$date' WHERE Name='$name'";
	if(!mysql_query($sql, $con))
	{
		die('Error: ' . mysql_error());
	}
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
