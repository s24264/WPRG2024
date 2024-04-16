
<?php
function pierwsza($liczba){
    if($liczba <=1){
        return false;
    }
    for($i=2;$i<$liczba;$i++){
        if($liczba % $i==0){
            return false;
        }
    }
    return true;

}
function wypisz($start, $koniec) {
    if($start <= 0 || $start >= $koniec){
        echo"BLAD w starcie";
        return false;
    }
    if($koniec <= 0 ){
        echo "BLAD na koncu";
        return false;
    }
    for ($i = $start; $i <= $koniec; $i++) {
        if (pierwsza($i)) {
            echo $i . " ";
        }
    }
}
$a=4;
$b=23;
wypisz($a,$b);
?>

