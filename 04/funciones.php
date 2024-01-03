<?php
require_once('BiciElectrica.php');

// Leer el fichero csv y devuelve una tabla de bicicletas
function cargarbicis() {
    $fich = @fopen("Bicis.csv", "r");
    if ($fich == false) {
        die("Error al abrir el fichero");
    }
    $tabla = [];

    while ($valor = fgetcsv($fich)) {
        $bici = new BiciElectrica();
        $bici->id = $valor[0];
        $bici->coordx = $valor[1];
        $bici->coordy = $valor[2];
        $bici->bateria = $valor[3];
        $bici->operativa = $valor[4];
        $tabla[] = $bici;
    }

    return $tabla;
}

// Devuelve una cadena con la tabla html de bicis operativas
function mostrartablabicis($tabla) {
    $cadena = "<table><tr><th>Id</th><th>Coord X</th><th>Coord Y</th><th>Batería</th></tr>";
    foreach ($tabla as $bici) {
        if ($bici->operativa == 1) {
            $cadena .= "<tr>";
            $cadena .= "<td>" . $bici->id . "</td>";
            $cadena .= "<td>" . $bici->coordx . "</td>";
            $cadena .= "<td>" . $bici->coordy . "</td>";
            $cadena .= "<td>" . $bici->bateria . "</td>";
            $cadena .= "</tr>";
        }
    }
    $cadena .= "</table>";

    return $cadena;
}

// Devuelve la bici con menor distancia a las coordenadas de usuario. 
function bicimascercana($coordx, $coordy, $tabla) {
    $biciCerca = null;
    $distanciaMin = PHP_INT_MAX;

    foreach ($tabla as $bici) {
        if ($bici->operativa == 1) {
            $distancia = $bici->distancia($coordx, $coordy);
            if ($distancia < $distanciaMin) {
                $biciCerca = $bici;
                $distanciaMin = $distancia;
            }
        }
    }

    return $biciCerca;
}
