<?php
namespace iutnc\deefy\action;

use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\render\AudioListRenderer;

class AddPodcastTrackAction extends Action {
    
    public function execute(): string {
        if ($this->http_method === 'GET') {
            if (!isset($_SESSION['playlist'])) {
                return "<p>Erreur : Veuillez d'abord créer une playlist.</p>";
            }
            
            $html = <<<HTML
            <h3>Ajouter un Podcast à la Playlist</h3>
            <form method="post" action="?action=add-track" enctype="multipart/form-data">
                <label>Titre de la piste : <br><input type="text" name="titre" required></label><br><br>
                
                <label>Fichier MP3 : <br><input type="file" name="userfile" accept=".mp3" required></label><br><br>
                
                <label>Auteur : <br><input type="text" name="auteur"></label><br><br>
                <label>Durée (secondes) : <br><input type="number" name="duree"></label><br><br>
                <button type="submit">Ajouter la piste</button>
            </form>
HTML;
            return $html;
        } 
        
        elseif ($this->http_method === 'POST') {
            if (!isset($_SESSION['playlist'])) {
                return "<p>Erreur : Aucune playlist trouvée en session.</p>";
            }

            $titre = filter_var($_POST['titre'], FILTER_SANITIZE_SPECIAL_CHARS);
            $auteur = filter_var($_POST['auteur'], FILTER_SANITIZE_SPECIAL_CHARS);
            $duree = filter_var($_POST['duree'], FILTER_SANITIZE_NUMBER_INT);

            if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
                
                $nomOrigine = $_FILES['userfile']['name'];
                $typeFichier = $_FILES['userfile']['type'];
                $tmpName = $_FILES['userfile']['tmp_name'];

                if (substr($nomOrigine, -4) !== '.mp3' || $typeFichier !== 'audio/mpeg') {
                    return "<p>Erreur : Le fichier doit être un fichier MP3 valide.</p>";
                }
                
                if (str_ends_with(strtolower($nomOrigine), '.php')) {
                    return "<p>Erreur : Fichier non autorisé.</p>";
                }

                $nomGenere = uniqid('track_') . '.mp3';
                
                $destination = 'audio/' . $nomGenere;

                if (move_uploaded_file($tmpName, $destination)) {
                    
                    $track = new PodcastTrack($titre, $nomGenere);
                    
                   if (!empty($auteur)) { $track->setAuteur($auteur); }
                    if (!empty($duree)) { $track->setDuree((int)$duree); }

                    $_SESSION['playlist']->ajouterPiste($track);

                    $renderer = new AudioListRenderer($_SESSION['playlist']);
                    $html = "<h3>Piste uploadée et ajoutée avec succès !</h3>";
                    $html .= $renderer->render(1); 
                    $html .= '<br><br><a href="?action=add-track">Ajouter encore une piste</a>';

                    return $html;
                    
                } else {
                    return "<p>Erreur lors de la sauvegarde du fichier sur le serveur.</p>";
                }
            } else {
                return "<p>Erreur lors du téléchargement du fichier (Code : " . $_FILES['userfile']['error'] . ").</p>";
            }
        }

        return "<p>Méthode HTTP non supportée.</p>";
    }
}