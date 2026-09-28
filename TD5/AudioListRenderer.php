<?php
namespace iutnc\deefy\render;

use iutnc\deefy\audio\lists\AudioList;
use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;

require_once 'Renderer.php';
require_once 'AudioList.php';
require_once 'AlbumTrack.php';
require_once 'AlbumTrackRenderer.php';
require_once 'PodcastTrack.php';
require_once 'PodcastRenderer.php';

class AudioListRenderer implements Renderer {
    protected AudioList $audioList;

    public function __construct(AudioList $audioList) {
        $this->audioList = $audioList;
    }

    public function render(int $selector): string {
        $html = '<div class="audio-list-container">';
        
        $html .= '<h2>' . htmlspecialchars($this->audioList->nom) . '</h2>';
        $html .= '<div class="tracks-list">';
        
        foreach ($this->audioList->pistes as $piste) {
            if ($piste instanceof AlbumTrack) {
                $trackRenderer = new AlbumTrackRenderer($piste);
            } elseif ($piste instanceof PodcastTrack) {
                $trackRenderer = new PodcastRenderer($piste);
            } else {
                continue; 
            }
            
            $html .= $trackRenderer->render(Renderer::COMPACT);
        }
        $html .= '</div>';
        
        $html .= '<p>';
        $html .= '<strong>Nombre de pistes :</strong> ' . $this->audioList->nbPistes . ' | ';
        $html .= '<strong>Durée totale :</strong> ' . $this->audioList->dureeTotale . ' secondes';
        $html .= '</p>';
        
        $html .= '</div>';

        return $html;
    }
}