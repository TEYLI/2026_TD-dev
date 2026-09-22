<?php
class AudioTrack {
    public string $titre;
    public string $nomAudio;
    public ?string $genre = null;
    public ?int $duree = null;

    public function __construct(string $titre, string $nomAudio) {
        $this->titre = $titre;
        $this->nomAudio = $nomAudio;
    }
}