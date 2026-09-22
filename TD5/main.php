<?php
require_once 'AlbumTrack.php';
require_once 'PodcastTrack.php';

echo "<h2>Création d'une piste d'Album</h2>";
$piste1 = new AlbumTrack('Idea 10', 'idea10.mp3', 'Idea 10', 1);

$piste1->setArtiste('Gilbran Alcocer');
$piste1->setAnnee(2022);
$piste1->setGenre('classique contemporaine');

echo "Titre : " . $piste1->titre . "<br>";
echo "Album : " . $piste1->album . "<br>";
echo "Artiste : " . $piste1->artiste . "<br>";

echo "<br><b>Test de conversion JSON :</b><br>";
echo $piste1 . "<br>";


echo "<h2>Création d'un Podcast</h2>";
$podcast1 = new PodcastTrack('Mon podcast sur le php', 'poo_php.mp3');

$podcast1->setAuteur('Ange Holvec');
$podcast1->setDate('2026-06-01');

echo "Podcast : " . $podcast1->titre . " (par " . $podcast1->auteur . ")<br>";


echo "<h2>Test de l'Exception __get()</h2>";
try {
    echo $piste1->attributInconnu;
} catch (Exception $e) {
    echo "<span style='color:red;'>Erreur capturée : " . $e->getMessage() . "</span>";
}
?>