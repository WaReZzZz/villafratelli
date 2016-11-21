<?php

include_once '../include/functions.php';

$image = isset($_GET['id']) ? $_GET['id'] : '';
$images = getImages(array("idImages=$image"));

if ($images) {
    foreach ($images as $value) {
        $imageFile = $value['dossier'] . $value['nom'];

        if (is_file($imageFile)) {

            header('Content-Length: ' . filesize($imageFile));
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-disposition: attachment; filename="' . $image . '.jpg"');
            header('Content-Type: image/jpeg');

            readfile($imageFile);
        }
    }
}