
<div id="tabs" class="tabs">
    <ul>
        <li><a href="#addCustomers">Add Customers</a></li>
        <li><a href="#customersTab">View Customers</a></li>
    </ul>
    <!-- Add Customers Tab -->
    <div id="addCustomers">
        
        <form class="creationForm">

            <label for="customerName">Name</label>
            <input type="text" name="customerName" class="textBox" id="customerName" onchange="Validate.string(this.value)"></input>

            <label for="address">Address</label>
            <input type="text" name="address" class="textBox" id="address" onchange="Validate.address(this.value)"></input>

            <label for="email">Email</label>
            <input type="text" name="email" class="textBox" id="email" onchange="Validate.email(this.value)"></input>

            <label for="telephone1">Telephone (Main)</label>
            <input type="text" name="telephone1" class="textBox" id="telephone1" onchange="Validate.telephone(this.value)"></input>

            <label for="telephone2">Telephone (Other)</label>
            <input type="text" name="telephone2" class="textBox" id="telephone2" onchange="Validate.telephone(this.value)"></input>

            <input type="button" class="button" value="Submit" onclick="Customer.addCustomer()"></input>

        </form>
        
    </div>

    
    <!-- View Customers Tab -->
    <div id="customersTab">
        
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable">
            <thead>
                <tr>
                    <th width="16%">Name</th>
                    <th width="42.5%">Address</th>
                    <th width="13%">Email</th>
                    <th width="10.5%">Phone 1</th>
                    <th width="9%">Phone 2</th>
                    <th width="9%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    
    <!-- Dialog -->
    <div id="dialog" class="customersDialog" title="Edit Customer">
        
        <form class="creationForm">

            <label for="customerName">Name</label>
            <input type="text" name="customerName" class="textBox" id="customerName" disabled="true"></input>

            <label for="address">Address</label>
            <input type="text" name="address" class="textBox" id="address" onchange="Validate.adress(this.value)"></input>

            <label for="email">Email</label>
            <input type="text" name="email" class="textBox" id="email" onchange="Validate.email(this.value)"></input>

            <label for="telephone1">Telephone (Main)</label>
            <input type="text" name="telephone1" class="textBox" id="telephone1" onchange="Validate.telephone(this.value)"></input>

            <label for="telephone2">Telephone (Other)</label>
            <input type="text" name="telephone2" class="textBox" id="telephone2" onchange="Validate.telephone(this.value)"></input>

            <input type="button" class="button" value="Update" onclick="Customer.updateCustomer()"></input>

        </form>
        
    </div>
    
</div>
