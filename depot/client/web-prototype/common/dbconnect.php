<?php

/**
@author: Anant Bhardwaj
@date: 02/14/2011
*/

//$hostname='127.0.0.1:3306';
//$username='root';
//$password='Anant$04';
//$dbname='cs247';

//Connect To Database
$hostname='cs247.db.7039406.hostedresource.com';
$username='cs247';
$password='P@ssw0rd';
$dbname='cs247';
@mysql_connect($hostname,$username, $password) or die ('Unable to connect to database! Please try again later.');

define("DATABASE", $dbname);

?> 