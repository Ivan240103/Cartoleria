<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Inserimento nuovo produttore</title>
    <link rel="icon" href="../images/books.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      p {
        padding-top: 30px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Inserimento produttore</h1>
    </header>
    <main>
      <form action="insertProd.php" method="post">
        <label for="den">Denominazione </label>
        <input type="text" name="den" required><br>
        <label for="citta">Città </label>
        <input type="text" name="citta" required><br>
        <input type="submit" value="Inserisci">
      </form>
      <?php
        if ($_POST) {
          $server = "127.0.0.1";
          $user = "root";
          $psw = "";
          $db = "Cartoleria";

          $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
          $q = "INSERT INTO produttore VALUES(null, '".$_POST["den"]."', '".$_POST["citta"]."')";
          $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
          if ($res == false) {
            echo "<p>Errore nell'inserimento del produttore.</p>";
          } else {
            echo "<p>Produttore inserito correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
