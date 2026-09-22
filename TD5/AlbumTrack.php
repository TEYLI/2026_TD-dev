<?php
require_once 'AudioTrack.php';

class AlbumTrack extends AudioTrack {
    protected ?string $artiste = null;
    protected string $album;
    protected ?int $annee = null;
    protected int $numPiste;
    
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

    public function setArtiste(?string $artiste): void {
        $this->artiste = $artiste;
    }

    public function setAnnee(?int $annee): void {
        $this->annee = $annee;
    }
    
    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }
}