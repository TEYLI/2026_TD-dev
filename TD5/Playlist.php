<?php
namespace iutnc\deefy\audio\lists;

use iutnc\deefy\audio\tracks\AudioTrack;

require_once 'AudioList.php';
require_once 'AudioTrack.php';

class Playlist extends AudioList {

    public function ajouterPiste(AudioTrack $piste): void {
        $this->pistes[] = $piste; 
        $this->nbPistes++;        
        
        if ($piste->duree !== null) {
            $this->dureeTotale += $piste->duree;
        }
    }

    public function supprimerPiste(int $index): void {
        if (isset($this->pistes[$index])) {
            $pisteASupprimer = $this->pistes[$index];
            
            if ($pisteASupprimer->duree !== null) {
                $this->dureeTotale -= $pisteASupprimer->duree;
            }
            
            unset($this->pistes[$index]);
            
            $this->pistes = array_values($this->pistes);
            
            $this->nbPistes--;
        }
    }

    public function ajouterListePistes(array $nouvellesPistes): void {
        foreach ($nouvellesPistes as $piste) {
            if (!in_array($piste, $this->pistes, true)) {
                $this->ajouterPiste($piste);
            }
        }
    }
}