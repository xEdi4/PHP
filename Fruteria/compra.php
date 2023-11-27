<html>

<head>
  <meta charset="UTF-8">
  <title>LA FRUTERIA</title>
</head>

<body>
  <h1>La Frutería del siglo XXI</h1>
  <?= $compraRealizada ?>
  <br><br><b>REALICE SU COMPRA <?= $_SESSION['cliente'] ?></b><br>

  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <b>Selecciona la fruta:
      <select name="fruta">
        <option value="Platanos">Platanos</option>
        <option value="Naranjas">Naranjas</option>
        <option value="Limones">Limones</option>
        <option value="Manzanas">Manzanas</option>
      </select>

      Cantidad: <input name="cantidad" type="number" value=0 min=0 max=10 size=4>

      <input type="submit" name="accion" value="Anotar">
      <input type="submit" name="accion" value="Anular">
      <input type="submit" name="accion" value="Terminar">
  </form>

</body>

</html>