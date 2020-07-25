<?php

function estConnecter(): bool{

	if(session_status() === PHP_SESSION_NONE){
		session_start();
	}

	return !empty($_SESSION['user']);
}

function check_user_connecter(): void{
	if (!estConnecter()) {
		header('Location: login.php');
		exit;
	}
}