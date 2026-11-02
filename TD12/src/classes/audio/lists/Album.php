<?php
namespace iutnc\deefy\audio\lists;

class Album extends AudioList {
    protected ?string $artiste = null;
    protected ?string $dateSortie = null;

    public function __construct(string $nom, array $pistes) {
        parent::__construct($nom, $pistes);
    }

    public function setArtiste(string $artiste): void {
        $this->artiste = $artiste;
    }

    public function setDateSortie(string $dateSortie): void {
        $this->dateSortie = $dateSortie;
    }
}