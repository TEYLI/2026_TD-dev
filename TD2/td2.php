<?php
//Exo 1
echo "Exo1:  ";
function plusGrand(int|float $a,int|float $b) : int|float {
    if ($a < $b){
        return $b;
    } else { 
        return $a;
    }
}
echo plusGrand(5,6);

//Exo 2
echo "<br>  Exo 2:  ";
function divisible(int $max,int $div = 2): void{ 
    for ($i = $max; $i >= 0; $i--) {
        echo $i;
        if ($i % $div === 0) {
            echo " (divisible par $div)";
        }
        echo "<br>"; 
    }
}

divisible(10,2);

//Exo 3
function puissance(int|float $x,int $n):int|float {
    $i = 0; 
    $resultat = 1;
    while ($i < $n) {
        $resultat = $resultat * $x; 
        $i++;                   
    }
    return $resultat;
}
echo "<br>Exo3:  ";
echo puissance(2,2);

//Exo 4
function ex4(int $a, $b, $c) {
    switch($a) {
        case 1:
            $p1EstNombre = is_int($b) || is_float($b);
            $p2EstNombre = is_int($c) || is_float($c);
            
            if ($p1EstNombre && $p2EstNombre) {
                plusGrand($b, $c);
            } else {
                echo "Erreur";
            }
            break;
        case 2:
            
            if (is_int($b) && is_int($c)) {
                divisible($b, $c);
            } else {
                echo "Erreurs";
            }
            break;
            
        case 3:
            $p1EstNombre = is_int($b) || is_float($b);
            $p2EstNombre = is_int($c); 
            
            if ($p1EstNombre && $p2EstNombre) {
                puissance($b, $c);
            } else {
                echo "Erreur";
            }
            break;
            
        default:
            echo "Erreur";
            break;
    }
}

ex4(1, 2, 3);
?>

