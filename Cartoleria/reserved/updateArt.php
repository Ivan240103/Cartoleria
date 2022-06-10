<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Aggiornamento articolo</title>
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
        $q = "UPDATE articoli SET prezzo = ".$_POST["prezzo"]." WHERE idArticolo = ".$_POST["art"];
        $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
      }
    ?>
    <header>
      <h1>Aggiornamento prezzo articolo</h1>
    </header>
    <main>
      <form action="updateArt.php" method="post">
        <label for="art">Articolo da aggiornare </label>
        <select name="art">
          <?php
            $server = "127.0.0.1";
            $user = "root";
            $psw = "";
            $db = "Cartoleria";

            $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
            $q = "SELECT idArticolo, descrizione, prezzo, denominazione";
            $q .= " FROM articoli AS a, produttore AS p WHERE a.idProduttore = p.idProduttore";
            $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
            while ($row = mysqli_fetch_array($res)) {
              echo "<option value='".$row["idArticolo"]."'>".$row["descrizione"].", "
                .$row["prezzo"]." €  -  ".$row["denominazione"]."</option>";
            }
            mysqli_close($con);
          ?>
        </select><br>
        <label for="prezzo">Nuovo prezzo</label>
        <input type="number" name="prezzo" min="0" step=".01" required>
        <input type="submit" value="Aggiorna">
      </form>
      <?php
        //scrive l'esito della query
        if ($_POST) {
          if ($res == false) {
            echo "<p>Errore nell'aggiornamento dell'articolo.</p>";
          } else {
            echo "<p>Articolo aggiornato correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
