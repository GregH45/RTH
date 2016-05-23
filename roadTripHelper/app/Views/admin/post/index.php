<h1>Administrer les expériences</h1>

<p>

	<!--<a href="?p=admin.post.add" class = "btn btn-success">Ajouter</a>
	-->
</p>

<!--
 Affiche toute les expériences qui ne sont pas acceptés

-->
<table class="table">
	<thead>
	<tr>
		<td>ID</td>
		<td>Titre</td>
		<td>Action</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($experiences as $experience):?>
	<tr>
		<td><?= $experience->id?></td>
		<td><?= $experience->titre?></td>
		<td>
			<a class = "btn btn-primary" href="?p=post.show&id=<?= $experience->id;?>">Consulter</a>
			<?php if(!$experience->accepte): ?>
			<form action = "?p=admin.post.accepter" method = "post" style= "display : inline;">
				<input type= "hidden" name ="id" value = "<?= $experience->id;?>">
				<button type= "submit" class ="btn btn-success">Accepter</button>
			</form>
			<?php endif?>
			<?php if($experience->accepte): ?>
			<form action = "?p=admin.post.accepter" method = "post" style= "display : inline;">
				<input type= "hidden" name ="id" value = "<?= $experience->id;?>">
				<button type= "submit" class ="btn btn-success disabled">Accepter</button>
			</form>
			<?php endif?>

			<form action = "?p=admin.post.delete" method = "post" style= "display : inline;">
				<input type= "hidden" name ="id" value = "<?= $experience->id;?>">
				<button type= "submit" class ="btn btn-danger">Supprimer</button>
			</form>



		</td>
	</tr>

	<?php endforeach?>
	</tbody>
</table>