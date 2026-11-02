<?php
namespace iutnc\deefy\action;

use iutnc\deefy\audio\tracks\PodcastTrack; 

class AddPodcastTrackAction extends Action {
    public function execute(): string {
        if (isset($_SESSION['playlist'])) {
            $track = new PodcastTrack("Nouveau Podcast", "chemin/audio.mp3");
            $_SESSION['playlist']->ajouterPiste($track);
            return "<p>La piste podcast a bien été ajoutée à la playlist en session</p>";
        }
        return "<p>Erreur : Vous devez d'abord créer une playlist (action 'Créer Playlist').</p>";
    }
}