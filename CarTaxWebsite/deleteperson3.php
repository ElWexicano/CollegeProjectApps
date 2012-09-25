<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete a Personal Record Result</title>
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
</div>
<div id = "content">
<h2>Delete a Personal Record Result</h2>
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


$PPS = $_POST['PPS'];

$sql1 ="update car
        set PPS = null
        where PPS='$PPS'";
$sql2 ="delete from people
       where PPS='$PPS'";

$ok1 = @mysql_query($sql1);
$ok2 = @mysql_query($sql2);

    if ($ok1 && $ok2) {
      echo '<p>Your personal record has been deleted.</p>';
    } else {
      echo '<p>Error deleting submitted course record: ' .
          mysql_error() . '</p>';
    }
?>





</p>
</div></div>
</body>
</html>
