<?php
	//$server='mysql4.000webhost.com';

	$server='localhost';
	$username='root';
	$password='';
	$db_name='kennetha_ebox';
	$con =  mysqli_connect($server,$username,$password,$db_name) or die("An error occurred  ".mysqli_connect_error());
	 /*
	if(!$con)
	{
	echo "Not Connected..".mysqli_connect_error();
	}
	
	else
	{
	echo "Connected ";

	} 
	 
	*/
?>