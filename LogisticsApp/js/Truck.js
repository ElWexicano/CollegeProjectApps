/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Truck(reg,year,make)
{
    this.registration = reg;
    this.year         = year;
    this.make         = make;
    this.status       = null;
    this.doe          = 0;
    this.taxed        = 0;
    this.insured      = 0;
}


Truck.deleteTruck = function(reg)
{
    this.registration = reg;
    
    var url = "scripts/deleteVehicle.php"
    
    $.post(url, {vehicleReg : this.registration}, function()
    {
        alert('Truck Deleted Successfully');
        
        loadSection('trucks');
    });
}


Truck.addTruck = function()
{
    this.getFormDetails();
    
    var url = "scripts/addTruck.php";
    
    $.post(url, 
    {
        reg         : this.registration,
        year        : this.year,
        make        : this.make,
        status      : this.status,
        doe         : this.doe,
        insured     : this.insured,
        taxed       : this.taxed
    }, 
    function()
    {
        alert('Truck Added Successfully');
        
        loadSection('trucks');
        
    });
}


Truck.getFormDetails = function()
{
    this.registration = $('#registration').val();
    this.year         = $('#year').val();
    this.make         = $('#make').val();
    this.status       = $('#status').val();
    this.doe          = $('#doe').is(':checked') == true ? 1 : 0;
    this.taxed        = $('#taxed').is(':checked') == true ? 1 : 0;
    this.insured      = $('#insured').is(':checked') == true ? 1 : 0;
}

Truck.editTruck = function(registration)
{
    $('.trucksDialog').dialog('open');
    
    this.registration = registration;
    
    var url = "ajax/getTruckDetails.php";
    
    $.get(url, {registration : registration} , function(data)
    {   
        var x = eval('(' + data + ')');
        
        $('.trucksDialog #registration').val(x['vehicleReg']);
        $('.trucksDialog #year').val(x['vehicleYear']);
        $('.trucksDialog #status').val(x['vehicleStatus']);
        $('.trucksDialog #make').val(x['truckMake']);
        
        if(x['truckDOE']==1)
        {
            $('.trucksDialog #doe').attr('checked', true);
        }
        if(x['truckInsured']==1)
        {
            $('.trucksDialog #insured').attr('checked', true);
        }
        if(x['truckTaxed']==1)
        {
            $('.trucksDialog #taxed').attr('checked', true);
        }
    });
    
}


Truck.updateTruck = function()
{
    var url = 'scripts/updateTruck.php';
    
    $.post(url, 
    {
        registration : $('.trucksDialog #registration').val(),
        year : $('.trucksDialog #year').val(),
        status : $('.trucksDialog #status').val(),
        make : $('.trucksDialog #make').val(),
        insured : $('.trucksDialog #insured').is(':checked') == false ? 0 : 1,
        doe : $('.trucksDialog #doe').is(':checked') == false ? 0 : 1,
        taxed : $('.trucksDialog #taxed').is(':checked') == false ? 0 : 1
    }, 
    function(data)
    {  
        alert("Truck Updated Successfully");
        
        $('.trucksDialog').remove();
        $('.trucksDialog').dialog('close');
        
        loadSection('trucks');
        
    });
}