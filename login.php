<?php
require_once 'include/include.php';


if(isset($_POST['connect'])){
	$user_name = $_POST['login'];
	$password =sha1($_POST['password']);

	$db = seconnecter();

	$query = "SELECT * FROM `utilisateurs` WHERE login='$user_name' AND password= '$password' LIMIT 1";
	
	$result = $db->query($query);

	$row = $result->fetchAll();

	if(count($row) > 0){
		$user = $row[0];

		$_SESSION['user_connect'] = $user;
		header('Location: index.php');
		exit;
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Intervention Informatique</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<link rel="stylesheet" href="asset/css/login.css">
	<script src="include/js/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="login-form" style="width:600px">

		<form action="" method="post">
			<div class="form-group row">
				<div class="col-md-3 col-form-label">
					<label for="user_name">Utilisateur</label>
				</div>
				<div class="col-md-7">
					<input type="text" name="login" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-3 col-form-label">
					<label for="user_name">Mot de pass</label>
				</div>
				<div class="col-md-7">
					<input type="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-3 col-form-label">
					<label for=""></label>
				</div>
				<div class="col-md-7">
					<input type="submit" name="connect" class="form-control btn-primary" value="Connexion">
				</div>
			</div>
		</form>

	</div>


</body>
</html>