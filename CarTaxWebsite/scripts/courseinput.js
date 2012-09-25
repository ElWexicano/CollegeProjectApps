function focusLabels() {
  if (document.getElementById("studentupdate")) return false;
    if (document.getElementById("courseupdate")) return false;
  if (!document.getElementsByTagName) return false;
  var labels = document.getElementsByTagName("label");
  for (var i=0; i<labels.length; i++) {
    if (!labels[i].getAttribute("for")) continue;
    labels[i].onclick = function() {
      var id = this.getAttribute("for");
      if (!document.getElementById(id)) return false;
      var element = document.getElementById(id);
      element.focus();
    }
  }
   var inputs = document.getElementsByTagName("input");
   firstelement= inputs[0].getAttribute("id");
   document.getElementById(firstelement).focus();
   document.getElementById(firstelement).value="";
 }
 
 

function resetFields(whichform) {
  if (document.getElementById("courseupdate")) return false;
  if (document.getElementById("studentupdate")) return false;

  for (var i=0; i<whichform.elements.length; i++) {
    var element = whichform.elements[i];
    if (element.type == "submit") continue;
    if (element.type == "reset") continue;
    if (!element.defaultValue) continue;
    element.onfocus = function() {
    if (this.value == this.defaultValue) {
      this.value = "";
     }
    }
    element.onblur = function() {
      if (this.value == "") {
        this.value = this.defaultValue;
      }
    }
  }
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}

function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function compareDate(dd,mm,yy) {
	var now = new Date();

	var eventdate = new Date(yy, mm, dd);
	var invaliddate=false;
        if (now > eventdate ) {
	           invaliddate= true;
	           }

	 if (invaliddate) {
		return false
         } else {
            return true;
         }        
}

function isDate(dtStr){
var dtCh= "-";
var minYear=1900;
var maxYear=2100;
	var daysInMonth = DaysArray(12);
	var pos1=dtStr.value.indexOf(dtCh);
	var pos2=dtStr.value.indexOf(dtCh,pos1+1);
	var strYear=dtStr.value.substring(0,pos1);
	var strMonth=dtStr.value.substring(pos1+1,pos2);
	var strDay=dtStr.value.substring(pos2+1);
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
        if (isNaN(strMonth) || isNaN(strDay) || isNaN(strYear))
        {       alert("Please enter a valid date .. Cannot contain illegal characters")
		return false;
        }
	day=parseInt(strDay)
	month=parseInt(strMonth)
	year=parseInt(strYear)
	if (pos1==-1 || pos2==-1){
		alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
      
        if (!compareDate(day,month-1,year)) {
           alert("The date must be > todays date")
	   		return false
         }

return true
}

function validateForm(whichform) {
  for (var i=0; i<whichform.elements.length; i++) {
    var element = whichform.elements[i];
    if (element.className.indexOf("required") != -1) {
      if (!isFilled(element)) {
        alert("Please complete the "+element.name+" field.");
        element.focus();
        return false;
      }
    }

    if (element.className.indexOf("code") != -1) {
      if (!isValidCode(element)) {
        
        element.focus();
        return false;
      }
    }
  
      if (element.className.indexOf("datein") != -1) {
        if (!isDate(element)) {
          alert("Please fill in the "+element.name+" field correctly. Datesmust be in the form YYYY-MM-DD.");
          element.focus();
          return false;
        }
      }
 
    
    if (element.className.indexOf("numeric") != -1) {
          if (!isNumeric(element)) {
            alert("The "+element.name+" field must be a valid numeric value.");
            element.focus();
            return false;
      }
    }

    if (element.className.indexOf("inrange") != -1) {
          if (!isInRange(element)) {
            alert("The "+element.name+" field must be in the range 0 - 600 inclusive.");
            element.focus();
            return false;
      }
    }

 if (element.className.indexOf("student") != -1) {
          if (!isStudentCode(element)) {
            alert("The "+element.name+" field must be 8 digits.");
            element.focus();
            return false;
      }
    }

 if (element.className.indexOf("marks") != -1) {
          if (!isMarksRange(element)) {
            alert("The "+element.name+" field must be in the range 0 - 100 inclusive.");
            element.focus();
            return false;
      }
    }

    }
     
  return true;
}

function isFilled(field) {
  if (document.getElementById("courseupdate")) field.defaultValue = "";
  if (field.value.length < 1 || field.value == field.defaultValue) {
    return false;
  } else {
    return true;
  }
}

function isNumeric(field) {
  if (isNaN(field.value)|| field.value.length < 1){
    return false;
  } else {
    return true;
  }
}

function isInRange(field) {
  if ((field.value<0) || (field.value>600)) {
     return false;
} else {
    return true;
  }
}

function isMarksRange(field) {
  if ((field.value<0) || (field.value>100)) {
     return false;
} else {
    return true;
  }
}

function isStudentCode(field) {
  if (isNaN(field.value) || (field.value.length!=8)) {
     return false;
} else {
    return true;
  }
}

function isValidCode(field) {
  partone=field.value.substring(0,2);
  remainder= field.value.substring(2,field.value.length);
  partonec = partone.toLowerCase();
  if ((partonec != "wd") || (remainder.length < 3 || isNaN(remainder))){
     return false;
} else {
    return true;
  }
}



function prepareForms() {
  for (var i=0; i<document.forms.length; i++) {
    var thisform = document.forms[i];
    resetFields(thisform);
    thisform.onsubmit = function() {
      return validateForm(this);
    }
  }
}

addLoadEvent(focusLabels);
addLoadEvent(prepareForms);