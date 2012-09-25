<?php
/**
 * This script is used to get the ajax data required to populate
 * the dataTable on the view jobs tab.
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

$dbConnection = dbConnect();
$result = mysql_query("select jobId, 
                                DATE_FORMAT(jobDate,'%a %d-%m-%Y') as jobDate, 
                                customerName, 
                                truckReg, 
                                trailerReg, 
                                jobStatus from jobdetailslist".$search)
                                or die(mysql_error());  
    
while ( $row = mysql_fetch_array( $result ) )
{
    $dataRow = array();
    
    $dataRow[] = $row['jobId'];
    $dataRow[] = $row['jobDate'];
    $dataRow[] = $row['customerName'];
    $dataRow[] = $row['truckReg'];
    $dataRow[] = $row['trailerReg'];
    $dataRow[] = $row['jobStatus'];
    $dataRow[] = "<a href='#' onclick=\"Job.showHideDetails(this)\">Show</a>";
    $dataRow[] = "<img class='tableIcon' src='img/edit2.png' 
        title='Edit Job' onclick=\"Job.editJob('".$row['jobId']."')\"></img>
            <img class='tableIcon' src='img/delete1.png' 
        title='Delete Job' onclick=\"Job.deleteJob('".$row['jobId']."')\"></img>";
    
    $details['aaData'][] = $dataRow;
}

echo json_encode($details);
    


mysql_close($dbConnection);
?>



