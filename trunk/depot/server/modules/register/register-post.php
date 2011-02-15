<?php

	/**
	@author: Anant Bhardwaj
	@date: 02/14/2011
	*/
	
	//Start session
	session_start();
	
	//Include database connection details
	require_once "../../common/dbconnect.php";

	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	
	//Select database	
	$db = mysql_select_db(DATABASE);
	
	if(!$db) {
		die("Unable to select database");
	}
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$fname = clean($_POST['firstname']);
	$lname = clean($_POST['lastname']);
	$emailid = clean($_POST['emailid']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	
	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($emailid == '') {
		$errmsg_arr[] = 'Email ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($emailid != '') {
		$qry = "SELECT * FROM users WHERE emailid='$emailid'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Email ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		echo "Register Failed";
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO users(emailid, name, last_name, password) VALUES('$emailid', '$fname','$lname', '$password')";
	$result = @mysql_query($qry);
	$_SESSION['SESS_MEMBER_ID'] = $emailid;
	$_SESSION['SESS_FIRST_NAME'] = $fname;
	//Check whether the query was successful or not
	if($result) {
		session_write_close();
		echo "Register Successful";
		exit();
	}else {
		die("Query failed");
	}
?>