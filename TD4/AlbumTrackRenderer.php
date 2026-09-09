<?php
class AlbumTrackRenderer {
    const MODE_COMPACT = 1;
    const MODE_LONG = 2;

    public AlbumTrack $piste;

    public function __construct(AlbumTrack $piste) {
        $this->piste = $piste;
    }

    public function render(int $selector): string {
        $html = '<div class="track-container" style="margin-bottom: 20px;">';
        
        switch ($selector) {
            case self::MODE_COMPACT:
                $html .= "<p><em>Mode compact</em></p>";
                $html .= '<strong>Titre : ' . $this->piste->titre . '</strong><br>';
                $html .= '<audio controls src="' . $this->piste->nomAudio . '"></audio>';
                break;

            case self::MODE_LONG:
                $html .= "<p><em>Mode long</em></p>";
                $html .= '<strong>Titre : ' . $this->piste->titre . '</strong><br>';
                $html .= 'Numéro de la piste : ' . $this->piste->numPiste . '<br>';
                $html .= '<audio controls style="width: 100%; margin-top: 10px;">';
                $html .= '<source src="' . $this->piste->nomAudio . '" type="audio/mpeg">';
                $html .= 'Votre navigateur ne supporte pas la balise audio.';
                $html .= '</audio>';
                break;

            default:
                $html .= "<p>Mode inconnu</p>";
                break;
        }

        $html .= '</div>'; 
        return $html;
    }
}
?>