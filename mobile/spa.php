<?php
include_once 'header.php';
$images = getImages(array("dossier = 'images/big/spa/'"));
?>
<div id="spa">
    <h3>Un spa tout inclus</h3>
    <ul id="Gallery">
        <?php foreach ($images as $image) { ?>
            <li><a rel="external"
                    href="../<?php echo str_replace("big", "normal", $image['dossier']) . str_replace("JPG", "jpg", $image['nom']) ?>"><img
                        alt="Cliquez ici" title="Cliquez ici"
                        src="../<?php echo str_replace("big", "mini", $image['dossier']) . str_replace("JPG", "jpg", $image['nom']) ?>" />
                </a> </li>
        <?php } ?>
    </ul>
</div>
<?php include_once 'footer.php'; ?>