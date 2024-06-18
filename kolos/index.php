<?php
session_start();

if (isset($_COOKIE['s24264'])) {
    echo "Użytkownik wysłał już zgłoszenie.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['submit'])) {
    $_SESSION['form_data'] = [
        'imie' => $_GET['imie'],
        'nazwisko' => $_GET['nazwisko'],
        'adres_email' => $_GET['adres_email'],
        'defekt' => $_GET['defekt']
    ];
    header("Location: summary.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zgłaszanie błędów</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Add Person</h1>
<form action="index.php" method="get">
    <label for="imie"></label>
    <input type="text" id="imie" name="imie" placeholder="imię" required><br><br>

    <label for="nazwisko"></label>
    <input type="text" id="nazwisko" name="nazwisko" placeholder="nazwisko" required><br><br>

    <label for="adres_email"></label>
    <input type="email" id="adres_email" name="adres_email" placeholder="e-mail" required><br><br>

    <label for="defekt"></label>
    <textarea id="defekt" name="defekt" maxlength="255" placeholder="opis" required></textarea><br><br>

    <input type="submit" name="submit" value="Wyślij">
</form>
</body>
</html>
