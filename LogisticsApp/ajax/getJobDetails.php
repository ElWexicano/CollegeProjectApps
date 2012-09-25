<?php
/**
 * This script is used to get the ajax data required to populate
 * the job details table row in the dataTable on view jobs tab.
 * 
 * @author  : Shane Doyle
 * @date    : 25/09/2011
 */

require_once('../conf/libDB.php');

if(!isset($_GET['jobId']))
{
    echo "Unable to get Job Details";
    die();
}

$jobId = $_GET['jobId'];

$dbConnection = dbConnect();
$result = mysql_query("select DATE_FORMAT(collectionDate, '%Y-%m-%d')as collectionDate, 
                                collectionAddress, 
                                collectionStatus, 
                                DATE_FORMAT(deliveryDate, '%Y-%m-%d') as deliveryDate, 
                                deliveryAddress, 
                                deliveryStatus ,
                                truckReg,
                                trailerReg,
                                jobCost,
                                jobStatus,
                                customerName
                                from jobdetailslist 
                                where jobId = '$jobId'") 
                                or die("Cant get Job Details");  

$row = mysql_fetch_array( $result );

echo json_encode($row);

mysql_close($dbConnection);
?>
