<?php
namespace iutnc\deefy\action;

class DisplayPlaylistAction extends Action {
    public function execute(): string {
        if (isset($_SESSION['playlist'])) {
            return "<h3>Contenu de la Playlist</h3>
                    <pre>" . print_r($_SESSION['playlist'], true) . "</pre>";
        }
        return "<p>Aucune playlist n'est actuellement stockée en session.</p>";
    }
}