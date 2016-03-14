<div class="row">
	<div class="col-sm-8">

		<?php foreach  ($posts as $post): ?>
			
			<div class="panel panel-default">
			<div class="panel-body">
			<h2><a href="<?= $post->url?>"><?=$post->titre;?></a>,</h2>
			<p><em> <?=  $post->categorie;?></em></p>			
			
			<p><?= $post->getExtrait();?></p>
			</div>
			</div>
			
				
		<?php endforeach;?>

	
	</div>
	
	<div class="col-sm-4">
	<ul>
	<?php  foreach ($categories as $categorie):  ?>
		<li><a href="<?= $categorie->url;?>"><?= $categorie->titre ?></a></li>
	<?php endforeach?>
	</ul>
	</div>
	

</div>