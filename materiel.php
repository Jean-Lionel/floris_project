<?php
require_once 'app/auth.php';

check_user_connecter();



require_once 'include/_view/header.php';

require_once 'include/include.php';



$materiels =selectAll('materiels');





if(isset($_POST)){

  if(!empty($_POST)){
    $query = "INSERT INTO `materiels`(`numero_serie`, `nom`, `date_fabrication`, `marque`) 
    VALUES ('".$_POST['numero_serie']."','".$_POST['nom']."','".$_POST['date_fabrication'].
    "','".$_POST['marque']."')";

    $db = seconnecter();

    if($db->exec($query)){
      echo "Ok ok";
    }else{
      echo "ERROR";
    }

  }
}


?>



<div class="container" >

  <h1 class="text-center">Entrer un nouveau materiel</h1>

  <div class="row">
    <div class="col col-md-8 col-md-offset-1">

      <form action="" class="form-horizontal" method="POST">
        <div class="form-group">
          <label for="numero_serie" class="col-sm-2 control-label">NUMERO DE SERIE</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="numero_serie" id="numero_serie">
          </div>
        </div>

        <div class="form-group">
          <label for="nom" class="col-sm-2 control-label">NOM </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nom" id="nom">
          </div>
        </div>


        <div class="form-group">
          <label for="date_fabrication" class="col-sm-2 control-label">DATE DE FABRICATION </label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="date_fabrication" id="date_fabrication">
          </div>
        </div>

        <div class="form-group">
          <label for="marque" class="col-sm-2 control-label">MARQUE</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="marque" id="marque">
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


<div>
  <h2 class="text-center">Liste des materielles</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">NOM</th>
        <th scope="col">NUMERO DE SERIE</th>
        <th scope="col">DATE DE FABRICATION</th>
        <th scope="col">MARQUE</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach($materiels as $materiel): ?>
        
        <tr>
          <td><?= $materiel['nom'];  ?></td>
          
          <td><?= $materiel['numero_serie'];  ?></td>
          <td><?= $materiel['date_fabrication'];  ?></td>

          <td><?= $materiel['marque'];  ?></td>
          <td>
            <a href="modifier_materiel.php?id=<?= $materiel['id']?>" > Modifer</a>
            
            
            <a href="effacer.php?id= <?= $materiel['id']?> & table= materiels" onclick="return confirm('êtez-vous sûr')"> supprimer</a>

            
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