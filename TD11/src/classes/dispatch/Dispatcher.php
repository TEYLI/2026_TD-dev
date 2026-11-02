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
        echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Deefy</title>
</head>
<body>
    <header>
        <h1>Application Deefy</h1>
        <nav>
            <a href='?action=default'>Accueil</a> | 
            <a href='?action=add-playlist'>Créer Playlist</a> | 
            <a href='?action=add-track'>Ajouter Piste</a> | 
            <a href='?action=playlist'>Voir Playlist</a>
        </nav>
    </header>
    <main>
        $html
    </main>
</body>
</html>";
    }
}