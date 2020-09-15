<?php
require_once 'include/_view/header.php';

require_once 'include/include.php';

$materiels = selectAll('materiels');
$services = selectAll('services');

$materiels_services = execute_query('SELECT * FROM services JOIN affectation on affectation.service_id = services.id');

if (isset($_POST['save'])) {

	$date_affectation = date('Y').'-'.date('m').'-'.date('d');

	$request = "INSERT INTO `affectation`(`service_id`, `materiel_id`, `date_affectation`) VALUES (".$_POST['service_id'].",".$_POST['materiel_id'].",'".$date_affectation."')";

	 $db = seconnecter();

	 if ($db->exec($request)) {
	 	echo "<script>alert('Enregistrement réussi') </script>";
	 }else{
	 	echo "alert('Error')";
	 }

}

?>




<div class="container">
	<form action="" method="post">
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


	<div class="col-md-12">

		<div class="card">
			<div class="card-body">
				<table class="table table-hover table-bordered">

					<thead>
						<th>SERVICE</th>
						<th>MATERIEL</th>
						<th>DATE</th>
					</thead>

					<tbody>
						<?php foreach ($materiels_services as  $value): ?>

							<tr>
								<td>
					
									<?= $value['nom']?>
								</td>
								<td>
									<?php 

									$table =get_name_byID('materiels',$value['materiel_id']);

									// echo "<pre>";

									// var_dump($table);

									// echo "</pre>";

									if(count($table) > 0){
										echo $table[0]['nom'].' -  '. $table[0]['numero_serie'];

									}
									
									?>
								</td> 
								<td>
									<?= $value['date_affectation']?>
								</td>
								<td><a href="affectation_delete.php?service_id=<?= $value['service_id']?> & materiel_id=<?=$value['materiel_id'] ?>">Delete</a></td>
					
							</tr>
							
						<?php endforeach ?>
					</tbody>
					
				</table>
			</div>
		</div>
		
	</div>
	
</div>

<?php
require_once 'include/_view/footer.php';

?>