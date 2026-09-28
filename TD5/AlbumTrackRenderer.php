<?php
namespace iutnc\deefy\render;

use iutnc\deefy\audio\tracks\AlbumTrack;
require_once 'AudioTrackRenderer.php';

class AlbumTrackRenderer extends AudioTrackRenderer {
    
    protected function renderCompact(): string {
        $html = '<div class="track-container" style="margin-bottom: 20px;">';
        $html .= "<p><em>Mode compact (Album)</em></p>";
        $html .= '<strong>Titre : ' . $this->track->titre . '</strong><br>';
        $html .= '<audio controls src="' . $this->track->nomAudio . '"></audio>';
        $html .= '</div>';
        return $html;
    }

    protected function renderLong(): string {
        $numPiste = ($this->track instanceof AlbumTrack) ? $this->track->numPiste : 'Inconnu';
        
        $html = '<div class="track-container" style="margin-bottom: 20px;">';
        $html .= "<p><em>Mode long (Album)</em></p>";
        $html .= '<strong>Titre : ' . $this->track->titre . '</strong><br>';
        $html .= 'Numéro de la piste : ' . $numPiste . '<br>';
        $html .= '<audio controls style="width: 100%; margin-top: 10px;">';
        $html .= '<source src="' . $this->track->nomAudio . '" type="audio/mpeg">';
        $html .= 'Votre navigateur ne supporte pas la balise audio.';
        $html .= '</audio>';
        $html .= '</div>';
        return $html;
    }
}