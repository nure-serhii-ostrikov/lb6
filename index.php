<?php

require './vendor/autoload.php'; // Include mongodb

$client = new MongoDB\Client("mongodb://mongodb:27017");
$collection = $client->filmlibrary->movies;

$filter = [];
if (isset($_GET['media_type']) && $_GET['media_type'] !== '') {
    $filter['media_type'] = $_GET['media_type'];
}
if (isset($_GET['actor']) && $_GET['actor'] !== '') {
    $filter['actors'] = new MongoDB\BSON\Regex($_GET['actor'], 'i');
}
if (isset($_GET['new_releases']) && $_GET['new_releases'] === '1') {
    $filter['year'] = (int) date('Y');
}

$movies = $collection->find($filter);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашня фільмотека</title>
</head>
<body>
    <h1>Домашня фільмотека</h1>
    <form method="GET" id="searchForm">
        <label for="media_type">Тип носія:</label>
        <select name="media_type" id="media_type">
            <option value="">-- Виберіть --</option>
            <option value="VHS">Відеокасета</option>
            <option value="CD">CD</option>
            <option value="DVD">DVD</option>
            <option value="BR">BR</option>
        </select>
        
        <label for="actor">Актор:</label>
        <input type="text" name="actor" id="actor" placeholder="Введіть ім'я актора">
        
        <label>
            <input type="checkbox" name="new_releases" id="new_releases" value="1"> Новинки цього року
        </label>
        
        <button type="submit">Пошук</button>
    </form>

    <script>
    // Load saved preferences from localStorage
    window.addEventListener('DOMContentLoaded', () => {
        const mediaType = localStorage.getItem('media_type');
        const actor = localStorage.getItem('actor');
        const newReleases = localStorage.getItem('new_releases');

        if (mediaType) document.getElementById('media_type').value = mediaType;
        if (actor) document.getElementById('actor').value = actor;
        if (newReleases === '1') document.getElementById('new_releases').checked = true;
    });

    // Save preferences to localStorage on form submit
    document.getElementById('searchForm').addEventListener('submit', () => {
        localStorage.setItem('media_type', document.getElementById('media_type').value);
        localStorage.setItem('actor', document.getElementById('actor').value);
        localStorage.setItem('new_releases', document.getElementById('new_releases').checked ? '1' : '');
    });
    </script>

    <h2>Результати пошуку:</h2>
    <ul>
        <?php foreach ($movies as $movie): ?>
            <li>
                <strong><?php echo htmlspecialchars($movie['title']); ?></strong> (<?php echo $movie['year']; ?>)
                <br>Тип носія: <?php echo $movie['media_type']; ?>
                <br>Режисер: <?php echo htmlspecialchars($movie['director']); ?>
                <br>Жанр: <?php echo implode(', ', iterator_to_array($movie['genres'])); ?>
                <br>Актори: <?php echo implode(', ', iterator_to_array($movie['actors'])); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
