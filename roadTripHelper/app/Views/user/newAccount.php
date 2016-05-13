<?php 
if($errors!="0"){ 
	echo "<div class='alert alert-danger'>".$errors."</div>" ;
} 
if(App::getUsername()!='Login'){
	echo "<div class='alert alert-danger'>Vous êtes déjà connecté</div>";
}
?>
	<div class="col-sm-push-3 col-sm-6">
		<form method = "post">
			<h4 align="right"> Créer un compte </h4>
			<?php echo $form->input('lastname','Nom');?>
			<?php echo $form->input('name','Prenom');?>
			<?php echo $form->input('username','Pseudo');?>
			<?php echo $form->input('email', 'Email');?>
			<?php echo $form->input('password','Mot de passe', ['type' => 'password']);?>
			<?php echo $form->submit('Se créer un compte');?>
		</form>
	</div>
