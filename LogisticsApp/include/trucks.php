
<div id="tabs" class="tabs">
    <ul>
        <li><a href="#addTrucks">Add Trucks</a></li>
        <li><a href="#trucksTab">View Trucks</a></li>
    </ul>

    <!-- Add Trucks Tab -->
    <div id="addTrucks">
        
        <form class="creationForm">
                <label for="registration">Registration</label>
                <input type="text" name="registration" id="registration" class="textBox" onchange="Validate.reg(this.value)"></input>

                <label for="year">Year</label>
                <select name="year" id="year">
                    <?php
                    $year = date("Y");
                    $y = 2000;
                    while($y <= $year)
                    {
                        echo "<option>$y</option>";
                        $y++;
                    }
                    ?>
                </select>

                <label for="make">Make</label>
                <input type="text" name="make" id="make" class="textBox" onchange="Validate.string(this.value)"></input>

                <label for="status">Status</label>
                <select id="status" name="status">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>

                <label for="doe">DOE</label>
                <input type="checkbox" name="doe" id="doe" value="yes"></input></br>

                <label for="taxed">Taxed</label>
                <input type="checkbox" name="taxed" id="taxed" value="yes"></input></br>

                <label for="insured">Insured</label>
                <input type="checkbox" name="insured" id="insured" value="yes"></input></br>

                <input type="button" class="button" value="Submit" onclick="Truck.addTruck()"></input>
        </form>
        
    </div>


    <!-- View Trucks Tab -->
    <div id="trucksTab">

        <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable">
            <thead>
                <tr>
                    <th width="15%">Registration</th>
                    <th width="10%">Year</th>
                    <th width="20%">Make</th>
                    <th width="10%">DOE</th>
                    <th width="10%">Taxed</th>
                    <th width="10%">Insured</th>
                    <th width="15%">Status</th>
                    <th width="10%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    
    
    <!-- Dialog -->
    <div id="dialog" class="trucksDialog" title="Edit Truck">
        
        <form class="creationForm">
                <label for="registration">Registration</label>
                <input type="text" name="registration" id="registration" class="textBox" disabled="true"></input>

                <label for="year">Year</label>
                <select name="year" id="year" disabled="true">
                    <?php
                    $year = date("Y");
                    $y = 2000;
                    while($y <= $year)
                    {
                        echo "<option>$y</option>";
                        $y++;
                    }
                    ?>
                </select>

                <label for="make">Make</label>
                <input type="text" name="make" id="make" class="textBox" onchange="Validate.string(this.value)"></input>

                <label for="status">Status</label>
                <select id="status" name="status">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>

                <label for="doe">DOE</label>
                <input type="checkbox" name="doe" id="doe" value="yes"></input></br>

                <label for="taxed">Taxed</label>
                <input type="checkbox" name="taxed" id="taxed" value="yes"></input></br>

                <label for="insured">Insured</label>
                <input type="checkbox" name="insured" id="insured" value="yes"></input></br>

                <input type="button" class="button" value="Update" onclick="Truck.updateTruck()"></input>
        </form>
        
    </div>
    
</div>

