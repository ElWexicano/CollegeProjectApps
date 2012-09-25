function Validate()
{
    
}


Validate.email = function(emailAddress)
{
    var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if (emailAddress.search(pattern)==-1)
    {
        alert("Please enter a correct email address");
    }
}


Validate.telephone = function(telephone)
{
    var pattern = /^([0-9]*|\d*\.\d{1}?\d*)$/;
    
    if (!telephone.search(pattern)==-1)
    {
        alert("Please enter a correct telephone. Between 6 and 12 charachters");
    }
    else if((telephone.length < 6)||(telephone.length > 12))
    {
        alert("Please enter a correct telephone. Between 6 and 12 charachters");
    }

}


Validate.address = function(address)
{
    var pattern = /^[a-zA-Z\d]+(([\'\,\.\- #][a-zA-Z\d ])?[a-zA-Z\d]*[\.]*)*$/;
    
    if (address.search(pattern)==-1)
    {
        alert("Please enter a correct address");
    }
}



Validate.number = function(number)
{
    var pattern = /^([0-9]*|\d*\.\d{1}?\d*)$/;
        
    if(number.search(pattern)==-1)
    {
        alert("Please enter a correct number");
    }
    else if(number.length <= 0)
    {
        alert("Please enter a correct number");
    }
}


Validate.date = function(date)
{
    var pattern = '^(19|20)?[0-9]{2}[- -.](0?[1-9]|1[012])[- -.](0?[1-9]|[12][0-9]|3[01])$';
    
    if(date.search(pattern)==-1)
    {
        alert("Please enter a correct date. eg YYYY-MM-DD");
    }
}


Validate.reg = function(reg)
{
    var pattern = '^[0-1][0-9][a-zA-Z]{1,2}[0-9]{1,7}$';

    if(reg.search(pattern)==-1)
    {
        alert("Please enter a correct vehicle registration. eg 00WX999");
    }
    
}

Validate.string = function(string)
{
    var pattern = '^[a-zA-Z0-9]+$';
    
    if(string.search(pattern)==-1)
    {
        alert("Alpha Numeric Charachters Only!");
    }
}