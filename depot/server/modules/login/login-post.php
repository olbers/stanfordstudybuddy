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
	$emailid = clean($_POST['emailid']);
	$password = clean($_POST['password']);

	
	//Input Validations
	if($emailid == '') {
		$errmsg_arr[] = 'Email ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query

	
	$qry="SELECT * FROM users WHERE emailid='$emailid' AND password='$password'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];			
			session_write_close();
			echo "Login Successful";
			exit();
		} else {
			//Login failed
			$errmsg_arr[] = "Either Email ID or the password is incorrect" ;
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			echo "Login Failed";
			exit();
		}
	}else {
		die("Query failed");
	}
?>