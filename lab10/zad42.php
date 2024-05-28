<?php
session_start();

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $usersFile = 'users.txt';
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('Location: result.php');
            exit();
        }
    }
    $loginError = 'Nieprawidłowy email lub hasło.';
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
<?php if ($loginError): ?>
    <p style="color: red;"><?php echo $loginError; ?></p>
<?php endif; ?>
<form action="login.php" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Zaloguj się</button>
</form>
</body>
</html>
