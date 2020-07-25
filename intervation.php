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

    if($db->exec($request)){
      echo " <script> Enregistrement réussi </script>";
    }else{
      echo "ERROR";
    }




}


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

</div>



<?php
require_once 'include/_view/footer.php';

?>