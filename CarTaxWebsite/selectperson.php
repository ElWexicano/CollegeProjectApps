<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Person by PPS Query Records</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<div id = "header">
<h1>Online Car Tax Database Access</h1>
</div>
<div id = "main">
<div id = "navigation">
		<ul>
			<li><a href="index.html"><span>Home</span></a></li>
			<li><a href="home.php"><span>View All Records</span></a></li>
			<li><a href="selectperson.html"><span>Seach Personal Records</span></a></li>
			<li><a href="search.php"><span>Extensive Search</span></a></li>
			<li><a href="insertpeople.php"><span>Insert Personal Record</span></a></li>
			<li><a href="edit.php"><span>Edit Personal Records</span></a></li>
			<li><a href="insertcar.php"><span>Insert Car Record</span></a></li>
			<li><a href="viewcars.php"><span>View Car Records</span></a></li>
			<li><a href="editcars.php"><span>Edit Car Records</span></a></li>
		</ul>
</div>
<div id = "content">
<?php  $dbcnx = @mysql_connect('localhost', 'root', 'root');
  if (!$dbcnx) {
    exit('<p>Unable to connect to the ' .
        'database server at this time.</p>');
  }

  if (!@mysql_select_db('shanedoyle')) {
    exit('<p>Unable to locate the shanedoyle ' .
        'database at this time.</p>');
  }
?>
<h2>Person by PPS Query Records</h2>
<p>
<?php
$PPS=$_POST['PPS'];
$result = @mysql_query("SELECT * FROM people where PPS = '$PPS'");
if (!$result) {
  exit('Error performing query: ' . mysql_error());
}
$row = mysql_fetch_array($result);
if (!$row) {
   exit('No matching records found');
}

echo '<b>PPS: </b>' . $row['PPS'] . '<br/>';
echo '<b>First Name: </b>' . $row['FirstName'] . '<br/>';
echo '<b>Last Name: </b>' . $row['LastName'] . '<br/>';
echo '<b>Street: </b>' . $row['Street'] . '<br/>';
echo '<b>Town: </b>' . $row['Town'] . '<br/>';
echo '<b>County: </b>' . $row['County'] . '<br/>';
echo '<b>Phone: </b>' . $row['Phone'] . '<br/>';
?>
</div>
</div>
</body>
</html>