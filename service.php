<?php
require_once 'app/auth.php';

check_user_connecter();



require_once 'include/_view/header.php';
require_once 'include/include.php';



if(isset($_POST)){

  if(!empty($_POST['nom'] )){
    $query = "INSERT INTO `services`(`nom`) VALUES ('".$_POST['nom']."')";
    
    $db = seconnecter();

    if($db->exec($query)){
      echo "Ok ok";
    }else{
      echo "ERROR";
    }

  }
}

$db = seconnecter();

$services = $db->query("SELECT * FROM services");

$services = $services->fetchAll();


?>


<div class="container"> 

  <h1> Nom du service</h1>

  <form  method="POST">
    <div class="form-group col-md-5">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom">
    </div>


    <div class="form-group col-md-5">

      <input type="submit" class="btn btn-primary"  value="Enregistre">

    </div>

  </form>




</div>

 <div class="row" class="bg-danger">
    <div class="col-md-6">

      <table class="table table-striped table-sm table-success table-hover">

        <thead>
          <tr>
            <th>
              Nom
            </th>
            <th>Action</th>

          </tr>
        </thead>

        <tbody>
          <?php foreach($services as $service) :?>

            <tr>
              <td>
                <?= $service['nom'] ?>
              </td>

              <td>
            
              <a href="effacer.php?id= <?=  $service['id']?> & table=services" onclick="return confirm('êtez-vous sûr')" class=" btn btn-danger btn-sm"> supprimer</a>

              </td>

            </tr>

          <?php  endforeach; ?>
        </tbody>

      </table>

    </div>

  </div>

<?php
require_once 'include/_view/footer.php';

?>