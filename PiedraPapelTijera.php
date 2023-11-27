<?php

define('PIEDRA1',  "&#x1F91C;");
define('PIEDRA2',  "&#x1F91B;");
define('TIJERAS',  "&#x1F596;");
define('PAPEL',    "&#x1F91A;");

function eleccionJugador1() {
    $posibilidades_Jugador1 = [PIEDRA1, TIJERAS, PAPEL];
    $indiceAleatorio1 = array_rand($posibilidades_Jugador1);
    return $posibilidades_Jugador1[$indiceAleatorio1];
}

function eleccionJugador2() {
    $posibilidades_Jugador2 = [PIEDRA2, TIJERAS, PAPEL];
    $indiceAleatorio2 = array_rand($posibilidades_Jugador2);
    return $posibilidades_Jugador2[$indiceAleatorio2];
}

function ganador($jugador1, $jugador2) {

    if ($jugador1 == $jugador2 || $jugador1 == PIEDRA1 && $jugador2 == PIEDRA2) {
        return "¡Empate!";
    } elseif (
        ($jugador1 == PIEDRA1 && $jugador2 == TIJERAS) ||
        ($jugador1 == TIJERAS && $jugador2 == PAPEL) ||
        ($jugador1 == PAPEL && $jugador2 == PIEDRA2)
    ) {
        return "Ha ganado el jugador 1";
    } else {
        return "Ha ganado el jugador 2";
    }
}

$jugador1 = eleccionJugador1();
$jugador2 = eleccionJugador2();
$resultado = ganador($jugador1, $jugador2);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Piedra, Papel o Tijera</title>

    <style>
        .container {
            text-align: center;
            font-family: 'Cursive', sans-serif;
            font-size: 20px;
        }

        .jugadores {
            display: inline-block;
            padding-right: 25px;
            padding-left: 20px;
        }

        .emoji {
            display: inline-block;
            padding-right: 50px;
            padding-left: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>¡Piedra, papel, tijera!</h2> <br>
        <div class="jugadores">Jugador 1</div>
        <div class="jugadores">Jugador 2</div> <br><br>
        <div class="emoji"><?= $jugador1 ?></div>
        <div class="emoji"><?= $jugador2 ?></div> <br><br>
        <p><?= $resultado ?></p>
    </div>
</body>

</html>