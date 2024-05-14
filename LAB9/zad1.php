<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki</title>
</head>
<body>
<?php

function showBirthInfo($birthdate) {

    echo "<p>Urodziłeś się: $birthdate</p>";


    $dayOfWeek = date('l', strtotime($birthdate));
    echo "<p>Urodziłeś się w dniu tygodnia: $dayOfWeek</p>";


    $today = date('Y-m-d');
    $age = date_diff(date_create($birthdate), date_create($today))->y;
    echo "<p>Ukończyłeś $age lat.</p>";


    $nextBirthday = date('Y') . "-" . date('m-d', strtotime($birthdate));
    if ($nextBirthday < $today) {
        $nextBirthday = (date('Y') + 1) . "-" . date('m-d', strtotime($birthdate));
    }
    $daysToNextBirthday = date_diff(date_create($today), date_create($nextBirthday))->days;
    echo "<p>Do Twoich kolejnych urodzin pozostało $daysToNextBirthday dni.</p>";
}


if (isset($_GET['birthdate'])) {
    $birthdate = $_GET['birthdate'];
    showBirthInfo($birthdate);
} else {
    echo "<p>Nie podano daty urodzenia.</p>";
}
?>
</body>
</html>
