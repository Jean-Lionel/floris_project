<?php
require_once 'app/auth.php';

check_user_connecter();


require_once 'include/include.php';

$service_id =  $_GET['service_id'];

$materiel_id = $_GET['materiel_id'];


$sql = "DELETE FROM `affectation` WHERE `affectation`.`service_id` = $service_id  AND `affectation`.`materiel_id` = $materiel_id";

delete_querry($sql);

header('Location: affectation.php');
exit;