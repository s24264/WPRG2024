<?php
$options = [
    'PHP',
    'JavaScript',
    'Python',
    'Java',
    'C++'
];

$results = [];
$totalVotes = 0;

foreach ($options as $key => $option) {
    $file = "votes/{$key}.txt";
    $votes = file_exists($file) ? intval(file_get_contents($file)) : 0;
    $results[$option] = $votes;
    $totalVotes += $votes;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki sondy</title>
</head>
<body>
<h1>Wyniki sondy</h1>
<ul>
    <?php foreach ($results as $option => $votes): ?>
        <li><?php echo $option; ?>: <?php echo $votes; ?> głosów (<?php echo $totalVotes > 0 ? round(($votes / $totalVotes) * 100, 2) : 0; ?>%)</li>
    <?php endforeach; ?>
</ul>
<p>Łączna liczba głosów: <?php echo $totalVotes; ?></p>
</body>
</html>
