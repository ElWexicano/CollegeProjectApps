<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update a Car Record</title>
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
<h2>Update a Car Record</h2>
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


    $Registration = $_POST['Registration'];
    $Year = $_POST['Year'];
    $EngineSize = $_POST['EngineSize'];
    $TaxedFrom = $_POST['TaxedFrom'];
    $TaxedTo = $_POST['TaxedTo'];
    $PPS = $_POST['PPS'];
    $TaxPrice = $_POST['TaxPrice'];

$sql ="update car set
       Year = '$Year',
       EngineSize = '$EngineSize',
       TaxedFrom = '$TaxedFrom',
       TaxedTo = '$TaxedTo',
       PPS = '$PPS',
       TaxPrice = '$TaxPrice'
       where Registration='$Registration'";

    if (@mysql_query($sql)) {
      echo 'Your car record has been updated.';
    } else {
      echo 'Error updating submitted car record: ' .
          mysql_error() ;
    }
?>
</p>
</div></div>
</body>
</html>