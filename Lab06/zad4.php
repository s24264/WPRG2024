<?php
function sumaCyfrLiczby($liczba) {

    while (true) {
        $suma = 0;

        while ($liczba != 0) {
            $suma += $liczba % 10;
            $liczba = floor($liczba / 10);
        }


        if ($suma <= 10) {
            return $suma;
        }

        else {
            echo "Suma cyfr: $suma\n";
            $liczba = $suma;
        }
    }
}


$liczba = 12345;
echo "Poczatkowa liczba: $liczba\n";
echo "Suma cyfr mniejsza lub rowna 10: " . sumaCyfrLiczby($liczba) . "\n";
?>
