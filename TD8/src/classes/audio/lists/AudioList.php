<?php
namespace iutnc\deefy\audio\lists;

use iutnc\deefy\audio\tracks\AudioTrack;
use iutnc\deefy\exception\InvalidPropertyNameException;

class AudioList {
    protected String $nom;
    protected int $nbPistes;
    protected float $duree;
    protected array $pistes;

    public function __construct(String $nom,array $pistes = []) {
        $this->nom = $nom;
        $this->pistes = $pistes;
        $this->nbPistes = count($pistes);
        $this->dureeTotale = 0;
        
        foreach ($this->pistes as $piste) {
            if ($piste->duree !== null) {
                $this->dureeTotale += $piste->duree;
            }
        }
        
    }
   
    public function __get(String $property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        throw new InvalidPropertyNameException("attribut invalide : " . $property);
    }
}
?>