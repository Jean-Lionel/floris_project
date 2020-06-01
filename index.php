<?php
require_once 'include/_view/header.php';
require_once 'include/include.php';
?>

<div class="container">

<?php
	
		$materiels =selectAll('materiels');

 ?>


 <table class="table">
  <thead>
    <tr>
      <th scope="col">NOM</th>
      <th scope="col">NUMERO DE SERIE</th>
      <th scope="col">DATE DE FABRICATION</th>
      <th scope="col">MARQUE</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($materiels as $materiel): ?>
	
  	<tr>
  		<td><?= $materiel['nom'];  ?></td>
  		
  		<td><?= $materiel['numero_serie'];  ?></td>
  		<td><?= $materiel['date_fabrication'];  ?></td>

  		<td><?= $materiel['marque'];  ?></td>
  	</tr>

  <?php endforeach; ?>

  </tbody>
</table>

  
</div>


<?php
require_once 'include/_view/footer.php';

?>