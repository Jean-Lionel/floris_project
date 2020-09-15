<?php
require_once 'app/auth.php';

check_user_connecter();



require_once 'include/_view/header.php';
require_once 'include/include.php';


$materiels = selectAll('materiels');


if(isset($_POST['save'])){

  $date_panne = $_POST['date_panne'];

  $current_date = date('Y').'-'.date('m').'-'.date('d');

  if( $date_panne > $current_date ){

    echo "<script> alert('La date choisi invalide') </script>";
  } else{



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
}

$pannes = selectAll('pannes');



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
      <input type="submit" name="save" class="btn btn-primary"  value="Enregistre">

    </div>

  </form>

  <div>
    <table class="table table-sm table-bordered table-responsive table-warning">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Numero du materiel</th>
          <th>Date du panne</th>
          <th>Action</th>
        </tr>

      </thead>

      <tbody>

        <?php foreach ($pannes  as $panne): ?>
          <tr>
            <td>
              <?= $panne['nom'] ?>

            </td>
            <td>
              <?= $panne['materiel_id'] ?>

            </td>

            <td>
              <?= $panne['date_panne'] ?>
            </td>

            <td>
              <a href="effacer.php?table=pannes&id=<?= $panne['id'] ?>">Effacer</a>
            </td>
          </tr>

        <?php endforeach ?>

      </tbody>
    </table>
  </div>


</div>

<script>

  $(function() {



  });
  

</script>

<?php
require_once 'include/_view/footer.php';

?>