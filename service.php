<?php
require_once 'include/_view/header.php';
require_once 'include/include.php';



if(isset($_POST)){

  if(!empty($_POST)){
    $query = "INSERT INTO `services`(`nom`) VALUES ('".$_POST['nom']."')";
    
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
    <input type="submit" class="btn btn-primary"  value="Enregistre">
    
  </div>
  
</form>


</div>


<?php
require_once 'include/_view/footer.php';

?>