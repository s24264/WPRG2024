<?php
function pomnozMacierze($macierz1, $macierz2) {
    $wiersze1 = count($macierz1);
    $kolumny1 = count($macierz1[0]);
    $wiersze2 = count($macierz2);
    $kolumny2 = count($macierz2[0]);


    if ($kolumny1 != $wiersze2) {
        echo "Niepoprawne wymiary macierzy. Liczba kolumn pierwszej macierzy musi byc rowna liczbie wierszy drugiej macierzy.\n";
        return null;
    }


    $wynikowaMacierz = array();
    for ($i = 0; $i < $wiersze1; $i++) {
        $wynikowaMacierz[$i] = array_fill(0, $kolumny2, 0);
    }


    for ($i = 0; $i < $wiersze1; $i++) {
        for ($j = 0; $j < $kolumny2; $j++) {
            for ($k = 0; $k < $kolumny1; $k++) {
                $wynikowaMacierz[$i][$j] += $macierz1[$i][$k] * $macierz2[$k][$j];
            }
        }
    }

    return $wynikowaMacierz;
}


$macierz1 = array(
    array(2, 3),
    array(4, 1),
);

$macierz2 = array(
    array(1, 5),
    array(6, 2),
);


$wynik = pomnozMacierze($macierz1, $macierz2);


if ($wynik != null) {
    echo "Wynik mnożenia macierzy:\n";
    foreach ($wynik as $wiersz) {
        echo implode(" ", $wiersz) . "\n";
    }
}
?>
