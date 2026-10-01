<?php
ob_start();

echo "<h2>Requête reçue :</h2>";
echo $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI'] . " " . $_SERVER['SERVER_PROTOCOL'] . "<br>\n";

foreach (getallheaders() as $name => $value) {
    echo "$name: $value<br>\n";
}

echo "<br><p>Le corps de la réponse a été généré ici...</p>";
http_response_code(201);
header("xxx-headerTD8: Operation-Reussie");
?>