<?php
require_once('../conf/libDB.php');

$dbConnection   = dbConnect();

?>
<div id="tabs" class="tabs">
    <ul>
        <li><a href="#addJobs">Add Jobs</a></li>
        <li><a href="#jobsTab">View Jobs</a></li>
    </ul>
    
    
    
    <!-- Add Jobs Tab -->
    <div id="addJobs">
        <form class="creationForm">


                <label for="customer">Customer</label>
                <select name="customer" id="customer">
                    <?php
                        $result = mysql_query("select customerId, customerName from customers") 
                                            or die(mysql_error());  
                        while($row = mysql_fetch_array( $result ))
                        {
                            echo "<option value='".$row['customerId']."'>".$row['customerName']."</option>";
                        }
                    ?>
                </select>
                
                <label for="cost">Cost</label>
                <input type="text" name="cost" id="cost" class="textBox"  onchange="Validate.number(this.value)"></input>
                
                <label for="truck">Truck</label>
                <select name="truck" id="truck">
                    <?php
                    $result = mysql_query("select truckReg from trucks") 
                    or die(mysql_error());
                    while($row = mysql_fetch_array( $result ))
                    {
                        echo "<option>".$row['truckReg']."</option>";
                    }
                    ?>
                </select>
                
                <label for="trailer">Trailer</label>
                <select name="trailer" id="trailer">
                    <?php 
                        $result = mysql_query("select trailerReg from trailers") 
                                            or die(mysql_error());
                        while($row = mysql_fetch_array( $result ))
                        {
                            echo "<option>".$row['trailerReg']."</option>";
                        }
                    ?>
                </select>

                <label for="collectionAddress">Collection Address</label>
                <input type="text" name="collectionAddress" class="textBox" id="collectionAddress" onchange="Validate.address(this.value)"></input>
                
                <label for="collectionDate">Collection Date</label>
                <input type="text" name="collectionDate" class="textBox" id="collectionDate" onchange="Validate.date(this.value)"></input>
                
                <label for="deliveryAddress">Delivery Address</label>
                <input type="text" name="deliveryAddress" class="textBox" id="deliveryAddress" onchange="Validate.address(this.value)"></input>
                
                <label for="deliveryDate">Delivery Date</label>
                <input type="text" name="deliveryDate" class="textBox" id="deliveryDate" onchange="Validate.date(this.value)"></input>
                
                <input type="button" class="button" value="Submit" onclick="Job.addJob()"></input>

        </form>
        
    </div>


    <!-- View Jobs Tab -->
    <div id="jobsTab">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable">
            <thead>
                <tr>
                    <th width="7%">Id</th>
                    <th width="20%">Date</th>
                    <th width="20%">Customer</th>
                    <th width="10%">Truck</th>
                    <th width="10%">Trailer</th>
                    <th width="15%">Status</th>
                    <th width="10%">Details</th>
                    <th width="8%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    
    
    <!-- Dialog -->
    <div id="dialog" class="jobsDialog" title="Update Job">
        <form class="creationForm">

                <label for="customer1">Customer</label>
                <select name="customer1" id="customer1">
                    <?php
                        $result = mysql_query("select customerId, customerName from customers") 
                                            or die(mysql_error());  
                        while($row = mysql_fetch_array( $result ))
                        {
                            echo "<option>".$row['customerName']."</option>";
                        }
                    ?>
                </select>
                
                <label for="cost1">Cost</label>
                <input type="text" name="cost1" id="cost1" class="textBox" onchange="Validate.number(this.value)"></input>
                
                <label for="truck1">Truck</label>
                <select name="truck1" id="truck1">
                    <?php
                    $result = mysql_query("select truckReg from trucks") 
                    or die(mysql_error());
                    while($row = mysql_fetch_array( $result ))
                    {
                        echo "<option>".$row['truckReg']."</option>";
                    }
                    ?>
                </select>
                
                <label for="trailer1">Trailer</label>
                <select name="trailer1" id="trailer1">
                    <?php 
                        $result = mysql_query("select trailerReg from trailers") 
                                            or die(mysql_error());
                        while($row = mysql_fetch_array( $result ))
                        {
                            echo "<option>".$row['trailerReg']."</option>";
                        }
                    ?>
                </select>

                <label for="collectionAddress1">Collection Address</label>
                <input type="text" name="collectionAddress1" class="textBox" id="collectionAddress1" onchange="Validate.address(this.value)"></input>
                
                <label for="collectionDate1">Collection Date</label>
                <input type="text" name="collectionDate1" class="textBox" id="collectionDate1" onchange="Validate.date(this.value)"></input>
                
                <label for="collectionStatus1">Collection Status</label>
                <select name="collectionStatus1" class="textBox" id="collectionStatus1">
                    <option>Waiting</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
                
                <label for="deliveryAddress1">Delivery Address</label>
                <input type="text" name="deliveryAddress1" class="textBox" id="deliveryAddress1" onchange="Validate.address(this.value)"></input>
                
                <label for="deliveryDate1">Delivery Date</label>
                <input type="text" name="deliveryDate1" class="textBox" id="deliveryDate1" onchange="Validate.date(this.value)"></input>
                
                <label for="deliveryStatus1">Delivery Status</label>
                <select name="deliveryStatus1" class="textBox" id="deliveryStatus1">
                    <option>Waiting</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
                
                <label for="jobStatus1">Job Status</label>
                <select name="jobStatus1" class="textBox" id="jobStatus1">
                    <option>Waiting</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
                
                <input type="button" class="button" value="Update" onclick="Job.updateJob()"></input>
        </form>
    </div>
    
</div>
<?php

mysql_close($dbConnection);

?>