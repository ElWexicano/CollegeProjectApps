<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Extensive Query</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<div id = "header">
<h1>Online Car Database Access</h1>
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
<div id = "content">
<h2>Extensive Query</h2>
<p>
<?php  $dbcnx = @mysql_connect('localhost', 'root', 'root');
  if (!$dbcnx) {
    exit('Unable to connect to the ' .
        'database server at this time.');
  }

  if (!@mysql_select_db('shanedoyle')) {
    exit('Unable to locate the shanedoyle ' .
        'database at this time.');
  }

$select = 'select * ';
$from = ' from car left join people on car.PPS = people.PPS';
$where = ' where 1';


$county = $_POST['county'];
if ($county != '')
{
  $where .= " and county ='$county'";
}

$Registration = $_POST['Registration'];
if ($Registration != '')
{
  $where .= " and Registration like '%$Registration%'";
}

$result = @mysql_query($select . $from . $where);
if (!$result) {
  exit('Error performing query: ' . mysql_error());
}
$row = mysql_fetch_array($result);
if (!$row)
{exit ("No car records found at this time");}

echo '<table><tr>
<th>Registration</th><th>Year</th><th>Engine Size</th><th>Owners PPS</th><th>Owners Surname</th><th>Owners County</th><th>Owners Phone</th></tr>';
do {
  echo '<tr><td>' . $row['Registration'] . '</td>';
  echo '<td>' . $row['Year'] . '</td>';
  echo '<td>' . $row['EngineSize'] . '</td>';
  echo '<td>' . $row['PPS'] . '</td>';
  echo '<td>' . $row['LastName'] . '</td>';
  echo '<td>' . $row['County'] . '</td>';
  echo '<td>' . $row['Phone'] . '</td></tr>';
} while ($row = mysql_fetch_array($result));
echo '</table>';
?>
</p>
</div>
</div>
</body>
</html>