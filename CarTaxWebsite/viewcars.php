<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Car Tax Records</title>
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
<h2>View Car Tax Records</h2>
<p>
<?php
  $dbcnx = @mysql_connect('127.0.0.1', 'root', 'root');
  if (!$dbcnx) {
    exit('Unable to connect to the ' .
        'database server at this time.');
  }

  if (!@mysql_select_db('shanedoyle')) {
    exit('Unable to locate the shanedoyle ' .
        'database at this time.');
  }


$result = @mysql_query('SELECT * FROM car order by Registration');
if (!$result) {
  exit('Error performing query: ' . mysql_error());
}
if (mysql_num_rows($result)<1)
{exit ("No car records found at this time");}


echo '<table><tr>
<th>Registration</th><th>Year</th><th>Make</th><th>Engine Size</th><th>Taxed From</th><th>Taxed To</th><th>PPS</th><th>Tax Price</th></tr>';
 while ($row = mysql_fetch_array($result)) {
  $Registration=$row['Registration'];
  echo '<tr><td>' . $row['Registration'] . '</td>';
  echo '<td>' . $row['Year'] . '</td>';
  echo '<td>' . $row['Make'] . '</td>';
  echo '<td>' . $row['EngineSize'] . '</td>';
  echo '<td>' . $row['TaxedFrom'] . '</td>';
  echo '<td>' . $row['TaxedTo'] . '</td>';
  echo '<td>' . $row['PPS'] . '</td>';
  echo '<td>' . $row['TaxPrice'] . '</td>';
}
echo '</table>';
?>
</p>
</div>
</div>
</body>
</html>