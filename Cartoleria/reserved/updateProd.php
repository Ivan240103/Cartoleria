<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Aggiornamento produttore</title>
    <link rel="icon" href="../images/books.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      p {
        padding-top: 30px;
      }
      select {
        font-size: 80%;
      }
    </style>
  </head>
  <body>
    <?php
      if ($_POST) {
        $server = "127.0.0.1";
        $user = "root";
        $psw = "";
        $db = "Cartoleria";

        $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
        $q = "UPDATE produttore SET citta = '".$_POST["citta"]."' WHERE idProduttore = '".$_POST["prod"]."'";
        $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
      }
    ?>
    <header>
      <h1>Aggiornamento produttore</h1>
    </header>
    <main>
      <form action="updateProd.php" method="post">
        <label for="prod">Produttore da aggiornare </label>
        <select name="prod">
          <?php
            $server = "127.0.0.1";
            $user = "root";
            $psw = "";
            $db = "Cartoleria";

            $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
            $q = "SELECT idProduttore, denominazione FROM produttore";
            $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
            while ($row = mysqli_fetch_array($res)) {
              echo "<option value='".$row["idProduttore"]."'>".$row["denominazione"]."</option>";
            }
            mysqli_close($con);
          ?>
        </select><br>
        <label for="citta">Nuova città </label>
        <input type="text" name="citta" required>
        <input type="submit" value="Aggiorna">
      </form>
      <?php
        //scrive l'esito della query
        if ($_POST) {
          if ($res == false) {
            echo "<p>Errore nell'aggiornamento del produttore.</p>";
          } else {
            echo "<p>Produttore aggiornato correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
