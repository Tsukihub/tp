<h2>liste des service</h2>





<table class="table table-bordered col-md-12 text-center">
<thead>
<tr>
<td>NOM</td>
<td>DESCRIPTION</td>

<td>ACTION</td>
</tr>
</thead>
<tbody>
<?php foreach (App::getInstance()->getTable("service")->all() as  $service): ?>
	<tr>
	<td><?= $service->nom_du_service; ?></td>
		<td><?= $service->description; ?></td>
	
		<td>
			<form action="admin.php?p=services.delete" method="post">
				<input type="hidden" name="id" value="<?=$service->id; ?>">
				<input class="btn btn-danger" type="submit">
			</form>
		</td>
		<!-- <td><button class="btn btn-danger">Delete</button></td>	 -->

	</tr>
	<?php endforeach ?>

</tbody>
</table>
