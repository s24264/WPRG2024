<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        $errors[] = 'Wszystkie pola są wymagane.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Podaj poprawny adres email.';
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,}$/', $password)) {
        $errors[] = 'Hasło musi zawierać co najmniej 6 znaków, w tym 1 wielką literę, cyfrę oraz znak specjalny.';
    } else {
        $usersFile = 'users.txt';
        $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $errors[] = 'Adres email jest już zarejestrowany.';
                break;
            }
        }

        if (empty($errors)) {
            $users[] = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            file_put_contents($usersFile, json_encode($users));
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
<h1>Rejestracja</h1>
<?php if ($errors): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li style="color: red;"><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="register.php" method="post">
    <div>
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" required>
    </div>
    <div>
        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Zarejestruj się</button>
</form>
</body>
</html>
