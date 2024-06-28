<?php
session_start();

// Walidacja danych
if (isset($_SESSION['user_id']) && isset($_POST['comment'])) {
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    // Walidacja komentarza
    $comment = htmlspecialchars($comment);
    $comment = trim($comment);

    if (empty($comment)) {
        $message = "Błąd: Komentarz nie może być pusty.";
        header("Location: index.php?message=" . urlencode($message));
        exit();
    }

    $maxCommentLength = 1000; // Maksymalna dopuszczalna długość komentarza
    if (strlen($comment) > $maxCommentLength) {
        $message = "Błąd: Komentarz jest zbyt długi. Maksymalna długość to $maxCommentLength znaków.";
        header("Location: index.php?message=" . urlencode($message));
        exit();
    }


    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'wpr';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Dodaj nowy komentarz
    $insert_sql = "INSERT INTO opinions (user_id, comment) VALUES ($user_id, '$comment')";
    if ($conn->query($insert_sql) === TRUE) {
        $message = "Komentarz został dodany.";
        header("Location: index.php?message=" . urlencode($message));
        exit();
    } else {
        echo "Błąd podczas dodawania komentarza: " . $conn->error;
    }

    $conn->close();
} else {
    $message = "Błąd: Niezalogowany użytkownik lub brak komentarza.";
    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>
