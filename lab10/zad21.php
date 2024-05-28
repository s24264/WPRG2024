<?php
$question = "Jaki jest Twój ulubiony język programowania?";
$options = [
    'PHP',
    'JavaScript',
    'Python',
    'Java',
    'C++'
];
$cookie_name = 'voted';


if (isset($_COOKIE[$cookie_name])) {
    header("Location: results.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vote'])) {
        $vote = $_POST['vote'];
        if (array_key_exists($vote, $options)) {
            
            $file = "votes/{$vote}.txt";
            if (!file_exists('votes')) {
                mkdir('votes', 0777, true);
            }
            file_put_contents($file, (file_exists($file) ? intval(file_get_contents($file)) : 0) + 1);

            setcookie($cookie_name, 'true', time() + (86400 * 365), "/");
            header("Location: results.php");
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
    <title>Sonda internetowa</title>
</head>
<body>
<h1><?php echo $question; ?></h1>
<form action="index.php" method="post">
    <?php foreach ($options as $key => $option): ?>
        <div>
            <input type="radio" id="option<?php echo $key; ?>" name="vote" value="<?php echo $key; ?>" required>
            <label for="option<?php echo $key; ?>"><?php echo $option; ?></label>
        </div>
    <?php endforeach; ?>
    <button type="submit">Głosuj</button>
</form>
</body>
</html>
