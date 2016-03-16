
<?php  if($errors) : ?>
	<div class="alert alert-danger">
	
		Identifiants Incorrects
	
	</div>


<?php  endif;?>

<div class="row col-lg-12">
	<div class="col-md-6">
		<form method = "post">
			<h2> Créer un compte </br></br></h2>
			<?php echo $form->input('lastname','Nom');?>
			<?php echo $form->input('name','Prenom');?>
			<?php echo $form->input('username','Pseudo');?>
			<?php echo $form->input('email', 'Email');?>
			<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
			<?php echo $form->submit('Se créer un compte');?>
		</form>
	</div>
	<div class="col-md-6">
		<form method = "post">
			<h2> Se connecter </br></br></h2>
			<?php echo $form->input('username','Pseudo');?>
			<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
			<?php echo $form->submit('Se connecter');?>
		</form>
	</div>
	
</div>