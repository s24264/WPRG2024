<!DOCTYPE html>
<html>
<head>
    <title>Rejestracja - Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include 'header.php';
?>

<section>
    <div class="container">
        <h2>Rejestracja</h2>
        <?php
        // Obsługa formularza rejestracji
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            // Walidacja danych
            if (empty($username) || empty($password) || empty($email)) {
                echo "<p class='error'>Wszystkie pola są wymagane.</p>";
            } else {
                // Połączenie z bazą danych
                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $dbname = "wpr"; // Zmień na nazwę twojej bazy danych

                $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                // Sprawdzenie połączenia
                if ($conn->connect_error) {
                    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
                }

                // Walidacja unikalności nazwy użytkownika i emaila
                $query_username = "SELECT * FROM users WHERE username = '$username'";
                $query_email = "SELECT * FROM users WHERE email = '$email'";

                $result_username = $conn->query($query_username);
                $result_email = $conn->query($query_email);

                if ($result_username->num_rows > 0) {
                    echo "<p class='error'>Nazwa użytkownika jest już zajęta.</p>";
                } elseif ($result_email->num_rows > 0) {
                    echo "<p class='error'>Email jest już używany przez innego użytkownika.</p>";
                } else {
                    // Haszowanie hasła przed zapisaniem do bazy danych
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Dodanie użytkownika do bazy danych
                    $insert_query = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

                    if ($conn->query($insert_query) === TRUE) {
                        echo "<p class='success'>Rejestracja zakończona sukcesem. Możesz teraz się zalogować.</p>";
                        header("Location: login.php");
                    } else {
                        echo "Błąd: " . $insert_query . "<br>" . $conn->error;
                    }
                }

                $conn->close();
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <input type="submit" name="register" value="Zarejestruj się">
        </form>
    </div>
</section>

<?php
include 'footer.php';
?>
</body>
</html>
