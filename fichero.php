<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDirectory = 'imgusers/';

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $errorMessages = array();

    foreach ($_FILES['images']['name'] as $key => $name) {
        $fileSize = $_FILES['images']['size'][$key];
        $fileType = $_FILES['images']['type'][$key];

        if ($fileSize > 200000) {
            $errorMessages[] = "El archivo '$name' es demasiado grande (máx. 200 KB).";
            continue;
        }

        $allowedTypes = array('image/jpeg', 'image/png');
        if (!in_array($fileType, $allowedTypes)) {
            $errorMessages[] = "El archivo '$name' no es una imagen JPG o PNG.";
            continue;
        }

        move_uploaded_file($_FILES['images']['tmp_name'][$key], $uploadDirectory . $name);
    }

    if (!empty($errorMessages)) {
        foreach ($errorMessages as $errorMessage) {
            echo $errorMessage . '<br>';
        }
    } else {
        echo "Archivos subidos con éxito.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Subir Imágenes</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" accept=".jpg, .jpeg, .png" multiple>
        <input type="submit" value="Subir Imágenes">
    </form>
</body>

</html>