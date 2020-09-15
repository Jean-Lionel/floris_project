<?php

function extract_data(array $table){
	$new_table = [];

 
	foreach ($table as $key => $value) {
		$new_table[':'. $key] = $value;
	}

	return $new_table;
}

function insert($table,$table_name){

	$db = seconnecter();

	$tab = extract_data($table);

	$queryString = "INSRET INTO ". $table_name. "(". implode(array_keys($table), ',') .")
	 VALUES (  ". implode(array_keys($tab),"," )  .")";

	$q = $db->prepare($queryString);

	if($q->execute($tab)){

		return true;
	}

	return false;

}


function selectAll($table){

	$query = "SELECT * FROM ".$table;

	$db = seconnecter();

	$sql = $db->query($query);

	return $sql->fetchAll();
}

function selectById($table , $id){
	$query = "SELECT * FROM ".$table." WHERE id = ". $id;

	$db = seconnecter();

	$sql = $db->query($query);
	
	return $sql->fetchAll();

}


function deleteById($table , $id){
      $db = seconnecter();
      $query = "DELETE FROM ".$table." WHERE id =".$id;
      $sql = $db->query($query);

      return $sql;
 }

 //la function permettant de verifier qu'utilisateur est connecter
 //Retourne boolean or array

 function checkConnectedUser($authencate_user){
 	if($authencate_user == null){
 		header('Location : login.php');
 		exit;
 	}else{
 		return $authencate_user;
 	}
 }

 //Function returnant de l utilisateur connecter


 function get_user_type($user){
 	//Condition ternaire 

 	return $user['role'] == 'ADMIN' ? true : false;

 }

 //Excute query

 function execute_query($sql)
 {
 	$db = seconnecter();

 	$result = $db->query($sql);

 	return $result->fetchAll();
 }

 function delete_querry($sql){
 	$db = seconnecter();
 	$result = $db->query($sql);

 }

 function get_name_byID($table,$id )
 {

 	

 	$result = execute_query('SELECT * from '.$table.' WHERE id = '.$id);


 	return $result;
 }
