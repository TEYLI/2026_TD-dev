<?php
require_once 'AlbumTrack.php';
require_once 'AlbumTrackRenderer.php';
require_once 'PodcastTrack.php';
require_once 'PodcastRenderer.php';

// Création et affichage d'une piste d'album
$piste1 = new AlbumTrack('MA PISTE 1', 'piste1.mp3', 'Album1', 1);
$albumRenderer = new AlbumTrackRenderer($piste1);

echo "<h2>Affichage AlbumTrack</h2>";
echo $albumRenderer->render(Renderer::COMPACT);
echo $albumRenderer->render(Renderer::LONG);

$podcast1 = new PodcastTrack('Mon Podcast', 'podcast1.mp3');
$podcast1->auteur = 'Ange Holvec';
$podcast1->date = '2023-10-25';

$podcastRenderer = new PodcastRenderer($podcast1);

echo "<h2>Affichage PodcastTrack</h2>";
echo $podcastRenderer->render(Renderer::COMPACT);
echo $podcastRenderer->render(Renderer::LONG);
?>