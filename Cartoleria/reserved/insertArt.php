<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Inserimento nuovo articolo</title>
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
    <header>
      <h1>Inserimento articolo</h1>
    </header>
    <main>
      <form action="insertArt.php" method="post">
        <label for="desc">Descrizione </label>
        <input type="text" name="desc" required><br>
        <label for="prezzo">Prezzo (€) </label>
        <input type="number" name="prezzo" min="0" step=".01" required><br>
        <label for="azienda">Produttore</label>
        <select name="azienda">
          <?php
            $server = "127.0.0.1";
            $user = "root";
            $psw = "";
            $db = "Cartoleria";

            $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
            $q = "SELECT DISTINCT idProduttore, denominazione, citta FROM produttore";
            $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
            while ($row = mysqli_fetch_array($res)) {
              echo "<option value='".$row["idProduttore"]."'>".$row["denominazione"].", ".$row["citta"]."</option>";
            }
            mysqli_close($con);
          ?>
        </select><br>
        <input type="submit" value="Inserisci">
      </form>
      <?php
        if ($_POST) {
          $server = "127.0.0.1";
          $user = "root";
          $psw = "";
          $db = "Cartoleria";

          $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
          $q = "INSERT INTO articoli VALUES(null, '".$_POST["desc"]."', ".$_POST["prezzo"].", ".$_POST["azienda"].")";
          $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
          if ($res == false) {
            echo "<p>Errore nell'inserimento dell'articolo.</p>";
          } else {
            echo "<p>Articolo inserito correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
