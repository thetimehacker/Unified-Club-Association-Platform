<?php

	include('../connection.php');

	//-->> trim all the data using a trim function
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$c_value= $_POST['c_value'];
	$email= $_POST['email'];
	// echo $uname.' '.$pass.' '.$c_value.' '.$email;

	//-->> validate email and username 



	if(validate()){

		// echo 3;
		//preparing a query
		//we will be checking both email and password
		$check=$db->prepare('SELECT * FROM Signup_form_data WHERE  email = ? OR user_name = ?'); //
		//we want email and username both unique ... thats why we used email and username in prepare query

		$data=array($email,$uname); //
		//execute the query by combining data in the check table
		$check->execute($data);
		if($check->rowcount()==1){ //count will always be 0 or 1
			//account already exists
			echo 0; //->> 0 for already exist account
		}
		else{
			
			//we will create a new account
			//encrypt the password 
			//-->>> $password1_hash=password_hash($pass,PASSWORD_DEFAULT); <-- bhaiya file

			//creating a new query
			$query=$db->prepare("INSERT INTO Signup_form_data(user_name,password,c_value,email) VALUES (?,?,?,?)");
			$data=array($uname,$pass,$c_value,$email);

			//execute 
			if($query->execute($data)){
				//->>> starting a session -- bhaiya file
				// $_SESSION['user_name'] = $uname;	
				echo 1;
			}
			else echo 2;


		}

	}

	//trim function
	function trim_data(){
		//-->> to complete this function
	}

	function validate(){
		//-->> to complete this function
		return true;
	}

?>