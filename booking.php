<?php


require_once('/home/swv1071/public_html/conf/settings.php');
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($sql_host,
		$sql_user,
		$sql_pass,
		$sql_db
		
	);
  
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		// Upon successful connection
		
		// Get data from the form
	$sql_table = "booking";
	$customerName = $_POST['cname'];
	$phoneNumber = $_POST['phone'];
	$unitNumber = $_POST['unumber'];
	$streetNumber = $_POST['snumber']
	$streetName = $_POST['stname'];
	$suburb = $_POST['sbname'];
	$destinationSuburb = $_POST['dsbname'];
	$pickupDate = $_POST['date'];
	$pickupTime = $_POST['time'];
	
	$pickupDate = date("d/m/y");
	$pickupTime = date("g:i");
	
	
	do{
	$sql_table = "booking";
	$referenceNumber=  BRN.rand(00000, 99999);
	$sql_ref = "select * from $sql_table where reference = '$referenceNumber' ";
	$sql_unique=@mysqli_query($conn, $sql_ref);}
	while(@mysqli_num_rows($sql_unique)!=0);
	
	$query = "INSERT INTO booking (reference, customerName, phoneNumber, unitNumber,  streetNumber, streetName, suburb, destinationSuburb, pickupDate , pickupTime )VALUES('$referenceNumber ', '$customerName','$phoneNumber', '$unitNumber', '$streetNumber', '$streetName', '$suburb', '$destinationSuburb', '$pickupDate', '$pickupTime')";
	if(mysqli_query($conn, $query)){
	//$pickupdate = date('d/m/y', strotime($pickupDate));
	//$pickuptime = date('HH:mm', strotime($pickupTime));

	//echo(toXML($referenceNumber,$pickupTime,$pickupDate));
	ECHO("Thank you for your booking! 
	<br> Booking reference number:&nbsp&nbsp&nbsp&nbsp$referenceNumber
	<br> Pickup time:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$pickupTime 
	<br> Pickup date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$pickupDate"; 
		
	}else {
    	echo "<p> Somthing is wrong with", $query, "</p>" . mysqli_error($conn);
	}    
 		// close the database connection
		mysqli_close($conn);
 } // if successful database connection
?>