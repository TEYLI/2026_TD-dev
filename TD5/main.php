<?php
require_once 'Renderer.php';
require_once 'AudioTrack.php';
require_once 'AlbumTrack.php';
require_once 'PodcastTrack.php';
require_once 'InvalidPropertyNameException.php';
require_once 'InvalidPropertyValueException.php';
require_once 'AudioList.php';
require_once 'Playlist.php';
require_once 'AudioTrackRenderer.php';
require_once 'AlbumTrackRenderer.php';
require_once 'PodcastRenderer.php';
require_once 'AudioListRenderer.php';

use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\render\Renderer;


$piste1 = new AlbumTrack('Idea 10', 'idea10.mp3', 'Idea 10', 1);
/**try {
    $piste1->setDuree(-15);
    echo $piste->proprieteInconnue;

} catch (InvalidArgumentNameException $e) {
    echo 'Erreur : ' . $e->getMessage();

} catch (InvalidPropertyValueException $e) {
    echo 'Erreur : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}*/
$podcast = new PodcastTrack('Mon Podcast', 'podcast.mp3');

$maPlaylist = new Playlist('Ma Playlist');
$maPlaylist->ajouterPiste($piste1);
$maPlaylist->ajouterPiste($podcast);

$renderer = new AudioListRenderer($maPlaylist);
echo $renderer->render(1);
?>