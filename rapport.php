
<?php
require_once 'app/auth.php';

check_user_connecter();

require_once 'include/_view/header.php';
require_once 'include/include.php';


$query = "SELECT * FROM techniciens t WHERE t.id IN (SELECT i.techinicien_id FROM intervantion i,pannes p WHERE i.panne_id = p.id)";

$techniciens_intervenue = execute_query($query);

if(isset($_GET['id'])){
	$q = "SELECT * FROM pannes p JOIN intervantion i ON p.id = i.panne_id WHERE i.techinicien_id =" . $_GET['id'];

	//echo $q;

	$results = execute_query($q);

	$tech =  get_name_byID('techniciens',$_GET['id']);

	// echo "<pre>";

	// var_dump($r );

	// echo "</pre>";

}

?>

<div class="container">


	<?php if(!isset($_GET['id'])): ?>

		<h1 class="text-info text-center">Rapport des activités</h1>

		<table class="table-sm table table-info table-bordered">
			<thead>
				<tr>
					<th>N~</th>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Action</th>
				</tr>

			</thead>

			<tbody>


				<?php $x=0; foreach ($techniciens_intervenue as $technicien): ?>
				<tr>

					<td><?= ++$x;?></td>
					<td><?= $technicien['nom']?></td>
					<td><?= $technicien['prenom']?></td>
					<td><a href="rapport.php?id=<?=$technicien['id'] ?>" class="btn btn-warning btn-block" >Affiche</a></td>


				</tr>
			<?php endforeach ?>

			
			
		</tbody>
	</table>


<?php else: ?>


	<div>
		<p><button id="imprimer">IMPRIMMER</button></p>
	</div>


	<div id="print_data">
		<table width="100%">
			<tr>
				<td width="50%">
				NOM : <b><?= $tech[0]['nom']?></b><br>
				PRENOM : <b><?= $tech[0]['prenom'] ?></b>

			</td>
				<td width="50%">Date: <b><?php echo date('Y-m-d'); ?></b></td>
			</tr>
		</table>

		<table width="100%">

			<?php foreach ($results as $result): ?>
				
				<tr>
					<td><b>NOM DU PANNES : <?= $result['nom']?></b></td>
					<td> Date de panne : <?= $result['date_panne']?> </td>

					<td>Date d'Intervention : <?= $result['date_intervation'] ?></td>
					<td>Resultat : <?= $result['resultat'] ?></td>
					<td>NOM du Materiel : <?php

					$materiel =  get_name_byID('materiels',$result['materiel_id'] );

					if($materiel){
						echo $materiel[0]['nom'];
					}

					 ?></td>
				</tr>
				
			<?php endforeach ?>
			
		</table>
	</div>

<?php endif; ?>

</div>

<script>
	let imprimer = document.getElementById('imprimer')

	imprimer.addEventListener('click',(e) => {

		

	});
</script>

<?php
require_once 'include/_view/footer.php';

?>