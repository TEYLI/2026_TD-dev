<?php
session_start();
if (isset($_SESSION['fibonacci']) && count($_SESSION['fibonacci']) >= 2) {
    
    $taille = count($_SESSION['fibonacci']);
    
    $nouvelleValeur = $_SESSION['fibonacci'][$taille - 1] + $_SESSION['fibonacci'][$taille - 2];
    
    $_SESSION['fibonacci'][] = $nouvelleValeur;
    
    echo "La valeur courante calculée est : <strong>" . $nouvelleValeur . "</strong>";
    
} else {
    echo "La suite n'est pas initialisée. Exécutez d'abord le script d'initialisation.";
}
?>