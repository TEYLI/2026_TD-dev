<?php
ob_start();
echo $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI'] . " " . $_SERVER['SERVER_PROTOCOL'] . "<br>\n";

foreach (getallheaders() as $name => $value) {
    echo "$name: $value<br>\n";
}

http_response_code(201);
header("xxx-headerTD8: Operation-Reussie");

$expiration = time() + 8200;
if(isset($_COOKIE['pistache'])){
    $valeur = $_COOKIE['pistache'] + 1;
} else {
    $valeur = 1;
}
setcookie('pistache', $valeur, $expiration);
echo "c'est votre " . $valeur . "ème visites";

?>