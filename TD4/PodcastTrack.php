<?php
require_once 'AudioTrack.php';

class PodcastTrack extends AudioTrack {
    public ?string $auteur = null;
    public ?string $date = null;

    public function __construct(string $titre, string $nomAudio) {
        parent::__construct($titre, $nomAudio);
    }
}