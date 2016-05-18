<?php 

if($errors!="0"){ 
	echo "<div class='alert alert-danger'>".$errors."</div>" ;
} 

?>
	<div class="col-sm-12 ">
		<form method = "post" >
			<h3 align="right"><b> Nouvelle experience </b></h3></br>
			
			<div class="row" >
				<div class="col-lg-4 col-sm-push-1">
					<?php echo $form->input('titre','Titre');?>
					<?php echo $form->input('description','Description', ['type' => 'textarea']);?>	
					<?php echo $form->input('date_debut','Date de début du voyage', ['type' => 'date']);?>
					<?php echo $form->input('date_fin','Date de fin du voyage', ['type' => 'date']);?>
				</div>
				<div class="col-lg-3 col-sm-push-1 ">
					<?php echo $form->input('plus1','Les plus');?>
					<?php echo $form->input('plus2','');?>
					<?php echo $form->input('plus3','');?>
				</div>
				<div class="col-lg-3 col-sm-push-1">
					<?php echo $form->input('moins1','Les moins');?>
					<?php echo $form->input('moins2','');?>
					<?php echo $form->input('moins3','');?>
				</div>
				
			</div>	
			<div class="col-sm-12 col-sm-push-6">
				<?php echo $form->submit('Ajouter');?>
			</div>


		</form>
	</div>
