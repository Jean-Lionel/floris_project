<?php
require_once 'app/auth.php';

check_user_connecter();



require_once 'include/_view/header.php';
require_once 'include/include.php';


$techniciens = selectAll('techniciens');
$materiels = selectAll('materiels');
$pannes = selectAll('pannes');


$db = seconnecter();

if (isset($_POST['save'])) {


	# code...



	$request = "INSERT INTO `intervantion`(`date_intervation`, `resultat`, `panne_id`, `techinicien_id`, `materiel_id`) VALUES (
	'". $_POST['date_intervation'] ."','".$_POST['resultat']."',".$_POST['panne_id'].",
	".$_POST['techinicien_id'].",".$_POST['materiel_id']."
)";


$db = seconnecter();

$date_panne = $_POST['date_intervation'];

$current_date = date('Y').'-'.date('m').'-'.date('d');

if( $date_panne > $current_date ){

	echo "<script> alert('La date choisit invalide') </script>";
}else{

	if($db->exec($request)){
		echo " <script> Enregistrement réussi </script>";
	}else{
		echo "ERROR";
	}

}






}


$intervantions = selectAll('intervantion');


// INSERT INTO `intervantion`(`id`, `date_intervation`, `resultat`, `techinicien_id`, `materiel_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

?>

<div class="container">

	

	<form action="#" method="post">
		<div class="col-md-5">
			<div class="form-group">
				<label for="">DATE DE PANNE</label>
				<input type="date" name="date_intervation" id="date_intervation" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Panne</label>
				<select name="panne_id" id="" class="form-control">
					<?php foreach ($pannes as $panne): ?>
						<option value="<?= $panne['id'] ?>"> <?= $panne['nom'] ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="">Nom du technicien en service</label>
				<select name="techinicien_id" id="" class="form-control">
					<option value=""> </option>
					<?php foreach ($techniciens as $technicien): ?>
						<option value="<?= $technicien['id'] ?>"> <?= $technicien['nom'].'
						'.$technicien['prenom'] ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group">
				<label for="">Materiel</label>
				<select name="materiel_id" id="" class="form-control">
					<?php foreach ($materiels as $materiel): ?>
						<option value="<?= $materiel['id'] ?>"> <?= $materiel['nom']?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="col-md-5">	

			<div class="form-group">
				<label for="">Resultat</label>

				<textarea name="resultat" id="" cols="30" rows="10" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<input type="submit" name="save" value="Enregistrer" class="btn btn btn-primary btn-block">
			</div>
		</div>

		
	</form>


	<div class="container">
		<table class="table table-sm table-borderded">
			<header>
				<th> Date d'intervention</th>
				<th>Resultat</th>
				<th>Panne</th>
				<th>Technicien</th>
				<th>Action</th>
			</header>

			<body>

				<?php foreach ($intervantions  as $intervantion): ?>
					<tr>
						<td>
							<?= $intervantion['date_intervation'] ?>
						</td>
						<td>
							<?= $intervantion['resultat'] ?>
						</td>
						<td>
							<?= $intervantion['panne_id'] ?>
						</td>
						<td>
							<?= $intervantion['techinicien_id'] ?>
						</td>
						<td>
							
							<a href="intervention_del.php?id=<?= $intervantion['id']?>">Delete</a>
						</td>

					</tr>
					
				<?php endforeach ?>

			</body>
		</table>
	</div>

</div>



<?php
require_once 'include/_view/footer.php';

?>