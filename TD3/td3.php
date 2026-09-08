<?php
$playlist = [
    "nom" => "Ma playlist",
    "genre" => "Pop/Rock",
    "createur" => "TEYLI",
    "date" => "01/09/2026",
    "nbpistes" => "0",
    "duree" => "0",
];
function display($playlist) {
    echo "Playlist: " . $playlist["nom"] . " (" . $playlist["genre"] . ")";
    echo "par " . $playlist["createur"] . " le " . $playlist["date"] . "";
    echo $playlist["nbpistes"] . " pistes pour une durée totale " . $playlist["duree"] . " s";
    echo "<br>";
}

display($playlist);


$piste1 = [
    "titre" => "my funny valentine",
    "artiste" => "chet baker",
    "album" => "My Funny Valentine",
    "annee" => 1954,
    "genre" => "classic jazz",
    "numero" => 1,
    "duree" => 187
];

$piste2 = [
    "titre" => "Gimme Shelter",
    "artiste" => "The Rolling Stones",
    "album" => "Let it Bleed",
    "annee" => 1969,
    "genre" => "rock",
    "numero" => 2,
    "duree" => 270
];

$piste3 = [
    "titre" => "Whole Lotta Love",
    "artiste" => "Led Zeppelin",
    "album" => "Led Zeppelin II",
    "annee" => 1969,
    "genre" => "rock",
    "numero" => 3,
    "duree" => 334
];

function display_track($piste, $format = 'court') {
    switch ($format) {
        case 'etendu':
            echo $piste["numero"] . "-" . $piste["titre"] . " - by " . $piste["artiste"] . " (from " . $piste["album"] . ", " . $piste["annee"] . ")" . $piste["duree"] . "s: " . $piste["genre"];
            echo "<br>";
            break;
            
        case 'complet':
            echo $piste["numero"] . "-" . $piste["titre"] . " - by " . $piste["artiste"] . " (from " . $piste["album"] . ") -" . $piste["duree"] . "s";
            echo "<br>";
            break;
            
        case 'court':
        default:
            echo $piste["titre"] . " - by " . $piste["artiste"] . " (from " . $piste["album"] . ")";
            echo "<br>";
            break;
    }
}
display_track($piste3);
display_track($piste1, 'complet'); 
display_track($piste1, 'etendu'); 

function play_track($piste) {
    echo $piste["titre"];
    echo '<br>';
    for($i = 1; $i <= $piste["duree"];$i++) {
        echo $i . ".";
    }
}
play_track($piste3);


function add_track($playlist,$piste) : array{
    if (!isset($playlist["pistes"])) {
        $playlist["pistes"] = [];
    }
    
    $playlist["pistes"][] = $piste;
    $playlist["nbpistes"] += 1;
    $playlist["duree"] += $piste["duree"];
    
    return $playlist;
}
$playlist = add_track($playlist, $piste1);
$playlist = add_track($playlist, $piste2);
$playlist = add_track($playlist, $piste3);

print_r($playlist);

function display2($playlist) {
    echo "Playlist: " . $playlist["nom"] . " (" . $playlist["genre"] . ")<br>";
    echo "par " . $playlist["createur"] . " le " . $playlist["date"] . "<br>";
    echo $playlist["nbpistes"] . " pistes pour une durée totale " . $playlist["duree"] . " s<br>";

    if (isset($playlist["pistes"])) {
        foreach ($playlist["pistes"] as $index => $piste) {
            $numero_ordre = $index + 1; 
            echo $numero_ordre . "- ";
            display_track($piste, 'court'); 
        }
    }
    echo "<br>";
}



function play($playlist) {
    if (isset($playlist["pistes"])) {
        foreach ($playlist["pistes"] as $piste) {
            play_track($piste);
            echo "<br><br>";
        }
    }
}



function remove_track($playlist, $numero_ordre) {
    $index = $numero_ordre - 1; 
    
    if (isset($playlist["pistes"][$index])) {
        $playlist["nbpistes"] -= 1;
        $playlist["duree"] -= $playlist["pistes"][$index]["duree"];
        
        unset($playlist["pistes"][$index]);
        
        $playlist["pistes"] = array_values($playlist["pistes"]);
    }
    
    return $playlist;
}

function melanger($playlist) {
    if (isset($playlist["pistes"])) {
        shuffle($playlist["pistes"]);
    }
    return $playlist;
}
?>

