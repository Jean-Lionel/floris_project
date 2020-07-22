<?php
require_once 'include/_view/header.php';
require_once 'include/include.php';

// $id = intval($_GET['id']);

$id = intval($_GET['id']);

$materiel = selectById('materiels',$id);
$materiel = $materiel[0];
//var_dump($materiel);
if (isset($_POST['save'])) {
	# code...
	$request = "UPDATE `materiels` SET `numero_serie`='". $_POST['numero_serie'] ."',`nom`='".$_POST['nom']."',`date_fabrication`='". $_POST['date_fabrication']."',`marque`='". $_POST['marque']."' WHERE id = " . $_POST['id'];

	$db = seconnecter();

    if($db->exec($request)){
    	
      echo "Ok ok";
    }else{
      echo "ERROR";
    }
}


?>


<div class="container" >

  <h1 class="text-center">Modification</h1>

  <div class="row">
    <div class="col col-md-8 col-md-offset-1">

      <form action="" class="form-horizontal" method="POST">
      	<input type="hidden" name="id" value="<?=  $materiel['id'] ?>">
    <div class="form-group">
      <label for="numero_serie" class="col-sm-2 control-label">NOM DE SERIE</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="numero_serie" id="numero_serie" value="<?= $materiel['numero_serie'] ?>">
      </div>
    </div>

    <div class="form-group">
      <label for="nom" class="col-sm-2 control-label">NOM </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nom" value="<?= $materiel['nom'] ?>" id="nom">
      </div>
    </div>


    <div class="form-group">
      <label for="date_fabrication" class="col-sm-2 control-label">DATE DE FABRICATION </label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="date_fabrication" id="date_fabrication" value="<?= $materiel['date_fabrication'] ?>">
      </div>
    </div>

     <div class="form-group">
      <label for="marque" class="col-sm-2 control-label">MARQUE</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="marque" id="marque" value="<?= $materiel['marque']?>">
      </div>
    </div>

    <div class="form-group">
    

     <div class="row">
       <div class="col col-md-3 col-lg-offset-4">
        

          <input type="submit" class="btn btn-primary btn-block" name='save'  value="ENREGISTRE">
       </div>
     </div>
    </div>


  </form>

      
    </div>
  </div>