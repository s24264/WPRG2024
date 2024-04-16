<?php
function sumaCiąguArytmetycznegoIGeometrycznego($pierwszy, $różnicaIloraz, $liczbaElementów) {

    $sumaArytmetycznego = ($liczbaElementów * ($pierwszy + ($pierwszy + ($liczbaElementów - 1) * $różnicaIloraz))) / 2;


    if ($różnicaIloraz != 1) {
        $sumaGeometrycznego = $pierwszy * (1 - pow($różnicaIloraz, $liczbaElementów)) / (1 - $różnicaIloraz);
    } else {
        $sumaGeometrycznego = $pierwszy * $liczbaElementów;
    }


    echo "Suma ciągu arytmetycznego: " . $sumaArytmetycznego . "\n";
    echo "Suma ciągu geometrycznego: " . $sumaGeometrycznego . "\n";
}


$pierwszy = 2;
$różnicaIloraz = 3;
$liczbaElementów = 5;

sumaCiąguArytmetycznegoIGeometrycznego($pierwszy, $różnicaIloraz, $liczbaElementów);
?>
