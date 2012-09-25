<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update/Delete a Personal Record</title>
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
<h2>Update/Delete a Personal Record</h2>
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


$result = @mysql_query('SELECT * FROM people order by PPS');
if (!$result) {
  exit('Error performing query: ' . mysql_error());
}
if (mysql_num_rows($result)<1)
{exit ("No personal records found at this time");}


echo '<table><tr>
<th>PPS</th><th>First Name</th><th>Last Name</th><th>Street</th><th>Town</th><th>County</th><th>Phone</th></tr>';
 while ($row = mysql_fetch_array($result)) {
  $PPS=$row['PPS'];
  echo '<td>' . $row['PPS'] . '</td>';
  echo '<td>' . $row['FirstName'] . '</td>';
  echo '<td>' . $row['LastName'] . '</td>';
  echo '<td>' . $row['Street'] . '</td>';
  echo '<td>' . $row['Town'] . '</td>';
  echo '<td>' . $row['County'] . '</td>';
  echo '<td>' . $row['Phone'] . '</td>';
  echo '<td>' . "<a href='editperson2.php?PPS=$PPS'>Update</a>" . '</td>';
  echo '<td>' . "<a href='deleteperson2.php?PPS=$PPS'>Delete</a>". '</td></tr>';
}
echo '</table>';


?>
</p>
</div>
</div>
</body>
</html>