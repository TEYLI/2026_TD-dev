<?php
namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;

class AddPlaylistAction extends Action {
    public function execute(): string {
        if (!isset($_SESSION['playlist'])) {
            $_SESSION['playlist'] = new Playlist("Ma Playlist");
            return "<p>Une nouvelle playlist a été créée et stockée dans votre session.</p>";
        }
        return "<p>Attention : Une playlist existe déjà dans votre session.</p>";
    }
}