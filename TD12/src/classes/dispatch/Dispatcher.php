<?php
namespace iutnc\deefy\dispatch;

class Dispatcher {
    private string $action;
    private array $routes = [];

    public function __construct() {
        $this->action = $_GET['action'] ?? 'default';
    }

    public function addRoute(string $actionName, string $className): self {
        $this->routes[$actionName] = $className;
        return $this;
    }

    public function run(): void {
        $className = $this->routes[$this->action] ?? $this->routes['default'];
        $actionObj = new $className();
        $html = $actionObj->execute();
        $this->renderPage($html);
    }

    private function renderPage(string $html): void {
        $page = <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Deefy</title>
    <style>
        nav a { margin-right: 15px; text-decoration: none; color: blue; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        header { margin-bottom: 30px; padding-bottom: 10px; border-bottom: 2px solid #ccc; }
    </style>
</head>
<body>
    <header>
        <h1>Deefy</h1>
        <nav>
            <a href="?action=default">Accueil</a>
            <a href="?action=add-user">Inscription</a>
            <a href="?action=add-playlist">Créer une playlist</a>
            
            <a href="?action=add-track">Ajouter une piste</a>
            <a href="?action=playlist">Voir la playlist</a>
        </nav>
    </header>
    
    <main>
        $html
    </main>
</body>
</html>
HTML;
        
        echo $page;
    }
}