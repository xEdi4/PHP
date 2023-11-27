<?php

$dados = [
    1 => "&#9856;",
    2 => "&#9857;",
    3 => "&#9858;",
    4 => "&#9859;",
    5 => "&#9860;",
    6 => "&#9861;"
];


function obtenerDados($dados) {
    $indiceDados = [];
    for ($i = 1; $i <= 5; $i++) {
        $indiceDados[] = array_rand($dados);
    }
    return $indiceDados;
}
$TiradasJugador1 = obtenerDados($dados);
$TiradasJugador2 = obtenerDados($dados);

function puntuacionDadosJugador1($TiradasJugador1) {
    $indiceMaxValor = array_search(max($TiradasJugador1), $TiradasJugador1);
    $indiceMinValor = array_search(min($TiradasJugador1), $TiradasJugador1);

    unset($TiradasJugador1[$indiceMaxValor], $TiradasJugador1[$indiceMinValor]);

    $puntos1 = 0;
    foreach ($TiradasJugador1 as $valorDado) {
        $puntos1 += $valorDado;
    }
    return $puntos1;
}
$PuntuacionJugador1 = puntuacionDadosJugador1($TiradasJugador1);

function puntuacionDadosJugador2($TiradasJugador2) {
    $indiceMaxValor = array_search(max($TiradasJugador2), $TiradasJugador2);
    $indiceMinValor = array_search(min($TiradasJugador2), $TiradasJugador2);

    unset($TiradasJugador2[$indiceMaxValor], $TiradasJugador2[$indiceMinValor]);

    $puntos2 = 0;
    foreach ($TiradasJugador2 as $valorDado) {
        $puntos2 += $valorDado;
    }
    return $puntos2;
}
$PuntuacionJugador2 = puntuacionDadosJugador2($TiradasJugador2);

function ganador($PuntuacionJugador1, $PuntuacionJugador2) {
    if ($PuntuacionJugador1 > $PuntuacionJugador2) {
        return "Ha ganado el Jugador 1";
    } elseif ($PuntuacionJugador2 > $PuntuacionJugador1) {
        return "Ha ganado el Jugador 2";
    } else {
        return "Empate";
    }
}
$Ganador = ganador($PuntuacionJugador1, $PuntuacionJugador2);

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Cinco Dados</title>

    <style>
        table {
            transform: translateX(-50%);
            margin-left: 50%;
        }

        td {
            padding-left: 10px;
            padding-right: 10px;
        }

        .texto {
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 18px;
        }

        .dadosJugador1 {
            background-color: red;
            font-size: 2cm;
        }

        .dadosJugador2 {
            background-color: blue;
            font-size: 2cm;
        }

        .resultado {
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 18px;
            padding-top: 70px;
            text-align: center;
        }
    </style>

</head>

<body>

    <table>

        <tr>
            <td class="texto">Jugador 1</td>
            <td class="dadosJugador1">
                <?php
                foreach ($TiradasJugador1 as $dado) {
                    echo $dados[$dado];
                }
                ?>
            </td>
            <td class="texto"><?= $PuntuacionJugador1 ?> puntos</td>
        </tr>

        <tr>
            <td class="texto">Jugador 2</td>
            <td class="dadosJugador2">
                <?php
                foreach ($TiradasJugador2 as $dado) {
                    echo $dados[$dado];
                }
                ?>
            </td>
            <td class="texto"><?= $PuntuacionJugador2 ?> puntos</td>
        </tr>

    </table>

    <div class="resultado">
        <?= $Ganador ?>
    </div>

</body>

</html>