<?php
function createArray($a, $b, $c, $d) {
    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c) || !is_numeric($d)) {
        echo "BŁĄD";
        return;
    }

    $result = array();

    for ($i = $a; $i <= $b; $i++) {
        $result[$i]=rand($c,$d);

    }

    return $result;
}

$a = 1;
$b = 4;
$c = 10;
$d = 13;
$array = createArray($a, $b, $c, $d);

if ($array !== null) {
    print_r($array);
}
?>
