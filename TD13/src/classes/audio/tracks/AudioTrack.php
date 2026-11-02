<?php
namespace iutnc\deefy\audio\tracks;

use iutnc\deefy\exception\InvalidPropertyNameException;
use iutnc\deefy\exception\InvalidPropertyValueException;

class AudioTrack {
    protected string $titre;
    protected string $nomAudio;
    protected ?string $genre = null;
    protected ?int $duree = null;
    protected int $id;

    public function __construct(string $titre, string $nomAudio) {
        $this->titre = $titre;
        $this->nomAudio = $nomAudio;
    }

    public function __get(string $property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        throw new InvalidPropertyNameException("attribut invalide : " . $property);
    }

    public function setGenre(?string $genre): void {
        $this->genre = $genre;
    }

    public function setDuree(?int $duree): void {
        if ($duree !== null && $duree < 0) {
            throw new InvalidPropertyValueException("La durée doit être un entier positif ou null.");
        }
        $this->duree = $duree;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
}