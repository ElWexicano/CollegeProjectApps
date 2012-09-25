/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function Job(jobId)
{
    this.jobId              = jobId;
    this.customer           = null;
    this.collectionDate     = null;
    this.collectionAddress  = null;
    this.deliveryDate       = null;
    this.deliveryAddress    = null;
    this.cost               = null;
    this.trailer            = null;
    this.truck              = null;
}


Job.deleteJob = function(jobId)
{
    this.jobId      = jobId;
    
    var url = "scripts/deleteJob.php"
    
    $.post(url, {jobId : this.jobId}, function()
    {
        alert('Job Deleted Successfully');
        
        loadSection('jobs');
    });
}

Job.addJob = function()
{
    this.getFormDetails();
    
    var url = "scripts/addJob.php";
    
    $.post(url, 
    {
        customerId          : this.customer,
        collectionDate      : this.collectionDate,
        collectionAddress   : this.collectionAddress,
        deliveryDate        : this.deliveryDate,
        deliveryAddress     : this.deliveryAddress,
        cost                : this.cost,
        trailer             : this.trailer,
        truck               : this.truck
    }, 
    function()
    {
        alert('Job Added Successfully');
        
        loadSection('jobs');
    });
}


Job.getFormDetails = function()
{
    this.customer           = $('#customer').val();
    this.collectionDate     = $('#collectionDate').val();
    this.collectionAddress  = $('#collectionAddress').val();
    this.deliveryDate       = $('#deliveryDate').val();
    this.deliveryAddress    = $('#deliveryAddress').val();
    this.cost               = $('#cost').val();
    this.trailer            = $('#trailer').val();
    this.truck              = $('#truck').val();
}



Job.editJob = function(jobId)
{
    $('.jobsDialog').dialog("open");
    
    this.jobId = jobId;
    
    var url = "ajax/getJobDetails.php";
    
    $.get(url, {jobId : jobId} , function(data)
    {   
        var x = eval('(' + data + ')');
        
        $('.jobsDialog #customer1').val(x['customerName']);
        $('.jobsDialog #cost1').val(x['jobCost']);
        $('.jobsDialog #truck1').val(x['truckReg']);
        $('.jobsDialog #trailer1').val(x['trailerReg']);
        $('.jobsDialog #collectionDate1').val(x['collectionDate']);
        $('.jobsDialog #collectionAddress1').val(x['collectionAddress']);
        $('.jobsDialog #collectionStatus1').val(x['collectionStatus']);
        $('.jobsDialog #deliveryDate1').val(x['deliveryDate']);
        $('.jobsDialog #deliveryAddress1').val(x['deliveryAddress']);
        $('.jobsDialog #deliveryStatus1').val(x['deliveryStatus']);
        $('.jobsDialog #jobStatus1').val(x['jobStatus']);
        
    });
    
}


Job.updateJob = function()
{
    var url = 'scripts/updateJob.php';

    $.post(url, 
    {
        jobId : this.jobId,
        customerName : $('.jobsDialog #customer1').val(),
        cost : $('.jobsDialog #cost1').val(),
        truckReg : $('.jobsDialog #truck1').val(),
        trailerReg: $('.jobsDialog #trailer1').val(),
        collectionDate: $('.jobsDialog #collectionDate1').val(),
        collectionAddress: $('.jobsDialog #collectionAddress1').val(),
        collectionStatus: $('.jobsDialog #collectionStatus1').val(),
        deliveryDate: $('.jobsDialog #deliveryDate1').val(),
        deliveryAddress: $('.jobsDialog #deliveryAddress1').val(),
        deliveryStatus: $('.jobsDialog #deliveryStatus1').val(),
        jobStatus: $('.jobsDialog #jobStatus1').val()
    }, 
    function(data)
    {  
        alert("Job Updated Successfully")
        
        $('#dialog').remove();
        
        $('.jobsDialog').dialog('close');
        
        loadSection('jobs');
    });
}




/**
 * This method is used to either show or hide the collection / delivery
 * details for a job.
 * 
 * @param tableData
 */
Job.showHideDetails = function(tableData)
{
    var tableRow    = tableData.parentNode.parentNode;
    var url         = "ajax/jobDetails.php";
    
    $.get(url, {jobId : $(tableRow).children(0).html()} , function(data)
    {   
        if ( $(tableData).html() == 'Hide' )
        {
            $(tableData).html('Show');
            dataTable.fnClose( tableRow );
        }
        else
        {
            $(tableData).html('Hide')
            dataTable.fnOpen( tableRow, data, 'details' );
        }
    });

}