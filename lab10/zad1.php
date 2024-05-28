<?php

define('VISIT_LIMIT', 10);


if (isset($_GET['reset'])) {
    
    $visits = 0;
    setcookie('visits', $visits, time() - 3600, "/");
} else {
    if (isset($_COOKIE['visits'])) {
        $visits = intval($_COOKIE['visits']) + 1;
    } else {
        $visits = 1;
    }

    setcookie('visits', $visits, time() + (86400 * 365), "/"); // 1 rok
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licznik odwiedzin</title>
</head>
<body>
<h1>Liczba odwiedzin: <?php echo $visits; ?></h1>

<?php if ($visits >= VISIT_LIMIT): ?>
    <p>Osiągnąłeś limit odwiedzin: <?php echo VISIT_LIMIT; ?></p>
<?php endif; ?>

<form action="index.php" method="get">
    <button type="submit" name="reset" value="true">Resetuj licznik odwiedzin</button>
</form>
</body>
</html>
