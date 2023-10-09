<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, papel, tijera</title>

    <style>
        .container {
            text-align: center;
            font-family: 'Cursive', sans-serif;
        }

        .emoji {
            font-size: 60px;
            display: inline-block;
            margin-right: 20px;
        }

        .resultado {
            margin-top: 70px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php

    define('PIEDRA1', "&#x1F91C;");
    define('PIEDRA2', "&#x1F91B;");
    define('TIJERAS', "&#x1F596;");
    define('PAPEL', "&#x1F91A;");

    function obtenerEleccionAleatoria1()
    {
        $opciones1 = [PIEDRA1, TIJERAS, PAPEL];
        $indice1 = rand(0, 2);
        return $opciones1[$indice1];
    }

    function obtenerEleccionAleatoria2()
    {
        $opciones2 = [PIEDRA2, TIJERAS, PAPEL];
        $indice2 = rand(0, 2);
        return $opciones2[$indice2];
    }

    $eleccionJugador1 = obtenerEleccionAleatoria1();
    $eleccionJugador2 = obtenerEleccionAleatoria2();

    function determinarResultado($eleccionJugador1, $eleccionJugador2)
    {
        if ($eleccionJugador1 == $eleccionJugador2 || $eleccionJugador1 == PIEDRA1 && $eleccionJugador2 == PIEDRA2) {
            return "Empate";
        } elseif (
            ($eleccionJugador1 == PIEDRA1 && $eleccionJugador2 == TIJERAS) ||
            ($eleccionJugador1 == PIEDRA2 && $eleccionJugador2 == TIJERAS) ||
            ($eleccionJugador1 == TIJERAS && $eleccionJugador2 == PAPEL) ||
            ($eleccionJugador1 == PAPEL && $eleccionJugador2 == PIEDRA1) ||
            ($eleccionJugador1 == PAPEL && $eleccionJugador2 == PIEDRA2)
        ) {
            return "Ha ganado el jugador 1";
        } else {
            return "Ha ganado el jugador 2";
        }
    }

    $resultado = determinarResultado($eleccionJugador1, $eleccionJugador2);

    ?>

    <div class='container'>
        <h1>Piedra, papel, tijera</h1>
        <div>Jugador 1 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Jugador 2</div>
        <div class='emoji'><?= $eleccionJugador1 ?></div>
        <div class='emoji'><?= $eleccionJugador2 ?></div>
        <div class='resultado'><?= $resultado ?></div>
    </div>


</body>

</html>