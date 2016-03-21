
<?php  if($errors) : ?>
	<div class="alert alert-danger">
	
		Identifiants Incorrects
	
	</div>


<?php  endif;?>


		<form method = "post">
			<h2> Se connecter </br></br></h2>
			<?php echo $form->input('username','Pseudo');?>
			<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
			<?php echo $form->submit('Se connecter');?>
		</form>
	
