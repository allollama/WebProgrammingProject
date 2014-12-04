
<?php

$date = date("m/d/Y h:ia");
$donation = $_POST['donation'];
$name = $_POST['name'];
$amount = $donation;
$message;

//$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
$con = mysql_connect("localhost","root","root");
 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
//mysql_select_db("sdb_swhitcom", $con);
mysql_select_db("webProgrammingLab", $con);

$sql = "SELECT Name FROM Donations";
if(!($result = mysql_query($sql, $con)))
	die('Error: ' . mysql_error());

$new = TRUE;
while($row = mysql_fetch_array($result)){
	if($row['Name'] == $name){
		$new = FALSE;
		break;
	}
}	

if($new) {
	//adds the info if there has not been an addition in this name
	$sql="INSERT INTO Donations (Name, Donation, Date)
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
    $amount = $donation;
	
	$sql = "UPDATE Donations SET Donation='$donation', Date='$date' WHERE Name='$name'";
	if(!mysql_query($sql, $con))
	{
		die('Error: ' . mysql_error());
	}
}


$13.30 (Level 1): Supports the wages and benefits of an undergraduate student to work for one hour on a FIL project!
$17.65 (Level 2): Supports the wages and benefits of a graduate student to work for one hour on a FIL project!
$39.95 (Level 3): Purchases one Raspberry Pi (or similar products) for the development of mobile applications, smart sensors, or other solutions for our field-based social enterprises.
$78.60 (Level 4): Covers the average cost of admittance to a FIL related conference for a faculty/staff member.
$500 (Level 5): Provides a Senior Design team with enough money to buy materials for their prototype.
$898 (Level 6): Accommodates one student’s air fare to South America to field test their prototypes with FIL university and enterprise partners.
$1,500 (Level 7): Makes you exceptionally awesome.

if ($amount < 13.30)
    $message = "";
else if ($amount < 17.65)
    $message = "You've funded an undergraduate student to work on a FIL project for one hour!";
else if ($amount < 39.95)
    $message = "You've funded a graduate student to work on a FIL project for one hour!";
else if ($amount < 78.60)
    $message = "You've funded a Raspberry Pi (or similar products) for the development of mobile applications, smart sensors, or other solutions for our field-based social enterprises!";
else if ($amount < 500)
    $message = "You've funded a faculty or staff member's admittance to a FIL related conference!";
else if ($amount < 898)
    $message = "You've funded an entire Senior Design team with enough money to buy materials for their prototype!";
else if ($amount < 1500)
    $message = "You've funded one student’s air fare to South America to field test their prototypes with FIL university and enterprise partners!";
else
    $message = "You're exceptionally awesome!";

echo "<html lang='en'><head><meta charset='utf-8'/><title> Donate </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'>
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
        <script  src='dynamicallyAdjustFooter.js' type='text/javascript'></script></head>
	   <body><header><object type='image/svg+xml' data='logo2.svg'>
       Your browser does not support SVG</object><div id='header'>
        <span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span>
        </br>Donations</div></header><nav>
            <ul>
                <li><a href='.'>Home</a></li>
                <li><a href='projects.html'>Projects</a></li>
                <li><a href='.'>The Team</a></li>
                <li><a href='donations.html'>Donate</a></li>
                <li><a href='Quiz.html'>Take a Quiz</a></li>
                <li><a href='blogpage.html'>Forum/Blog</a></li>
                <li><a href='proposals.html'>Propose a Project</a></li>
            </ul>
        </nav><main>";
echo "Thank you for donating $" . $amount . ", " . $_POST['name'];
echo $message;

echo "</main><footer><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";
mysql_close($con)
?>
