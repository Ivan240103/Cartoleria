<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Ricerca articoli</title>
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
        padding: 10px 30px;
      }
      p {
        padding-top: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Ricerca prodotto</h1>
    </header>
    <main>
      <form action="ricerca.php" method="post">
        <label for="name">Prodotto</label>
        <input type="text" name="name" required>
        <input type="submit" value="Cerca">
      </form>
      <?php
        if($_POST) {
          $server = "127.0.0.1";
          $user = "root";
          $psw = "";
          $db = "Cartoleria";

          $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
          $q = "SELECT descrizione, prezzo, denominazione, citta FROM articoli AS a, produttore AS p ";
          $q .= "WHERE a.idProduttore = p.idProduttore AND descrizione LIKE '%".$_POST["name"]."%'";
          $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
          echo "<table><thead><tr><th>Articolo</th><th>Prezzo</th><th>Produttore</th>
          <th>Città</th></tr></thead><tbody>";
          while ($row = mysqli_fetch_array($res)) {
            echo "<tr><td>".$row["descrizione"]."</td><td>".$row["prezzo"]." €</td>
            <td>".$row["denominazione"]."</td><td>".$row["citta"]."</td></tr>";
          }
          echo "</tbody></table>";
          mysqli_close($con);
        }
      ?>
      <p><a href="../index.html">Torna alla home page</a></p>
    </main>
  </body>
</html>
