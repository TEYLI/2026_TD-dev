<?php
require_once 'AlbumTrack.php';
require_once 'PodcastTrack.php';

$piste1 = new AlbumTrack('Idea 10', 'idea10.mp3', 'Idea 10', 1);
try {
    $piste1->setDuree(-15);
    echo $piste->proprieteInconnue;

} catch (InvalidArgumentNameException $e) {
    echo 'Erreur : ' . $e->getMessage();

} catch (InvalidPropertyValueException $e) {
    echo 'Erreur : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>