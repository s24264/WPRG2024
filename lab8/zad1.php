<?php

$ciag_znakow = readline("Podaj ciag znakow: ");


echo "Ciag duzymi literami: " . strtoupper($ciag_znakow) . "\n";


echo "Ciag malymi literami: " . strtolower($ciag_znakow) . "\n";


echo "Pierwsza litera dużą literą: " . ucfirst($ciag_znakow) . "\n";


echo "Wszystkie pierwsze litery kazdego ze slow beda wypisane duza litera: " . ucwords($ciag_znakow) . "\n";
?>
