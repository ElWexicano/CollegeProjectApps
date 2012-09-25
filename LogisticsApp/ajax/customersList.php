<?php
/**
 * This script is used to get the ajax data required to populate
 * the dataTable on the view customers tab.
 * 
 * @author  : Shane Doyle
 * @date    : 25/09/2011
 */

require_once('../conf/libDB.php');

$search = "";

if(isset($_GET['sSearch']))
{
    $search = " where customerName like '%".mysql_real_escape_string($_GET['sSearch'])."%'";
}

$details = array(
    "aaData" => array()
);

$sql = "select customerId,
                customerName, 
                customerAddress, 
                customerEmail, 
                ifnull(customerTelephone1, 'None') as customerTelephone1,
                ifnull(customerTelephone2, 'None') as customerTelephone2
                from customers$search order by customerName";
$dbConnection = dbConnect();
$result = mysql_query($sql) or die(mysql_error());  

while ( $row = mysql_fetch_array( $result ) )
{
    $dataRow = array();
    
    $dataRow[] = $row['customerName'];
    $dataRow[] = $row['customerAddress'];
    $dataRow[] = $row['customerEmail'];
    $dataRow[] = $row['customerTelephone1'];
    $dataRow[] = $row['customerTelephone2'];
    $dataRow[] = "<img class='tableIcon' src='img/edit2.png' 
        title='Edit Customer' onclick=\"Customer.editCustomer('".$row['customerId']."')\"></img>
        <img class='tableIcon' src='img/delete1.png' 
        title='Delete Customer' onclick=\"Customer.deleteCustomer('".$row['customerId']."')\"></img>";
    
    $details['aaData'][] = $dataRow;
}

echo json_encode($details);

mysql_close($dbConnection);

?>
