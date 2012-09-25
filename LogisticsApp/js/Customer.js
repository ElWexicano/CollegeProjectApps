/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function Customer(custId, custName)
{
    this.customerId     = custId;
    this.customerName   = custName;
    this.address        = null;
    this.email          = null;
    this.telephone1     = null;
    this.telephone2     = null;
}


Customer.deleteCustomer = function(customerId)
{
    this.customerId = customerId;
    
    var url = "scripts/deleteCustomer.php"
    
    $.post(url, {customerId : this.customerId}, function()
    {
        alert('Customer Deleted Successfully');
        
        loadSection('customers');
    });
}


Customer.addCustomer = function()
{
    this.getFormDetails();
    
    var url = "scripts/addCustomer.php";
    
    $.post(url, 
    {
        customerName : this.customerName,
        email        : this.email,
        address      : this.address,
        telephone1   : this.telephone1,
        telephone2   : this.telephone2
    }, 
    function()
    {
        alert('Customer Added Successfully');
        
        loadSection('customers');
        
    });
}


Customer.getFormDetails = function()
{
    this.customerName   = $('#customerName').val();
    this.email          = $('#email').val();
    this.telephone1     = $('#telephone1').val();
    this.telephone2     = $('#telephone2').val();
    this.address        = $('#address').val();
}


Customer.editCustomer = function(customerId)
{
    $('.customersDialog').dialog('open');
    
    this.customerId = customerId;
    
    var url = "ajax/getCustomerDetails.php";
    
    $.get(url, {customerId : customerId} , function(data)
    {   
        var x = eval('(' + data + ')');
        
        $('.customersDialog #customerName').val(x['customerName']);
        $('.customersDialog #address').val(x['customerAddress']);
        $('.customersDialog #telephone1').val(x['customerTelephone1']);
        $('.customersDialog #telephone2').val(x['customerTelephone2']);
        $('.customersDialog #email').val(x['customerEmail']);
    });
    
}


Customer.updateCustomer = function()
{
    var url = 'scripts/updateCustomer.php';
    
    $.post(url, 
    {
        customerName : $('.customersDialog #customerName').val(),
        customerId : this.customerId,
        customerEmail : $('.customersDialog #email').val(),
        customerAddress : $('.customersDialog #address').val(),
        customerTelephone1 : $('.customersDialog #telephone1').val(),
        customerTelephone2 : $('.customersDialog #telephone2').val()
    }, 
    function(data)
    {  
        alert("Customer Updated Successfully");
        
        $('.customersDialog').remove();
        $('.customersDialog').dialog('close');
        
        loadSection('customers');
        
    });
}


