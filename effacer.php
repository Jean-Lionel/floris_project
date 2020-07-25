<?php
require_once 'app/auth.php';

check_user_connecter();


require_once 'include/include.php';


deleteById($_GET['table'], $_GET['id']);

header('Location: index.php');
exit;