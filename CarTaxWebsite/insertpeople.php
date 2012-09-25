<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a Personal Record</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>
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
<?php
$dbcnx = @mysql_connect('localhost', 'root', 'root');
  if (!$dbcnx) {
    exit('<p>Unable to connect to the ' .
        'database server at this time.</p>');
  }

  // Select the jokes database
  if (!@mysql_select_db('shanedoyle')) {
    exit('<p>Unable to locate the shanedoyle ' .
        'database at this time.</p>');
  }

$result2 = @mysql_query('SELECT * FROM county order by county');
if (!$result2) {
  exit('Error performing query on the County table: ' . mysql_error());
}
if (mysql_num_rows($result2)<1) {
    exit('There are no county values from which to choose from');
}

?>

    <form action="insert.php" method="post" id = "courseentry" class="cartax">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="PPS" class="fixedwidth">PPS</label>
          <input type="text" name="PPS" id="PPS" size="9" class = "required"/>
        </div>

        <div class ="fieldarea">
          <label for="FirstName" class="fixedwidth">First Name</label>
         <input type="text" name="FirstName" id="FirstName" size="10" class = "required"/>
        </div>

        <div class ="fieldarea">
          <label for="LastName" class="fixedwidth">Last Name</label>
         <input type="text" name="LastName" id="LastName" size="10" class = "required"/>
          </div>

        <div class ="fieldarea">
          <label for="Street" class="fixedwidth">Street</label>
         <input type="text" name="Street" id="Street" size="20" class = "required"/>
          </div>

        <div class ="fieldarea">
          <label for="Town" class="fixedwidth">Town</label>
         <input type="text" name="Town" id="Town" size="15" class = "required"/>
          </div>

         <div class ="fieldarea">
          <label for="county" class="fixedwidth">County</label>
          <select name = "county" id="county"  class = "required"/>
        <option selected value = "">Select One</option>
        <?php
        while($row = mysql_fetch_array($result2))
         {
         $county=$row['county'];
         echo "<option value='$county'>$county</option>\n";
        }
        ?>
        </select>
          </div>

        <div class ="fieldarea">
          <label for="Phone" class="fixedwidth">Phone</label>
         <input type="text" name="Phone" id="Phone" size="12" maxlength ="12" minlength = "12" class = "required"/>
          </div>

	<div class="buttonarea">
    		<input type="submit" value="Insert Personal Details" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>