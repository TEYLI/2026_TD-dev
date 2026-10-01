<?php
require_once 'vendor/autoload.php';

use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\render\AlbumTrackRenderer;
use iutnc\deefy\render\Renderer;

if (isset($_COOKIE['track'])) {
    $trackRecuperee = unserialize($_COOKIE['track']);
    echo $trackRecuperee;
    
    echo "<h3>Objet récupéré depuis le cookie :</h3>";
    
    $renderer = new AlbumTrackRenderer($trackRecuperee);
    echo $renderer->render(Renderer::COMPACT);
    
} else {    
    $piste = new AlbumTrack('Thriller', 'thriller.mp3', 'Thriller', 4);
    
    $pisteSerialisee = serialize($piste);
    
    setcookie('track', $pisteSerialisee, time() + 3600);
    
    echo "<p>C'est le premier appel</p>";
    echo "<p>La piste a été créé sérialisé et stockée dans le cookie <strong>track</strong></p>";
    echo "<p><Actualisez la page pour voir le résultat de la désérialisation.</p>";
}
?>