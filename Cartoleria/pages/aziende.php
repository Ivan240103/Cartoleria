<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Ricerca aziende</title>
    <link rel="icon" href="../images/books.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      table {
        border: 1px solid black;
        border-collapse: collapse;
        margin: 50px auto 30px;
      }
      td, th {
        border: 1px solid black;
        padding: 10px 20px;;
      }
      p {
        padding-top: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Ricerca aziende bolognesi</h1>
    </header>
    <main>
      <form action="aziende.php" method="post">
        <label for="min">Prezzo minimo </label>
        <input type="number" name="min" min="0" step=".01" required>
        <label for="max">Prezzo massimo </label>
        <input type="number" name="max" min="0" step=".01" required>
        <input type="submit" value="Cerca">
      </form>
      <?php
        if ($_POST) {
          if ($_POST["min"] > $_POST["max"]) {
            $tmp = $_POST["min"];
            $_POST["min"] = $_POST["max"];
            $_POST["max"] = $tmp;
          }
          $server = "127.0.0.1";
          $user = "root";
          $psw = "";
          $db = "Cartoleria";

          $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
          $q = "SELECT DISTINCT denominazione FROM articoli AS a, produttore AS p ";
          $q .= "WHERE a.idProduttore = p.idProduttore AND citta='Bologna' AND prezzo BETWEEN ".$_POST["min"]." AND ".$_POST["max"];
          $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
          echo "<table><thead><tr><th>Produttore</th></tr></thead><tbody>";
          while ($row = mysqli_fetch_array($res)) {
            echo "<tr><td>".$row["denominazione"]."</td></tr>";
          }
          echo "</tbody></table>";
          mysqli_close($con);
        }
      ?>
      <p><a href="../index.html">Torna alla home page</a></p>
    </main>
  </body>
</html>
