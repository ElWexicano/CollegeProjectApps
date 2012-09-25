<?php
/**
 * This is the index for my PHP/MySQL Assignment for Advanced Databases.
 * 
 * @author  : Shane Doyle
 * @date    : 14/09/2011
 */

session_start();

if(!isset($_SESSION['username']))
{
    $errorMessage = "Please Login to the System<br>".
                    "<a href='index.php'>Login Screen</a>";

    die($errorMessage);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="pragma" content="no-cache">
        <title>Advanced DB - Assignment 1</title>
        
        <link rel="stylesheet" href="./js/jQuery/css/jQuery-ui.css"></link>
        <link rel="stylesheet" href="./js/jQuery/css/jquery.ui.datepicker.css"></link>
        <link rel="stylesheet" href="./js/jQuery/css/jquery.ui.dialog.css"></link>
        <link rel="stylesheet" href="./js/jQuery/css/dataTable.css"></link>
        <link rel="stylesheet" type="text/css" href="css/index.css"></link>
        
	<script src="./js/jQuery/jquery-1.6.2.js"></script>
	<script src="./js/jQuery/ui/jquery.ui.core.js"></script>
	<script src="./js/jQuery/ui/jquery.ui.widget.js"></script>
	<script src="./js/jQuery/ui/jquery.ui.tabs.js"></script>
        <script src="./js/jQuery/ui/jquery.ui.dialog.js"></script>
        <script src="./js/jQuery/ui/jquery.ui.datepicker.js"></script>
        <script src="./js/jQuery/ui/jquery.ui.position.js"></script>
        <script src="./js/jQuery/jquery.dataTables.js"></script>
        
        <script type="text/javascript" src="js/Validator.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript" src="js/Customer.js"></script>
        <script type="text/javascript" src="js/Job.js"></script>
        <script type="text/javascript" src="js/Trailer.js"></script>
        <script type="text/javascript" src="js/Truck.js"></script>
        
    </head>
    <body>
        
        <div class="headerBg"></div>
        
        <div class="container">

            <?php include('include/header.php') ?>
            
            <?php include('include/navigation.php') ?>
            
            <?php include('include/content.php') ?>
            
            <?php include('include/footer.php') ?>
            
        </div>
        
    </body>
</html>
