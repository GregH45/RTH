
<?php  if($errors) : ?>
	<div class="alert alert-danger">
	
		Identifiants Incorrects
	
	</div>


<?php  endif;?>

<form method = "post">
	<?php echo $form->input('username','Pseudo');?>
	<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
	<button class="btn btn-primary">Envoyer</button>
</form>