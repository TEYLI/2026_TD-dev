<?php
require_once 'vendor/autoload.php';

use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\render\Renderer;

$piste1 = new AlbumTrack('Idea 10', 'idea10.mp3', 'Idea 10', 1);
$podcast = new PodcastTrack('Mon Podcast', 'podcast.mp3');

$maPlaylist = new Playlist('Ma Playlist');
$maPlaylist->ajouterPiste($piste1);
$maPlaylist->ajouterPiste($podcast);

$renderer = new AudioListRenderer($maPlaylist);
echo $renderer->render(1);
?>