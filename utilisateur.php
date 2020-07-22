<?php
require_once 'include/_view/header.php';

require_once 'include/include.php';

if(isset($_POST['save'])){

	//var_dump($_POST);
	

	$password_hash = sha1($_POST['password']);


	$request = "INSERT INTO `utilisateurs`(`nom`, `prenom`, `telephone`, `login`, `password`, `role`) VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['telephone']."','".$_POST['login']."','".$password_hash ."','".$_POST['role']."')";

	 $db = seconnecter();

	 if ($db->exec($request)) {
 	 	echo "<script>alert('Enregistre reussi') </script>";
	 }else{
	 	echo "alert('Error')";
	 }


}

$utilisateurs = selectAll('utilisateurs');

?>


<div class="container">

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<form action="" method="post">
						<h3 class="card-title text-capitalize text-center">Créer un nouveau utilisateur</h3>
				
					<div class="form-group row">
						<div class="col-md-4 text-right">Nom</div>
						<div class="col-md-8">
							<input type="text" name="nom" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4 text-right">prenom</div>
						<div class="col-md-8">
							<input type="text" value="" name="prenom" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4 text-right">telephone</div>
						<div class="col-md-8">
							<input type="text"  name="telephone" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4 text-right">Login</div>
						<div class="col-md-8">
							<input type="text"  name="login" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4 text-right">Mot de passe</div>
						<div class="col-md-8">
							<input type="password"  name="password" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4 text-right">ROLE</div>
						<div class="col-md-8">
							<select name="role" id="role" class="form-control">
								<option value=""> ... choississez le role</option>
								<option value="ADMIN"> ADMINISTRATEUR</option>
								<option value="USER"> UTILISATEUR <option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4 text-right"></div>
						<div class="col-md-8">
							<input type="submit" name="save" value="Enregistre" class="btn-block btn-info">
						</div>
					</div>

				</form>
			</div>
			
		</div>
		<div class="col-md-6">

			<div class="card">
				<table class="table-striped table">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Login</th>
							<th>Role</th>
						</tr>
						
					</thead>
					<tbody>
						<?php foreach ($utilisateurs as $key => $utilisateur): ?>
							<tr>
								<td> <?= $utilisateur['nom'] ?></td>
								<td> <?= $utilisateur['prenom'] ?></td>
								<td> <?= $utilisateur['login'] ?></td>
								<td> <?= $utilisateur['role'] ?></td>
							</tr>
						<?php endforeach; ?>
						
					</tbody>
				</table>
			</div>

			
		</div>
	</div>
</div>





<?php
require_once 'include/_view/footer.php';

?>