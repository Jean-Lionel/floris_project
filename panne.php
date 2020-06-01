<?php
require_once 'include/_view/header.php';
require_once 'include/include.php';


$materiels =selectAll('materiels');


if(isset($_POST)){

  if(!empty($_POST)){
    $query = "INSERT INTO `pannes`(`nom`, `materiel_id`, `date_panne`) 
    VALUES ('".$_POST['nom']."','".$_POST['materiel_id'].
    "','".$_POST['date_panne']."')";

    $db = seconnecter();

    if($db->exec($query)){
      echo "Ok ok";
    }else{
      echo "ERROR";
    }

  }
}




?>


<div class="container"> 

<h1> Enregistre une nouvelle panne</h1>

<form  method="POST">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom">
  </div>
  <div class="form-group">
    <label for="materiel_id">Materielle</label>
    <select class="form-control" id="materiel_id" name="materiel_id">

      <?php foreach ($materiels  as $materiel) : ?>

        <option value="<?= $materiel['id'] ?>"> <?php echo $materiel['nom'].' - '.$materiel['numero_serie']; ?></option>
       <?php endforeach; ?>
      
    </select>
  </div>

  <div class="form-group">
    <label for="date_panne">Date de la panne</label>
    <input type="date" class="form-control" id="date_panne" name="date_panne">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary"  value="Enregistre">
    
  </div>
  
</form>


</div>


<?php
require_once 'include/_view/footer.php';

?>