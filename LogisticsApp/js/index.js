var dataTable = null;

$(document).ready(function() 
{
    initTabs();
    
});


/**
 * Initialise the jQuery Tabs. This is called when the application first
 * loads and also when a new section is loaded.
 *
 */
function initTabs()
{
    $(function() {
        $( "#tabs" ).tabs("destroy");
    });
    $(function() {
        $( "#tabs" ).tabs({selected: 1});
    });
}


function initDialog(section)
{

    var sectionDialog = "";
    
    if(section=="jobs")
    {
        sectionDialog = ".jobsDialog";
    }
    else if(section=="customers")
    {
        sectionDialog = ".customersDialog";
    }
    else if(section=="trailers")
    {
        sectionDialog = ".trailersDialog";
    }
    else if(section=="trucks")
    {
        sectionDialog = ".trucksDialog";
    }
    
    
    $(function() {
        $( sectionDialog ).dialog({ 
            autoOpen: false, 
            modal: true, 
            width: 500, 
            closeOnEscape : true
        });
    }); 
}


/**
 * This method initialises the calendars for the add jobs tab
 */
function initCalendars()
{
    $(function() 
    {
        $( "#collectionDate" ).datepicker({ dateFormat: 'yy-mm-dd', 
                                            minDate : 0,
                                            showWeek: true});
                                        
        $( "#deliveryDate" ).datepicker({ dateFormat: 'yy-mm-dd', 
                                            minDate : 0,
                                            showWeek: true});
                                        
        $( "#collectionDate1" ).datepicker({ dateFormat: 'yy-mm-dd', 
                                            minDate : 0,
                                            showWeek: true});
                                        
        $( "#deliveryDate1" ).datepicker({ dateFormat: 'yy-mm-dd', 
                                            minDate : 0,
                                            showWeek: true});
    });
}



/**
 * This method is used for loading a particular section.
 * 
 * @param section The name of the section that is to be loaded.
 */
function loadSection(section)
{
    var url = "include/"+section+".php";
    
    $.get(url, function(data)
    {
        $("#contentArea").html(data);
        initTabs();
        
        if(section != "home")
        {
            initTable(section);
            initDialog(section);
        }
        if(section == "jobs")
        {
            initCalendars();
        }
        
    });
}

/**
 * This method is used to initialise a datatable for a particular page.
 */
function initTable(section)
{
    var ajaxScriptUrl = "ajax/"+section+"List.php";
    
    $(function() {
        dataTable = $('#dataTable').dataTable({
        "bPaginate"         : true,
        "bLengthChange"     : true,
        "bFilter"           : true,
        "bInfo"             : false,
        "bSort"             : false,
        "bAutoWidth"        : true,
        "bProcessing"       : true,
        "bServerSide"       : true,
        "sAjaxSource"       : ajaxScriptUrl,
        "bScrollInfinite"   : true,
        "bScrollCollapse"   : false,
        "sScrollY"          : "550px"
        });
    });
}



/**
 * This method is used for logging users into the
 * system.
 */
function login()
{
    var url = "scripts/loginScript.php";
    
    $.get(url, {username : $("#username").val(), password : $("#password").val()}, 
    function(data)
    {   
        var result = data;
        
        if(result == 1)
        {
            window.location = "home.php";
        }
        else
        {
            alert("Incorrect Login Details");
            location.reload(true);
        }
    });
    
}

/**
 * This method is used to log out a user from the system.
 */
function logout()
{
    var url = "scripts/logoutScript.php";
    
    $.post(url, function()
    {   
        alert("Goodbye!!");
        
        window.location = "index.php";
    });
}


