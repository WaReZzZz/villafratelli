<?php include_once 'header.php';
$images = getImages(array("dossier = 'images/big/spa/'"));
?>
<div id="page">
<?php if (detection_mobile() == false){?>
	<div id="spa" style="float:left">
		<h2>Un spa tout inclus</h2>
		<ul id="mycarousel" class="jcarousel-skin-ie7">
		<?php
		foreach ($images as $image) {	?>
			<li class="mini"><a title="<?php echo $image['description'] ?>"
				style="width: 200px; height: 150px;" rel="example_group"
				href="<?php echo str_replace("big", "normal", $image['dossier']).str_replace("JPG","jpg",$image['nom']) ?>">
					<img alt="Cliquez ici" title="Cliquez ici"
					src="<?php echo str_replace("big", "mini", $image['dossier']).str_replace("JPG","jpg",$image['nom']) ?>" />
			</a><br /> <a href="download.php?id=<?php echo $image['idImages']?>">Télécharger</a>
			</li>
			<?php 	}?>
		</ul>
	</div>
	<?php } else {?>
	<div id="spa">
		<h2>Un spa tout inclus</h2>
		<?php
		foreach ($images as $image) {	?>
		<div style="width: 100%; text-align: center;">
			<a
				href="<?php echo str_replace("big", "normal", $image['dossier']).str_replace("JPG","jpg",$image['nom']) ?>"><img
				alt="Cliquez ici" title="Cliquez ici" style="border: 40px solid gray; margin: 40px;"
				src="<?php echo str_replace("big", "normal", $image['dossier']).str_replace("JPG","jpg",$image['nom']) ?>" />
			</a> <br />
		</div>
		<br /> <br /> <br /> <br />
		<?php 	}?>
	</div>
	<?php }?>
</div>
	<?php include_once 'footer.php';?>