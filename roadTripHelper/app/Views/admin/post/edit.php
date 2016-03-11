<form method = "post">
	<?php echo $form->input('titre','Titre de l\'article');?>
	<?php echo $form->input('contenu','Contenu ', ['type' => 'textarea']);?>
	<?php echo $form->select('categorie_id','Catégorie ', $categories);?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>