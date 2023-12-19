<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <style>
        .tweet {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 8px;
        }
        .tweet p {
            margin: 0;
        }
    </style>
</head>
<body>

<?php

function generarTweetHTML($usuario, $mensaje, $fecha) {
    $html = '<div class="tweet">';
    $html .= '<p><strong>' . $usuario . '</strong></p>';
    $html .= '<p>' . $mensaje . '</p>';
    $html .= '<p><small>' . $fecha . '</small></p>';
    $html .= '</div>';
    return $html;
}

$tweets = [
    ['usuario' => 'Usuario1', 'mensaje' => 'Este es un tweet de ejemplo.', 'fecha' => '2023-01-01 12:34:56'],
    ['usuario' => 'Usuario2', 'mensaje' => 'Otro tweet interesante.', 'fecha' => '2023-01-02 08:45:00'],
    // Agrega más tweets según sea necesario
];

foreach ($tweets as $tweet) {
    echo generarTweetHTML($tweet['usuario'], $tweet['mensaje'], $tweet['fecha']);
}

?>

</body>
</html>