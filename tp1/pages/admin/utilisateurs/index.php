<h2>liste des utilisateurs</h2>

<p><a href="admin.php?p=utilisateurs.add">ajouter un utilisateur</a></p>



<table class="table table-bordered col-md-12 text-center">
<thead>
<tr>
<td>NOM PRENOM</td>
<td>AGE</td>
<td>ADRESSE/CODE POSTAL</td>
<td>SERVICE</td>
<td>ACTION</td>
</tr>
</thead>
<tbody>
<?php foreach (App::getInstance()->getTable("Utilisateur")->allWithService() as  $utilisateur): ?>
	<tr>
	<td><?= $utilisateur->identite; ?></td>
		<td><?= $utilisateur->age; ?></td>
		<td><?= $utilisateur->adressecomplete; ?></td>
		<td><?= $utilisateur->service; ?></td>
		<td>
			<form action="admin.php?p=utilisateurs.delete" method="post">
				<input type="hidden" name="id" value="<?=$utilisateur->id; ?>">
				<input class="btn btn-danger" type="submit">
			</form>
		</td>
		<!-- <td><button class="btn btn-danger">Delete</button></td>	 -->

	</tr>
	<?php endforeach ?>

</tbody>
</table>
