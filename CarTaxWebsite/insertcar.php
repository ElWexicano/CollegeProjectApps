<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a Car Record</title>
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
$result2 = @mysql_query('SELECT PPS FROM people order by PPS');
if (!$result2) {
  exit('Error performing query on the People table: ' . mysql_error());
}
if (mysql_num_rows($result2)<1) {
    exit('There are no PPS values from which to choose from');
}

?>
    <form action="insertcar1.php" method="post" id = "courseentry" class="cartax">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="Registration" class="fixedwidth">Registration</label>
          <input type="text" name="Registration" id="Registration" size="9" maxlength="9" class = "required" />
        </div>
        <div class ="fieldarea">
          <label for="Year" class="fixedwidth">Year</label>
         <input type="text" name="Year" id="Year" size="4" maxlength="4" class = "required"/>
        </div>
        <div class ="fieldarea">
          <label for="Make" class="fixedwidth">Make</label>
         <input type="text" name="Make" id="Make" size="20" class = "required"/>
          </div>
        <div class ="fieldarea">
          <label for="EngineSize" class="fixedwidth">Engine Size</label>
         <input type="text" name="EngineSize" id="EngineSize" size="20" class = "required"/>
          </div>
         <div class ="fieldarea">
		 <label for="TaxedFrom" class="fixedwidth">Taxed From</label>
		 <input type="date" name="TaxedFrom" id="TaxedFrom" size="20" class = "datein required"/>
          </div>

        <div class ="fieldarea">
		<label for="TaxedTo" class="fixedwidth">Taxed To</label>
		<input type="date" name="TaxedTo" id="TaxedTo" size="20" class = "datein required"/>
          </div>

       <div class ="fieldarea">
        <label for="PPS" class="fixedwidth">PPS</label>
       <select name = "PPS" id = "PPS" class = "required">
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
          <label for="Price" class="fixedwidth">Price</label>
         <input type="int" name="Price" id="Price" size="8" class = "required"/>
          </div>
	<div class="buttonarea">
    		<input type="submit" value="Insert Car Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body></html>