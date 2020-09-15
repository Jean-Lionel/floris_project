<?php
require_once 'app/auth.php';

check_user_connecter();

require_once 'include/_view/header.php';

require_once 'include/include.php';

$materiels = selectAll('materiels');
$pannes = selectAll('pannes');
$manifestations = selectAll('manifestations');

if(isset($_POST['save']))
{

  extract($_POST);

  $sql = "INSERT INTO `manifestations`(`materiel_id`, `panne_id`, `date`, `description`) VALUES (
  $materiel_id,$panne_id,'$date','$description')";

   $db = seconnecter();

    if($db->exec($sql)){
      echo "Ok ok";
    }else{
      echo "ERROR";
    }



}


?>

<!-- 
`description``materiel_id`, `panne_id`, `date`, `description` -->
<div class="container">
	<div class="col-md-6">
 <form  method="POST" action="">
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description">
    </div>

    <div class="form-group">
      <label for="materiel_id">Materiel</label>
      <select name="materiel_id" id="materiel_id" class="form-control">

      	<option value=""></option>
      	<?php foreach($materiels as $materiel): ?>
      		<option value="<?= $materiel['id'] ?>"> <?= $materiel['nom'] ?>"</option>
      	<?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="panne_id">Panne</label>
      <select name="panne_id" id="panne_id" class="form-control">
      	<option value=""></option>
      	<?php foreach($pannes as $panne): ?>
      		<option value="<?= $panne['id'] ?>"> <?= $panne['nom'] ?>"</option>
      	<?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="date">Date </label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="button"> </label>
      <input type="submit" class="btn btn-block btn-primary" name="save" value="Enregistrer">
    </div>


</form>

	</div>

  <div class="col-md-6">
    <h1></h1>

    <table class="table table-striped table-success">
      <thead>
       <!--  `materiel_id`, `panne_id`, `date`, `description` -->
        <tr>
          <th>Materiel</th>
          <th>Panne</th>
          <th>Date</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        
      </thead>

      <tbody>

        <?php foreach ($manifestations as $manifestation): ?>

          <tr>

            <td><?= $manifestation['materiel_id'] ?></td>
            <td><?= $manifestation['panne_id'] ?></td>
            <td><?= $manifestation['date'] ?></td>
            <td><?= $manifestation['description'] ?></td>
            <td>
                <a href="effacer.php?id= <?= $manifestation['id']?> & table= manifestations" onclick="return confirm('êtez-vous sûr')" class="btn btn-danger"> supprimer</a>
            </td>
      
            
          </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>
  </div>
</div>




<?php
require_once 'include/_view/footer.php';

?>