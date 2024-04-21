<?php 
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="ums";

	$conne = mysqli_connect($servername,$username,$password,$dbname);

	if(!$conne){
		echo "not connection";
	}


?>
