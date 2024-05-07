<?php

$ciag_liczb = readline("Podaj ciag liczb: ");


$ciag_przetworzony = preg_replace('/[\\\\\/:*?"<>|+\-.]/', '', $ciag_liczb);


echo "Przetworzony ciag: " . $ciag_przetworzony . "\n";
?>
