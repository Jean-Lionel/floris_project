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
