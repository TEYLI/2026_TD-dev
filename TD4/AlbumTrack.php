<?php
require_once 'AudioTrack.php';

class AlbumTrack extends AudioTrack {
    public ?string $artiste = null;
    public string $album;
    public ?int $annee = null;
    public int $numPiste;
    
    public function __construct(
        string $titrePiste,
        string $cheminFichier,
        string $nomAlbum,
        int $numeroPiste
    ) {
        parent::__construct($titrePiste, $cheminFichier);
        $this->album = $nomAlbum;
        $this->numPiste = $numeroPiste;
    }

    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }
}