<h2>liste des utilisateurs</h2>


<form class="form-inline" action="index.php?p=utilisateurs.service" method="post">
<select name="id" class="form form-control">
<?php foreach (App::getInstance()->getTable("Service")->all() as $service): ?>
	<option value="<?= $service->id ?>">
	<?= $service->nom_du_service ?>
		
	</option>
<?php endforeach ?>

</select>
<input class="btn btn-primary" type="submit" value="filtrer">
</form>



<table class="table table-bordered col-md-12 text-center">
<thead>
<tr>
<td>NOM PRENOM</td>
<td>AGE</td>
<td>ADRESSE/CODE POSTAL</td>
<td>SERVICE</td>
</tr>
</thead>
<tbody>
<?php foreach (App::getInstance()->getTable("Utilisateur")->allWithService() as  $utilisateur): ?>
	<tr>
	<td><?= $utilisateur->identite; ?></td>
		<td><?= $utilisateur->age; ?></td>
		<td><?= $utilisateur->adressecomplete; ?></td>
		<td><?= $utilisateur->service; ?></td>	

	</tr>
	<?php endforeach ?>

</tbody>
</table>
