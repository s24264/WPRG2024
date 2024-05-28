<?php
session_start();


$valid_username = 'admin';
$valid_password = 'password123';

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: result.php");
        exit();
    } else {
        $login_error = 'Błędny login lub hasło.';
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
<h1>Logowanie</h1>
<?php if ($login_error): ?>
    <p style="color:red;"><?php echo $login_error; ?></p>
<?php endif; ?>
<form action="login.php" method="post">
    <div>
        <label for="username">Login:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Zaloguj</button>
</form>
</body>
</html>
