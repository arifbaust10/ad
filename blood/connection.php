<?php 
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="blood";

	$conne = mysqli_connect($servername,$username,$password,$dbname);

	if(!$conne){
		echo "not connected so sad";
	}


?>