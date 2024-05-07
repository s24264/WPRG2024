<?php

echo "Podaj ciag znakow: ";
$text = readline();


$vowels = "aeiouAEIOU";


$vowel_count = 0;
for ($i = 0; $i < strlen($text); $i++) {
    
    if (strpos($vowels, $text[$i]) !== false) {
        $vowel_count++;
    }
}


echo "Ilosc samoglosek w ciagu '$text': $vowel_count";
?>
