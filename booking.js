var now = new Date();

function getDate(){
    var year = today.getFullYear();
    var month = ' ' + (today.getMonth()+1);
    var day = ' ' + now.getDate();
	
    if (day >=0 && day <= 9) {
	day = "0" + day;
	 }
    if (month >=1 && month <=9) {
	month = "0" + month;
	}
   
    var date = day + "/" + month "/" + year;
    document.getElementById("dateShow").value = date;
    document.getElementById("dateShow").setAttribute("min",date);
}

function getTime(){
    var time = now.getHours() + ":" + today.getMinutes();
    document.getElementById("timeShow").value = time;
    document.getElementById("timeShow").setAttribute("min", time);
}


var xhr = createRequest();
function getData(dataSource, divID, name, phone, unitNumber, unitNumber, streetName, suburb, date, time, destinationSuburb) {
	
	if(xhr) {
		var obj = document.getElementById(divID);
		var requestbody ="name="+encodeURIComponent(name)
		+"&phone="+encodeURIComponent(phone)
		+"&unitNumber="+encodeURIComponent(unitNumber)
		+"&streetNumber="+encodeURIComponent(streetNumber)
		+"&streetName="+encodeURIComponent(streetName)
		+"&suburb="+encodeURIComponent(suburb)
		+"&pickupDate="+encodeURIComponent(date)
		+"&pickupTime="+encodeURIComponent(time);
		+"&destinationSuburb="+encodeURIComponent(destinationSuburb);
		
				
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		xhr.onreadystatechange = function() {
			alert(xhr.readyState); // debug
			if (xhr.readyState == 4 && xhr.status == 200) { // success!
				obj.innerHTML = xhr.responseText;			}
		}	
		}
		 
	xhr.send(requestbody); // send the input fields to php
		
	}
}


