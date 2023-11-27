<?php

session_start();

if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
}

if (!isset($_SESSION['cliente'])) {
    require_once('bienvenida.php');
    exit();
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'Anotar') {
        $fruta = $_POST['fruta'];
        $cantidad = $_POST['cantidad'];

        if ($cantidad > 0) {
            if (isset($_SESSION['pedidos'][$fruta])) {
                $_SESSION['pedidos'][$fruta] += $cantidad;
            } else {
                $_SESSION['pedidos'][$fruta] = $cantidad;
            }
        }
    }

    if ($_POST['accion'] == 'Anular') {
        unset($_SESSION['pedidos'][$_POST['fruta']]);
    }

    if ($_POST['accion'] == 'Terminar') {
        $compraRealizada = tablaPedidos();
        require_once("despedida.php");
        session_destroy();
        exit();
    }
}

$compraRealizada = tablaPedidos();
require_once('compra.php');



function tablaPedidos() {
    $msg = "";

    if (count($_SESSION['pedidos']) > 0) {
        $msg = "<p>Este es su pedido:</p>";
        $msg .= "<table style='border: 1px solid black;'>";

        foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
            $msg .= "<tr>";
            $msg .= "<td><b>" . $fruta . "</b></td>";
            $msg .= "<td>" . $cantidad . "</td>";
            $msg .= "</tr>";
        }

        $msg .= "</table";
    }

    return $msg;
}
