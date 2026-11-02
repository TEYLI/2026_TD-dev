<?php
namespace iutnc\deefy\action;

class AddUserAction extends Action {
    
    public function execute(): string {
        if ($this->http_method === 'GET') {
            $html = <<<HTML
            <h3>Inscription d'un nouvel utilisateur</h3>
            <form method="post" action="?action=add-user">
                <label>Nom : <br><input type="text" name="nom" required></label><br><br>
                <label>Email : <br><input type="email" name="email" required></label><br><br>
                <label>Âge : <br><input type="number" name="age" min="1" required></label><br><br>
                <button type="submit">Connexion</button>
            </form>
HTML;
            return $html;
        } 
        
        elseif ($this->http_method === 'POST') {
            $nom = filter_var($_POST['nom'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
            
            $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);

            return "<p>Nom: $nom, Email: $email, Age: $age ans</p>";
        }

        return "<p>Méthode HTTP non supportée.</p>";
    }
}