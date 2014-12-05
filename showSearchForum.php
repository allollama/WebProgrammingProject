<?php
$con = mysql_connect("dbserver.engr.scu.edu","swhitcom","00000874802");
//$con = mysql_connect("localhost","root","root");
 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("sdb_swhitcom", $con);
//mysql_select_db("webProgrammingLab", $con);

$search = $_POST['search'];

$sqli = "SELECT Project,Name,Updated FROM Forum";
$result = mysql_query($sqli);

//this may not work. Might have to use 2 different php files and 2 forms.

echo "<html lang='en'><head><meta charset='utf-8'/><title> Donate </title>
        <link rel='stylesheet' type='text/css' href='myStyles.css'>
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
        <script  src='dynamicallyAdjustFooter.js' type='text/javascript'></script></head>
	   <body><header><object type='image/svg+xml' data='logo2.svg'>
       Your browser does not support SVG</object><div id='header'>
        <span id='title'>FrugalInnovation<span id='labSpan'>Lab</span></span>
        <canvas id='canvasLogo' width='50' height='15'></canvas>
        </br>Forum</div></header><nav>
            <ul>
                <li><a href='.'>Home</a></li>
                <li><a href='projects.html'>Projects</a></li>
                <li><a href='faculty.html'>The Team</a></li>
                <li><a href='donations.html'>Donate</a></li>
                <li><a href='Quiz.html'>Take a Quiz</a></li>
                <li><a href='blogpage.html'>Forum/Blog</a></li>
                <li><a href='proposals.html'>Propose a Project</a></li>
            </ul>
        </nav><main>";
echo "<table>";
while($row = mysql_fetch_array($result))
{
	if($row['Name'] == $search || $row['Project'] == $search) {
		echo "<tr><td>";
		echo "Project: " . $row['Project'] . "<br/>";
		echo "Posted by: " . $row['Name'];
		echo "<br/><br/>" . $row['Updated'] . "";
		echo "</td></tr>";
	}
}
echo "</table></main><footer id='footer'><address>Created by <a href='mailto:asehatti@scu.edu'>Ashley Sehatti</a>
        and <a href='mailto:swhitcomb@scu.edu'>Stan Whitcomb</a></address></footer></body></html>";
mysql_close($con);
?>
