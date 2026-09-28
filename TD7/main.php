<?php
require_once 'src/classes/exception/InvalidPropertyNameException.php';
require_once 'src/classes/exception/InvalidPropertyValueException.php';
require_once 'src/classes/audio/tracks/AudioTrack.php';
require_once 'src/classes/audio/tracks/AlbumTrack.php';
require_once 'src/classes/audio/tracks/PodcastTrack.php';
require_once 'src/classes/audio/lists/AudioList.php';
require_once 'src/classes/audio/lists/Playlist.php';
require_once 'src/classes/render/Renderer.php';
require_once 'src/classes/render/AudioTrackRenderer.php';
require_once 'src/classes/render/AlbumTrackRenderer.php';
require_once 'src/classes/render/PodcastRenderer.php';
require_once 'src/classes/render/AudioListRenderer.php';

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