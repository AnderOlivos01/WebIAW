<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Scrapping</title>
</head>
<body>
    <form action="" method="post">
        <p>Introduce una url</p>
        <input type="text" name="url">
        <button type="submit">Buscar correos</button>
    </form>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $url = $_POST['url'];
        $html = file_get_contents($url);

        $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
        preg_match_all($pattern, $html, $matches);

        echo '<h3>Correos electrónicos encontrados:</h2>';
        echo '<ul>';
        foreach ($matches[0] as $email) {
            echo '<li>' . $email . '</li>';
        }
        echo '</ul>';
    }
?>