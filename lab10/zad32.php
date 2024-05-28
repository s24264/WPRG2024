<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witaj</title>
</head>
<body>
<h1>Witaj, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>Zostałeś pomyślnie zalogowany.</p>
<a href="welcome.php?logout=true">Wyloguj</a>
</body>
</html>
