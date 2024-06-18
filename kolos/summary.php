<?php
session_start();

if (!isset($_SESSION['form_data'])) {
    header("Location: index.php");
    exit;
}

$form_data = $_SESSION['form_data'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accept'])) {
    setcookie('s24264', date('Y-m-d H:i:s'), time() + 3600);

    $mysqli = new mysqli('localhost', 'root', '', 'defekty');
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO zgloszenia (imie, nazwisko, adres_email, defekt) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $form_data['imie'], $form_data['nazwisko'], $form_data['adres_email'], $form_data['defekt']);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    unset($_SESSION['form_data']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Podsumowanie zgłoszenia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Podsumowanie zgłoszenia</h2>
<p><strong>Imię:</strong> <?= htmlspecialchars($form_data['imie']) ?></p>
<p><strong>Nazwisko:</strong> <?= htmlspecialchars($form_data['nazwisko']) ?></p>
<p><strong>E-mail:</strong> <?= htmlspecialchars($form_data['adres_email']) ?></p>
<p><strong>Opis:</strong> <?= htmlspecialchars($form_data['defekt']) ?></p>

<form action="summary.php" method="post">
    <input type="submit" name="accept" value="Akceptuj">
</form>
</body>
</html>
