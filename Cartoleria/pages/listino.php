<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>
      <?php
        if($_GET["ord"] == 'true') {
          echo "Listino ordinato";
        } else {
          echo "Listino";
        }
      ?>
    </title>
    <link rel="icon" href="../images/books.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      table {
        border: 1px solid black;
        border-collapse: collapse;
        margin: 0 auto 30px;
      }
      td, th {
        border: 1px solid black;
        padding: 10px 30px;
      }
      p {
        padding-top: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>
        <?php
          if ($_GET["ord"] == 'true') {
            echo "Listino prezzi ordinato crescente";
          } else {
            echo "Listino prezzi";
          }
        ?>
      </h1>
    </header>
    <main>
      <?php
        $server = "127.0.0.1";
        $user = "root";
        $psw = "";
        $db = "Cartoleria";

        $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
        $q = "SELECT descrizione, prezzo FROM articoli";
        if ($_GET["ord"] == 'true') {
          $q .= " ORDER BY prezzo ASC";
        }
        $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
        echo "<table><thead><tr><th>Articolo</th><th>Prezzo</th></tr></thead><tbody>";
        while ($row = mysqli_fetch_array($res)) {
          echo "<tr><td>".$row["descrizione"]."</td><td>".$row["prezzo"]." €</td></tr>";
        }
        echo "</tbody></table>";
        mysqli_close($con);
      ?>
      <p><a href="../index.html">Torna alla home page</a></p>
    </main>
  </body>
</html>
