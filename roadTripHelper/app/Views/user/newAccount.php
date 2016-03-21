<?php  if($errors) : ?>
	
	<div class="alert alert-danger">
	
		Informations erronées
	
	</div>


<?php  endif;?>

		<form method = "post">
			<h2> Créer un compte </br></br></h2>
			<?php echo $form->input('lastname','Nom');?>
			<?php echo $form->input('name','Prenom');?>
			<?php echo $form->input('username','Pseudo');?>
			<?php echo $form->input('email', 'Email');?>
			<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
			<?php echo $form->submit('Se créer un compte');?>
		</form>