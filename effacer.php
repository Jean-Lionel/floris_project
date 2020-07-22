<?php
require_once 'include/include.php';


deleteById($_GET['table'], $_GET['id']);

header('Location: index.php');
exit;