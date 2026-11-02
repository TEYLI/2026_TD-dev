<?php
namespace iutnc\deefy\render;

use iutnc\deefy\audio\tracks\PodcastTrack;

class PodcastRenderer extends AudioTrackRenderer {

    protected function renderCompact(): string {
        $html = '<div class="track-container" style="margin-bottom: 20px; border-left: 3px solid blue; padding-left: 10px;">';
        $html .= "<p><em>Mode compact (Podcast)</em></p>";
        $html .= '<strong>Podcast : ' . $this->track->titre . '</strong><br>';
        $html .= '<audio controls src="audio/' . $this->track->nomAudio . '"></audio>';
        $html .= '</div>';
        return $html;
    }

    protected function renderLong(): string {
        $auteur = $this->track->auteur;
        
        $html = '<div class="track-container" style="margin-bottom: 20px; border-left: 3px solid blue; padding-left: 10px;">';
        $html .= "<p><em>Mode long (Podcast)</em></p>";
        $html .= '<strong>Podcast : ' . $this->track->titre . '</strong><br>';
        $html .= 'Auteur : ' . $auteur . '<br>';
        $html .= '<audio controls style="width: 100%; margin-top: 10px;">';
        $html .= '<source src="audio/' . $this->track->nomAudio . '" type="audio/mpeg">';
        $html .= 'Votre navigateur ne supporte pas la balise audio.';
        $html .= '</audio>';
        $html .= '</div>';
        return $html;
    }
}