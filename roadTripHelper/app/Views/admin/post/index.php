<h1>Administrer les articles</h1>

<p>

	<!--<a href="?p=admin.post.add" class = "btn btn-success">Ajouter</a>
	-->
</p>


<table class="table">
	<thead>
	<tr>
		<td>ID</td>
		<td>Titre</td>
		<td>Action</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($post as $post):?>
	<tr>
		<td><?= $post->id?></td>
		<td><?= $post->titre?></td>
		<td>
			<a class = "btn btn-primary" href="?p=post.show&id=<?= $post->id;?>">Consulter</a>
			<?php if(!$post->accepte): ?>
			<form action = "?p=admin.post.accepter" method = "post" style= "display : inline;">
				<input type= "hidden" name ="id" value = "<?= $post->id;?>">
				<button type= "submit" class ="btn btn-success">Accepter</button>
			</form>
			<?php endif?>
			<?php if($post->accepte): ?>
			<form action = "?p=admin.post.accepter" method = "post" style= "display : inline;">
				<input type= "hidden" name ="id" value = "<?= $post->id;?>">
				<button type= "submit" class ="btn btn-success disabled">Accepter</button>
			</form>
			<?php endif?>

			<form action = "?p=admin.post.delete" method = "post" style= "display : inline;">
				<input type= "hidden" name ="id" value = "<?= $post->id;?>">
				<button type= "submit" class ="btn btn-danger">Supprimer</button>
			</form>



		</td>
	</tr>

	<?php endforeach?>
	</tbody>
</table>