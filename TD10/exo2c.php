<?php
session_start();

if (isset($_SESSION['fibonacci']) && is_array($_SESSION['fibonacci'])) {
    
    $taille = count($_SESSION['fibonacci']);
    
    foreach ($_SESSION['fibonacci'] as $index => $valeur) {
        echo $valeur;
        
        if ($index < $taille - 1) {
            echo " - ";
        }
    }
    
} else {
    echo "La suite est vide";
}
?>