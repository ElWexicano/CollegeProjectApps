<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete a Car Record Result</title>
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
<h2>Delete a Car Record Result</h2>
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

$Registration = $_GET['Registration'];
$record = @mysql_query("select * from car where Registration = '$Registration'");
if (!$record) {
     exit('Error fetching car details: '. mysql_error());
}
$row = mysql_fetch_array($record);
$Registration = $row['Registration'];
$Year = $row['Year'];
$EngineSize = $row['EngineSize'];
$TaxedFrom = $row['TaxedFrom'];
$TaxedTo = $row['TaxedTo'];
$PPS = $row['PPS'];
$TaxPrice = $row['TaxPrice'];
?>
</p>
<form action = "deletecar3.php" method = "post" id = "coursedelete" class="cartax">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="RegistrationS" class="fixedwidth">Registration</label>
          <input type="text" name="RegistrationS" id="RegistrationS" size="9" disabled = "disabled" value = "<?php echo $Registration; ?>" />
        </div>

        <div class ="fieldarea">
          <label for="Year" class="fixedwidth">Year</label>
         <input type="text" name="Year" id="Year" size="10" disabled = "disabled" value = "<?php echo $Year; ?>"/>
        </div>

        <div class ="fieldarea">
          <label for="EngineSize" class="fixedwidth">Engine Size</label>
         <input type="text" name="EngineSize" id="EngineSize" size="20" disabled = "disabled" value = "<?php echo $EngineSize; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="TaxedFrom" class="fixedwidth">Taxed From</label>
         <input type="text" name="TaxedFrom" id="TaxedFrom" size="20" disabled = "disabled" value = "<?php echo $TaxedFrom; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="TaxedTo" class="fixedwidth">Taxed To</label>
         <input type="text" name="TaxedTo" id="TaxedTo" size="20" disabled = "disabled" value = "<?php echo $TaxedTo; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="PPS" class="fixedwidth">PPS</label>
         <input type="text" name="PPS" id="PPS" size="20" disabled = "disabled" value = "<?php echo $PPS; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="TaxPrice" class="fixedwidth">Tax Price</label></td>
          <input type="text" name="TaxPrice" id="TaxPrice" size="10" class = "numeric" disabled = "disabled" value = "<?php echo $TaxPrice; ?>"/>
        </div>

        <div class ="fieldarea">
          <input type="hidden" name="Registration" id="Registration" size="9" value = "<?php echo $Registration; ?>" />
        </div>


	<div class="buttonarea">
    		<input type="submit" value="Delete the Car Record" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>