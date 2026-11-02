<?php
namespace iutnc\deefy\action;

class DefaultAction extends Action {
    public function execute(): string {
        return "<h3>Bienvenue sur Deefy</h3>
                <p>Utilisez le menu de navigation pour gérer votre playlist en session.</p>";
    }
}