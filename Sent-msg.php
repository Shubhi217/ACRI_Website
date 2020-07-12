<?php
/*
email_address
*/
$skill = "ichixd01@gmail.com";

/*
page supporting msg_box
*/
$Msg_Subject = "ACRI Contact information";
/*
This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.
*/

/*
This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.
*/
//$email =$_POST['email'];
//$phone =$_POST['phone'] ;
$msg =$_POST['msg'] ;
$name =$_POST['name'] ;
$contact =$_POST['contact'] ;
$email =$_POST['email'] ;




$msg_admin =
"Name: " . $name . "\r\n" .
"Contact: " . $contact . "\r\n" .
"Msg: " . $msg . "\r\n" .
"email " . $email;

$msg_user=
"<html><body>
Thankyou for contacting us. We will get back to you shortly.
</body></html>";


$headers = "MIME-Version:1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:info@acriresearch.com' . "\r\n";
$headers .= 'Cc: skilloxide@gmail.com' . "\r\n";

/*
The following function checks for email injection.
Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
*/




// If the form fields are empty, redirect to the error page.
if (empty($name) || empty($email) || empty($msg) || empty($contact)) {
	echo json_encode('Plz Complete The Feedback Form!!!');
}



// If we passed all previous tests, send the email then redirect to the thank you page.
else {
	$state = TRUE;

	//Database start
	$servername = "localhost";
	$username = "u618996845_root_1";
	$password = "skilloxide";

	try {

	$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS u618996845_skilloxide";
		if ($conn->query($sql) === True){
			$conn = new mysqli($servername, $username, $password, "u618996845_skilloxide");
			if ($conn){
				$sqlTable = "CREATE TABLE IF NOT EXISTS contactAdmin (
						sno int(5) auto_increment primary key not null,
                        name VARCHAR(30) NOT NULL,
                        contact VARCHAR(12) NOT NULL,
                        email VARCHAR(30) NOT NULL,
                        msg VARCHAR(60) NOT NULL)";
					if ($conn->query($sqlTable) === True){
						
						$sqlInsert = "INSERT INTO contactAdmin (name,email,msg,contact)VALUES ("."'".$name."',".
						"'".$email."',".
						"'".$msg."',".
						"'".$contact."')";
						

						if ($conn->query($sqlInsert) === TRUE){

						}
						else{
							echo json_encode("".$conn->error);
							$state = FALSE;
						}
					}
					
					else{
						echo json_encode("Error creating Table".$conn->error);
						$state = FALSE;
					}
				}
			else{
				echo json_encode("error");
				$state = FALSE;
			}
		} 
		
		else {
			echo json_encode("Error creating database: " . $conn->error);
			$state = FALSE;
		}

		$conn->close();

	}
	catch(Exception $e){
		echo json_encode("Connection failed: ".str($e));
	}
finally{
		//Sent mail
		if ($state == TRUE){
			mail($skill,$Msg_Subject,$msg_admin, $headers);
			mail($email,$Msg_Subject,$msg_user,$headers);
		    echo json_encode('success');
		}
		else{
			echo json_encode('Something went wrong');
		}
	
	}
}
?>