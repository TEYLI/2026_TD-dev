<?php
namespace iutnc\deefy\audio\tracks;

class PodcastTrack extends AudioTrack {
    protected ?string $auteur = null;
    protected ?string $date = null;

    public function __construct(string $titre, string $nomAudio) {
        parent::__construct($titre, $nomAudio);
    }

    public function setAuteur(?string $auteur): void {
        $this->auteur = $auteur;
    }

    public function setDate(?string $date): void {
        $this->date = $date;
    }
}