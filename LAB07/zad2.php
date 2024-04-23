<?php
function pokazDolar($array, $n) {
    if (!is_array($array) || !is_int($n) || $n < 0 || $n >= count($array)) {
        echo "BŁĄD";
        return;
    }

    $result = array();

    for ($i = 0; $i < count($array); $i++) {
        if ($i == $n) {
            $result[$i] = '$';
        } else {
            $result[$i] = $array[$i];
        }
    }

    return $result;
}

$array = array(1, 2, 3, 4, 5);
$n = 2;
$result = pokazDolar($array, $n);

if ($result !== null) {
    foreach ($result as $value) {
        echo $value . " ";
    }
}
?>
