<?php
require_once 'include/_view/header.php';
require_once 'include/include.php';

if (isset($_POST['save'])) {
	
	$req = "INSERT INTO techniciens(nom,prenom,telephone,matricule) VALUES (
	'".$_POST['nom']. "','".$_POST['prenom']."','".$_POST['telephone']."','".$_POST['matricule']."'
)";
$db = seconnecter();

if ($db->exec($req)) {
	echo "<script> alert('Enregistrement reussi') </script>";
}else{

}


}

?>


<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<form action="#" method="post">
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" name="nom" class="form-control">
			</div>
			<div class="form-group">
				<label for="prenom">Prenom</label>
				<input type="text" name="prenom" class="form-control">
			</div>
			<div class="form-group">
				<label for="telephone">Telephone</label>
				<input type="text" name="telephone" class="form-control">
			</div>
			<div class="form-group">
				<label for="matricule">Matricule</label>
				<input type="text" name="matricule" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="save" value="Enregistre" class="btn btn-success btn-block">
			</div>

		</form>
	</div>
</div>

</div>



<?php
require_once 'include/_view/footer.php';

?>