<?php
/**
 * This script is used to get the ajax data required to populate
 * the dataTable on the view trailers tab.
 * 
 * @author  : Shane Doyle
 * @date    : 25/09/2011
 */

require_once('../conf/libDB.php');

$search = "";

if(isset($_GET['sSearch']))
{
    $search = " where trailerReg like '%".mysql_real_escape_string($_GET['sSearch'])."%'";
}

$details = array(
    "aaData" => array()
);

$sql = "select * from trailerslist".$search;


$dbConnection = dbConnect();
$result = mysql_query($sql) or die(mysql_error());  

while ( $row = mysql_fetch_array( $result ) )
{
    $dataRow = array();
    
    $dataRow[] = $row['trailerReg'];
    $dataRow[] = $row['trailerYear'];
    $dataRow[] = $row['trailerType'];
    $dataRow[] = $row['trailerStatus'];
    $dataRow[] = "<img class='tableIcon' src='img/edit2.png' 
        title='Update Trailer' onclick=\"Trailer.editTrailer('".$row['trailerReg']."')\"></img>
        <img class='tableIcon' src='img/delete1.png' 
        title='Delete Trailer' onclick=\"Trailer.deleteTrailer('".$row['trailerReg']."')\"></img>";
    
    $details['aaData'][] = $dataRow;
}

echo json_encode($details);

mysql_close($dbConnection);

?>
