<ul class="navigation"> 
    <li>
        <img class="listIcon" src="img/home.png"></img>
        <a href="#" onclick="loadSection('home')" id="homeUrl">Home</a>
    </li> 
    
    <li>
        <img class="listIcon" src="img/list.png"></img>
        <a href="#" onclick="loadSection('jobs')" id="jobsUrl">Jobs</a>
    </li>  
    
    <li>
        <img class="listIcon" src="img/business.png"></img>
        <a href="#" onclick="loadSection('customers')" id="customersUrl">Customers</a>
    </li> 
    
    <li>
        <img class="listIcon" src="img/truck.png"></img>
        <a href="#" onclick="loadSection('trucks')" id="trucksUrl">Trucks</a>
    </li> 
    
    
    <li>
        <img class="listIcon" src="img/truck.png"></img>
        <a href="#" onclick="loadSection('trailers')" id="trailersUrl">Trailers</a>
    </li> 
    
    <div id="userDetails">
        
        <h4>User Details</h4>
        <hr></hr>
        
        <?php 
        
        $username       = $_SESSION['username'];
        $loginTime      = $_SESSION['loginTime'];
        
        echo "<pre>".
              "User           : $username</br>".
                "Online Since   : $loginTime</pre>";
        ?>
        
    </div>
    
    <li>
        <img class="listIcon" src="img/exit.png"></img>
        <a href="#" onclick="logout()" id="trailersUrl">Log Out</a>
    </li> 
    
</ul>

