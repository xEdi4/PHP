<?php

function validarArchivos($archivos, $nombre_Destino) {
    $total_size = 0;
    $errors = [];

    foreach ($archivos['name'] as $key => $name) {
        $size = $archivos['size'][$key];
        $total_size += $size;

        $type = $archivos['type'][$key];
        $allowed_types = ['image/jpeg', 'image/png'];

        if ($archivos['error'][$key] == UPLOAD_ERR_FORM_SIZE) {
            $errors[] = "El tamaño del archivo '$name' supera 200 Kbytes.";
            continue;
        }

        if (!in_array($type, $allowed_types)) {
            $errors[] = "Fichero con formato no válido.";
            continue;
        }

        if (file_exists($nombre_Destino . $name)) {
            $errors[] = "El archivo '$name' ya existe en el directorio.";
            continue;
        }
    }

    if ($total_size > 300000) {
        $errors[] = "El tamaño de todos los ficheros superan 300 Kbytes.";
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_Destino = 'C:\xampp\htdocs\EJERCICIOSPHP\SubirFicheros\imgusers\\'; //cambiar ruta de destino

    if (!empty($_FILES['archivos']['name'][0])) {
        $errores = validarArchivos($_FILES['archivos'], $nombre_Destino);

        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo $error . "<br>";
            }
        } else {
            $archivos_en_directorio = glob($nombre_Destino . '*');
            $tamaño_total_directorio = array_sum(array_map('filesize', $archivos_en_directorio));
            $total_archivos_a_subir = array_sum($_FILES['archivos']['size']);

            if (($tamaño_total_directorio + $total_archivos_a_subir) > 300000) {
                echo "No se pueden subir los ficheros. El tamaño de 'imgusers' 300 Kbytes.";
            } else {
                foreach ($_FILES['archivos']['tmp_name'] as $key => $nombre_temporal) {
                    $nombre_archivo = $_FILES['archivos']['name'][$key];
                    move_uploaded_file($nombre_temporal, $nombre_Destino . $nombre_archivo);
                }
                echo "Archivo/s subidos exitosamente.";
            }
        }
    } else {
        echo "Por favor, seleccione al menos un archivo.";
    }
}
