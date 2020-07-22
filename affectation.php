<?php
require_once 'include/_view/header.php';

require_once 'include/include.php';

$materiels = selectAll('materiels');
$services = selectAll('services');

if (isset($_POST['save'])) {

	$date_affectation = date('Y').'-'.date('m').'-'.date('d');

	$request = "INSERT INTO `affectation`(`service_id`, `materiel_id`, `date_affectation`) VALUES (".$_POST['service_id'].",".$_POST['service_id'].",'".$date_affectation."')";

	 $db = seconnecter();

	 if ($db->exec($request)) {
	 	echo "<script>alert('Enregistre reussi') </script>";
	 }else{
	 	echo "alert('Error')";
	 }

}

?>



<div class="container">
	<form action="#" method="post">
		<div class="row">
			<div class="form-group col-md-3">
				<label for="email">Nom du materiel</label>
				<select name="materiel_id" id="" class="form-control">

					<?php foreach ($materiels as $materiel) : ?>
						<option value="<?= $materiel['id']?>">
							<?= $materiel['nom'].' '.$materiel['numero_serie'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group col-md-3">
				<label for="email">Nom du Service</label>
				<select name="service_id" id="" class="form-control">

					<?php foreach ($services as $service) : ?>
						<option value="<?= $service['id']?>">
							<?= $service['nom'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>


			<div class="col col-md-3">
				<div class="form-group">
					<label for=""></label>
					<button type="submit" name="save" class="btn btn-primary btn-block">Enregistre</button>
				</div>
				
			</div>
		</div>
	</form> 
	
</div>

<?php
require_once 'include/_view/footer.php';

?>