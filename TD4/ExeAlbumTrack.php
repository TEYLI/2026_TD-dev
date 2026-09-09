<?php
require_once 'AlbumTrack.php';
require_once 'AlbumTrackRenderer.php';
$piste1=new AlbumTrack('MA PISTE 1','piste1','Album1',1);
$piste2=new AlbumTrack('MA PISTE 2','piste2','Album2',2);

echo $piste1->album . "<br>";
print $piste1->album . "<br>";
printf ($piste1->album . "<br>");


echo $piste1->__toString() . "<br>";
echo $piste1 . "<br>";


print_r($piste1 . "<br>");
var_dump($piste1 . "<br>");



$renderer = new AlbumTrackRenderer($piste1);

echo $renderer->render(AlbumTrackRenderer::MODE_COMPACT);
echo $renderer->render(AlbumTrackRenderer::MODE_LONG);
?>