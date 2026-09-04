<?php
//Ligne pour definir le doc en tant que html
echo "<!DOCTYPE html>\n";
echo "<html lang=\"fr\">\n";

echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <title>Script php</title>\n";
echo "</head>\n";

echo "<body>\n";





echo "<h1>Allo le monde ?</h1>\n" ;
print "<h3>a l'eau, limande ?</h3> \n";

$uneVariable = "menthe";

print $uneVariable . "<h2>Halo</h2>  \n" ;

print "céfini \n";

//2.variables et types
$v1 = 42;
$v2 = 73;
print "Somme : " . $v1+$v2;
print "\n Diff : " . $v1-$v2;

print "<br>\n";
print gettype($v1);
print gettype($v2);

print "<br>\n";
$v1 = "422";
$v2 = 73;
print "Somme 2 : " . $v1+$v2;

print "<br>\n";
print gettype($v1);

$val1 = 1337;      
$val2 = 01337;      
$val3 = 0x1337;    
$val4 = 3.14159;    
$val5 = "yopyop";   
$val6 = 'yepyep';   
$val7 = True;       
$val8 = False;

echo 'la variable $val1 est de type : ' . gettype($val1) . " et a pour valeur : " . $val1 . "\n";
echo 'la variable $val2 est de type : ' . gettype($val2) . " et a pour valeur : " . $val2 . "\n";
echo 'la variable $val3 est de type : ' . gettype($val3) . " et a pour valeur : " . $val3 . "\n";
echo 'la variable $val4 est de type : ' . gettype($val4) . " et a pour valeur : " . $val4 . "\n";
echo 'la variable $val5 est de type : ' . gettype($val5) . " et a pour valeur : " . $val5 . "\n";
echo 'la variable $val6 est de type : ' . gettype($val6) . " et a pour valeur : " . $val6 . "\n";
echo 'la variable $val7 est de type : ' . gettype($val7) . " et a pour valeur : " . $val7 . "\n";
echo 'la variable $val8 est de type : ' . gettype($val8) . " et a pour valeur : " . $val8 . "\n";

echo "variable v1 : $v1";
echo 'variable v2 : $v2';

echo "la variable \$v1 vaut $v1\n";
echo "la variable \"\$v2\" vaut $v2\n";

print "</body>\n";
print "</html>\n";
?>

