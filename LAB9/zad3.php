<?php
$counter_file = "licznik.txt";


if (file_exists($counter_file)) {

    $current_count = intval(file_get_contents($counter_file));


    $new_count = $current_count + 1;


    file_put_contents($counter_file, $new_count);


    echo "Liczba odwiedzin: $new_count";
} else {

    $initial_count = 1;
    file_put_contents($counter_file, $initial_count);

    
    echo "Witamy na stronie! Liczba odwiedzin: $initial_count";
}
?>
