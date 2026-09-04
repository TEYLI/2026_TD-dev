<?php
//Exo 1
function plusGrand(int $a,int $b) : int {
    if ($a < $b){
        return $b;
    } else { 
        return $a;
    }
}
echo plusGrand(5,6);

//Exo 2
function divisible(int $max,int $div){
    for ($i = $max; $i >= 0; $i--) {
        echo $i;
        if ($i % $div === 0) {
            echo " (divisible par $div)";
        }
        echo "\n"; 
    }
}

divisible(10,12);

//Exo
?>

