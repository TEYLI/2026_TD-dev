<?php
namespace iutnc\deefy\repository;

use PDO;
use Exception;

class DeefyRepository {
    private static array $config = [];
    private static ?DeefyRepository $instance = null;
    private PDO $pdo;

    private function __construct(array $config) {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
        
        try {
            $this->pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function setConfig(string $file): void {
        $conf = parse_ini_file($file);
        if ($conf === false) {
            throw new Exception("Impossible de lire le fichier de configuration : $file");
        }
        self::$config = $conf;
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            if (empty(self::$config)) {
                throw new Exception("La configuration (setConfig) doit être appelée avant getInstance.");
            }
            self::$instance = new self(self::$config);
        }
        return self::$instance;
    }

    public function saveTrack(\iutnc\deefy\audio\tracks\AudioTrack $track): \iutnc\deefy\audio\tracks\AudioTrack {
        $query = "INSERT INTO track (titre, filename, duree) VALUES (:titre, :filename, :duree)";
        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute([
            ':titre' => $track->titre,
            ':filename' => $track->nomAudio, 
            ':duree' => $track->duree ?? 0 
        ]);
        
        $id = $this->pdo->lastInsertId();
        
        $track->setId((int)$id);
        
        return $track;
    }
}