<?php
require_once 'AlbumTrack.php';
require_once 'AlbumTrackRenderer.php';

$piste1 = new AlbumTrack('MA PISTE 1','piste1.mp3','Album1',1);
$piste2 = new AlbumTrack('MA PISTE 2','piste2.mp3','Album2',2);

echo $piste1->album . "<br>";
print $piste1->album . "<br>";
printf ($piste1->album . "<br>");

echo $piste1->__toString() . "<br>";
echo $piste1 . "<br>";

echo "<pre>";
print_r($piste1);
echo "</pre><br>";

echo "<pre>";
var_dump($piste1);
echo "</pre><br>";

$renderer = new AlbumTrackRenderer($piste1);

echo $renderer->render(Renderer::COMPACT);
echo $renderer->render(Renderer::LONG);
?>