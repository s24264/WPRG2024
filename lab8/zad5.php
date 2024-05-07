<?php

echo "Podaj liczbe zmiennoprzecinkowa: ";
$liczba = readline();


if (is_numeric($liczba)) {

    if (strpos($liczba, '.') !== false) {

        $czesci = explode('.', $liczba);


        $dlugosc_po_przecinku = strlen($czesci[1]);


        echo "Ilosc cyfr po przecinku: $dlugosc_po_przecinku";
    } else {
        echo "Podana liczba nie jest liczba zmiennoprzecinkowa.";
    }
} else {
    echo "Podana wartosc nie jest liczba.";
}
?>
