
<div id="tabs" class="tabs">
    <ul>
        <li><a href="#addTrailers">Add Trailers</a></li>
        <li><a href="#trailersTab" onclick="">View Trailers</a></li>
    </ul>

    
    <!-- Add Trailers Tab -->
    <div id="addTrailers">
        
        <form class="creationForm">
                <label for="registration">Registration</label>
                <input type="text" name="registration" id="registration" onchange="Validate.reg(this.value)"></input>

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

                <label for="type">Type</label>
                <select name="type" id="type">
                    <option>Curtain</option>
                    <option>Fridge</option>
                </select>

                <label for="status">Status</label>
                <select name="status" id="status" class="select">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>

                <input type="button" class="button" value="Submit" onclick="Trailer.addTrailer()"></input>
        </form>
        
    </div>

    <!-- View Trailers Tab -->
    <div id="trailersTab">
        
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable">
            <thead>
                <tr>
                    <th>Registration</th>
                    <th>Year</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    
    
    <!-- Dialog -->
    <div id="dialog" class="trailersDialog" title="Edit Trailer">
        
        <form class="creationForm">    
            <label for="registration">Registration</label>
            <input type="text" name="registration" id="registration" disabled="true"></input>

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

            <label for="type">Type</label>
            <select name="type" id="type">
                <option>Curtain</option>
                <option>Fridge</option>
            </select>

            <label for="status">Status</label>
            <select name="status" id="status" class="select">
                <option>Active</option>
                <option>Inactive</option>
            </select>

            <input type="button" class="button" value="Update" onclick="Trailer.updateTrailer()"></input>
        </form>
        
    </div>
    
</div>