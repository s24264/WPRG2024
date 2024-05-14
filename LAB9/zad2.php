<?php
function manageDirectory($path, $directory, $operation = 'read') {

    if (substr($path, -1) !== '/') {
        $path .= '/';
    }


    if (!is_dir($path)) {
        echo "Blad: Sciezka '$path' nie istnieje lub nie jest katalogiem.";
        return;
    }


    switch ($operation) {
        case 'read':
            $items = scandir($path . $directory);
            echo "Elementy w katalogu '$directory':<br>";
            foreach ($items as $item) {
                echo "$item<br>";
            }
            break;
        case 'delete':

            $items = scandir($path . $directory);
            if (count($items) > 2) {
                echo "Blad: Katalog '$directory' nie jest pusty.";
                return;
            }

            if (rmdir($path . $directory)) {
                echo "Katalog '$directory' zostal pomyslnie usuniety.";
            } else {
                echo "Blad: Nie udalo sie usunac katalogu '$directory'.";
            }
            break;
        case 'create':

            if (mkdir($path . $directory)) {
                echo "Katalog '$directory' zostal pomyslnie stworzony.";
            } else {
                echo "Blad: Nie udalo sie stworzyc katalogu '$directory'.";
            }
            break;
        default:
            echo "Blad: Nieprawidlowa operacja.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $path = $_POST['path'];
    $directory = $_POST['directory'];
    $operation = $_POST['operation'];


    manageDirectory($path, $directory, $operation);
} else {
    echo "Blad: Nieprawidlowy sposob przeslania danych.";
}
?>
