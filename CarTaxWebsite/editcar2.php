<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update a Car Record</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>

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

  $result2 = @mysql_query('SELECT PPS FROM people order by PPS');
  if (!$result2) {
    exit('Error performing query on the People table: ' . mysql_error());
  }
  if (mysql_num_rows($result2)<1) {
      exit('There are no PPS values from which to choose from');
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
<form action = "editcar3.php" method = "post" id = "courseupdate" class="cartax">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="RegistrationS" class="fixedwidth">Registration</label>
          <input type="text" name="RegistrationS" id="RegistrationS" size="9" disabled = "disabled" value = "<?php echo $Registration; ?>" />
        </div>

        <div class ="fieldarea">
          <label for="Year" class="fixedwidth">Year</label>
         <input type="text" name="Year" id="Year" size="10" value = "<?php echo $Year; ?>"/>
        </div>

        <div class ="fieldarea">
          <label for="EngineSize" class="fixedwidth">Engine Size</label>
         <input type="text" name="EngineSize" id="EngineSize" size="20"  value = "<?php echo $EngineSize; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="TaxedFrom" class="fixedwidth">Taxed From</label>
         <input type="text" name="TaxedFrom" id="TaxedFrom" size="20"  value = "<?php echo $TaxedFrom; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="TaxedTo" class="fixedwidth">Taxed To</label>
         <input type="text" name="TaxedTo" id="TaxedTo" size="20"  value = "<?php echo $TaxedTo; ?>"/>
          </div>

	         <div class ="fieldarea">
	          <label for="PPS" class="fixedwidth">PPS</label>
	         <select name = "PPS" id = "PPS" class = "required" value = "<?php echo $PPS; ?>">
	          <option selected value = "">Select One</option>
	          <?php
	          while($row = mysql_fetch_array($result2))
	           {
	           $PPS=$row['PPS'];
	           echo "<option value='$PPS'>$PPS</option>\n";
	          }
	          ?>
	          </select>
	          </div>

        <div class ="fieldarea">
          <label for="TaxPrice" class="fixedwidth">Tax Price</label></td>
          <input type="text" name="TaxPrice" id="TaxPrice" size="10" class = "numeric" value = "<?php echo $TaxPrice; ?>"/>
        </div>

        <div class ="fieldarea">
          <input type="hidden" name="Registration" id="Registration" size="9" value = "<?php echo $Registration; ?>" />
        </div>

	<div class="buttonarea">
    		<input type="submit" value="Update Car Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>