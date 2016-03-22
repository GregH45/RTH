
<?php  if($errors) : ?>

	
	<div class="alert alert-danger">
	
		Identifiants Incorrects
	
	</div>


<?php  endif;?>

		<div class="col-sm-push-3 col-sm-6">
			<h4 align="right"> Mon compte </h4>
			<form method = "post">
				<?php echo $form->input('username','Pseudo');?>
				<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
				<?php echo $form->submit('Se connecter');?>
			</form>
			<p align="right"><a class="btn btn-xm btn-info" href="index.php?p=users.newAccount" role="button">Se créer un compte</a></p></br></br>
		</div>
		
		
		
		

	
