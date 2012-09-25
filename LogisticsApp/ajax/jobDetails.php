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
$result = mysql_query("select DATE_FORMAT(collectionDate, '%a %d-%m-%Y %H:%i')as collectionDate, 
                                collectionAddress, 
                                collectionStatus, 
                                DATE_FORMAT(deliveryDate, '%a %d-%m-%Y %H:%i') as deliveryDate, 
                                deliveryAddress, 
                                deliveryStatus 
                                from jobdetailslist 
                                where jobId = '$jobId'") 
                                or die("Cant get Job Details");  
    
$row = mysql_fetch_array( $result );

echo "<table>
        <thead>
            <tr>
                <th width='8%'>Type</th>
                <th width='53%'>Address</th>
                <th width='25%'>Date</th>
                <th width='15%'>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Collection</td>
                <td>".$row['collectionAddress']."</td>
                <td>".$row['collectionDate']."</td>
                <td>".$row['collectionStatus']."</td>
            </tr>
            <tr>
                <td>Delivery</td>
                <td>".$row['deliveryAddress']."</td>
                <td>".$row['deliveryDate']."</td>
                <td>".$row['deliveryStatus']."</td>
            </tr>
        </tbody>
      </table>";

mysql_close($dbConnection);
?>
