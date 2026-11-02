<?php
namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\render\AudioListRenderer;

class AddPlaylistAction extends Action {
    
    public function execute(): string {
        if ($this->http_method === 'GET') {
            $html = <<<HTML
            <h3>Créer une nouvelle Playlist</h3>
            <form method="post" action="?action=add-playlist">
                <label for="nom_playlist">Nom de la playlist :</label>
                <input type="text" id="nom_playlist" name="nom_playlist" required>
                <button type="submit">Créer la playlist</button>
            </form>
HTML;
            return $html;
        } 
        
        elseif ($this->http_method === 'POST') {
            $nomNettoye = filter_var($_POST['nom_playlist'], FILTER_SANITIZE_SPECIAL_CHARS);
            
            $playlist = new Playlist($nomNettoye);
            $_SESSION['playlist'] = $playlist;
            
            $renderer = new AudioListRenderer($playlist);
            $html = "<h3>Playlist créée avec succès !</h3>";
            
            $html .= $renderer->render(1);
            
            $html .= '<br><a href="?action=add-track">Ajouter une piste</a>';
            
            return $html;
        }

        return "<p>Méthode HTTP non supportée.</p>";
    }
}