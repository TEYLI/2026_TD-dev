<?php
ob_start();
echo $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI'] . " " . $_SERVER['SERVER_PROTOCOL'] . "<br>\n";

foreach (getallheaders() as $name => $value) {
    echo "$name: $value<br>\n";
}

http_response_code(201);
header("xxx-headerTD8: Operation-Reussie");





if (isset($_COOKIE['chocolat'])) {
    echo "La valeur du cookie est : " . $_COOKIE['chocolat'];
} else {
    $expiration = time() + (2 * 3600);
    setcookie("chocolat", "valeur2", $expiration, "/"); 
}
?>