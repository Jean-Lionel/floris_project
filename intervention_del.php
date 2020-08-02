<?php

$id = $_GET['id'];

var_dump($id);



require_once 'include/include.php';
$res = deleteById('intervantion',$id);

header('Location: intervation.php');

exit;
