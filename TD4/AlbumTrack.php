<?php
class AlbumTrack {
    public string $titre;
    public ?string $artiste = null;
    public string $album;
    public ?int $annee = null ;
    public int $numPiste;
    public ?string $genre = null;
    public ?int $duree = null;
    public string $nomAudio;
    
    public function __construct(
        string $titrePiste,
        string $cheminFichier,
        string $nomAlbum,
        int $numeroPiste
    ) {
        $this->titre = $titrePiste;
        $this->nomAudio = $cheminFichier;
        $this->album = $nomAlbum;
        $this->numPiste = $numeroPiste;
    }

    public function __toString() : string {
        return json_encode(get_object_vars($this));
    }
}