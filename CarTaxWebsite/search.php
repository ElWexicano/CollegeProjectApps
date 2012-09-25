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
<?php
 $dbcnx = @mysql_connect('localhost', 'root', 'root');
  if (!$dbcnx) {
    exit('Unable to connect to the ' .
        'database server at this time.');
  }

  if (!@mysql_select_db('shanedoyle')) {
    exit('Unable to locate the shanedoyle ' .
        'database at this time.');
  }


$result2 = @mysql_query('SELECT * FROM county order by county');
if (!$result2) {
  exit('Error performing query on the County table: ' . mysql_error());
}

?>

    <form action="peoplequery.php" method="post" id = "studentquery" class="cartax">
    <fieldset>
    <legend>Car Query</legend>
         <div class ="fieldarea">
          <label for="county" class="fixedwidth">By County</label>
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
          <label for="PPS" class="fixedwidth">PPS</label>
         <input type="text" name="PPS" id="PPS" size="10" class = "required"/>
        </div>
<div class="buttonarea">
    		<input type="submit" value="Search Records" />
    		<input type="reset" value="Clear the Info" />
	</div>
</fieldset>
</form>

</div>
</div>
</body>
</html>