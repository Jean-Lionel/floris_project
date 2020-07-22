<?php

function seconnecter(){

	try {
		$conn = new PDO('mysql:host=127.0.0.1;dbname=intervantion_informatique', "root","");
		
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		
		
	} catch (Exception $e) {

		die('oops error '. $e->getMessage());
		
	}

	return $conn;
}



