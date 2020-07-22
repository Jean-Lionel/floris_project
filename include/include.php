<?php
session_start();
require_once 'config/database.php';
require_once 'app/function.php';

// if(!isset($_SESSION['user_connect'])){
// 	header('Location : login.php');
// 	exit;
// }