/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function Trailer(reg,year,type,status)
{
    this.registration = reg;
    this.year         = year;
    this.type         = type;
    this.status       = status;
}


Trailer.deleteTrailer = function(reg)
{
    this.registration = reg;
    
    var url = "scripts/deleteVehicle.php"
    
    $.post(url, {vehicleReg : this.registration}, function()
    {
        alert('Trailer Deleted Successfully');
        
        loadSection('trailers');
    });
}


Trailer.addTrailer = function()
{
    this.getFormDetails();
    
    var url = "scripts/addTrailer.php";
    
    $.post(url, 
    {
        reg         : this.registration,
        year        : this.year,
        type        : this.type,
        status      : this.status
    }, 
    function()
    {
        alert('Trailer Added Successfully');
        
        loadSection('trailers');
    });
}


Trailer.getFormDetails = function()
{
    this.registration = $('#registration').val();
    this.year         = $('#year').val();
    this.type         = $('#type').val();
    this.status       = $('#status').val();
}

Trailer.editTrailer = function(registration)
{
    $('.trailersDialog').dialog('open');
    
    this.registration = registration;
    
    var url = "ajax/getTrailerDetails.php";
    
    $.get(url, {registration : registration} , function(data)
    {   
        var x = eval('(' + data + ')');
        
        $('.trailersDialog #registration').val(x['vehicleReg']);
        $('.trailersDialog #year').val(x['vehicleYear']);
        $('.trailersDialog #status').val(x['vehicleStatus']);
        $('.trailersDialog #type').val(x['trailerType']);
    });
    
}


Trailer.updateTrailer = function()
{
    var url = 'scripts/updateTrailer.php';
    
    $.post(url, 
    {
        registration : $('.trailersDialog #registration').val(),
        year : $('.trailersDialog #year').val(),
        status : $('.trailersDialog #status').val(),
        type : $('.trailersDialog #type').val()
    }, 
    function(data)
    {  
        alert("Trailer Updated Successfully");
        
        $('.trailersDialog').remove();
        $('.trailersDialog').dialog('close');
        
        loadSection('trailers');
        
    });
}
