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

$PPS = $_GET['PPS'];
$record = @mysql_query("select * from people where PPS = '$PPS'");
if (!$record) {
     exit('Error fetching course details: '. mysql_error());
}
$row = mysql_fetch_array($record);
$PPS = $row['PPS'];
$FirstName = $row['FirstName'];
$LastName = $row['LastName'];
$Street = $row['Street'];
$Town = $row['Town'];
$County = $row['County'];
$Phone = $row['Phone'];
?>
</p>
<form action = "deleteperson3.php" method = "post" id = "coursedelete" class="cartax">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="PPSS" class="fixedwidth">PPS</label>
          <input type="text" name="PPSS" id="PPSS" size="9" disabled = "disabled" value = "<?php echo $PPS; ?>" />
        </div>

        <div class ="fieldarea">
          <label for="FirstName" class="fixedwidth">First Name</label>
         <input type="text" name="FirstName" id="FirstName" size="30" disabled = "disabled" value = "<?php echo $FirstName; ?>"/>
        </div>

        <div class ="fieldarea">
          <label for="LastName" class="fixedwidth">Last Name</label>
         <input type="text" name="LastName" id="LastName" size="20" disabled = "disabled" value = "<?php echo $LastName; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="Street" class="fixedwidth">Street</label>
         <input type="text" name="Street" id="Street" size="20" disabled = "disabled" value = "<?php echo $Street; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="Town" class="fixedwidth">Last Name</label>
         <input type="text" name="Town" id="Town" size="20" disabled = "disabled" value = "<?php echo $Town; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="County" class="fixedwidth">Street</label>
         <input type="text" name="County" id="County" size="20" disabled = "disabled" value = "<?php echo $County; ?>"/>
          </div>

        <div class ="fieldarea">
          <label for="Phone" class="fixedwidth">Phone</label></td>
          <input type="text" name="Phone" id="Phone" size="10" class = "numeric" disabled = "disabled" value = "<?php echo $Phone; ?>"/>
        </div>

        <div class ="fieldarea">
          <input type="hidden" name="PPS" id="PPS" size="9" value = "<?php echo $PPS; ?>" />
        </div>


	<div class="buttonarea">
    		<input type="submit" value="Delete the Personal Record" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body>
</html>