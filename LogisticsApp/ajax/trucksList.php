<?php
/**
 * This script is used to get the ajax data required to populate
 * the dataTable on the view trucks tab.
 * 
 * @author  : Shane Doyle
 * @date    : 25/09/2011
 */

require_once('../conf/libDB.php');

$search = "";

if(isset($_GET['sSearch']))
{
    $search = " where truckReg like '%".mysql_real_escape_string($_GET['sSearch'])."%'";
}

$details = array(
    "aaData" => array()
);

$sql = "select * from truckslist".$search;
$dbConnection = dbConnect();
$result = mysql_query($sql) or die(mysql_error());  

while ( $row = mysql_fetch_array( $result ) )
{
    $dataRow = array();
    
    $dataRow[] = $row['truckReg'];
    $dataRow[] = $row['truckYear'];
    $dataRow[] = $row['truckMake'];
    $dataRow[] = $row['truckDOE'] != 0 ? "Yes" : "No";
    $dataRow[] = $row['truckTaxed'] != 0 ? "Yes" : "No";
    $dataRow[] = $row['truckInsured'] != 0 ? "Yes" : "No";
    $dataRow[] = $row['truckStatus'];
    $dataRow[] = "<img class='tableIcon' src='img/edit2.png' 
        title='Edit Truck' onclick=\"Truck.editTruck('".$row['truckReg']."')\"></img>
        <img class='tableIcon' src='img/delete1.png' 
        title='Delete Truck' onclick=\"Truck.deleteTruck('".$row['truckReg']."')\"></img>";
    
    $details['aaData'][] = $dataRow;
}

echo json_encode($details);

mysql_close($dbConnection);

?>
