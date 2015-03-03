<?php
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$object_image_file = 'gs://concrete-envoy-87323/Hulk-Minion.jpg';
$object_image_url = CloudStorageTools::getImageServingUrl($object_image_file);

$image = new Imagick();
//$imagenblob=file_get_contents("gs://concrete-envoy-87323/Hulk-Minion.jpg");
$imagenblob=file_get_contents("http://fondosg.com/wp-content/uploads/2011/04/perrito.jpg");
//$imagenblob=file_get_contents($object_image_url);
$image->readimageblob($imagenblob);

header('Content-type: image/jpeg');

$image->blurImage(5,3);
file_put_contents("gs://concrete-envoy-87323/sexy_blured.jpg",$image);
echo $image;