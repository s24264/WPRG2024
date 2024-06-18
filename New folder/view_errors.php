<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'defekty');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $stmt = $mysqli->prepare("DELETE FROM zgloszenia WHERE id = ?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    $stmt->close();
}

$result = $mysqli->query("SELECT * FROM zgloszenia");

$errors = [];
while ($row = $result->fetch_assoc()) {
    $errors[] = $row;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista zgłoszeń</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Lista zgłoszeń</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Opis</th>
        <th>Akcje</th>
    </tr>
    <?php foreach ($errors as $error): ?>
        <tr>
            <td><?= htmlspecialchars($error['id']) ?></td>
            <td><?= htmlspecialchars($error['imie']) ?></td>
            <td><?= htmlspecialchars($error['nazwisko']) ?></td>
            <td><?= htmlspecialchars($error['adres_email']) ?></td>
            <td><?= htmlspecialchars($error['defekt']) ?></td>
            <td>
                <form action="view_errors.php" method="post">
                    <input type="hidden" name="id" value="<?= $error['id'] ?>">
                    <input type="submit" name="delete" value="Usuń">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
