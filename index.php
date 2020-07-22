<?php
require_once 'include/include.php';
require_once 'include/_view/header.php';



?>

<div class="container">

<?php
	
		$materiels =selectAll('materiels');


 ?>

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

<script>

  
</script>


<?php
require_once 'include/_view/footer.php';

?>