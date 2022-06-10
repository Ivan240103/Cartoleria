<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Inserimento nuovo utente</title>
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
      <h1>Inserimento utente</h1>
    </header>
    <main>
      <form action="insertUser.php" method="post">
        <label for="u">Username </label>
        <input type="text" name="u" required><br>
        <label for="p">Password </label>
        <input type="text" name="p" required><br>
        <input type="submit" value="Inserisci">
      </form>
      <?php
        if ($_POST) {
          $server = "127.0.0.1";
          $user = "root";
          $psw = "";
          $db = "Cartoleria";

          $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
          $q = "INSERT INTO autorizzati VALUES(null, '".$_POST["u"]."', '".$_POST["p"]."')";
          $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
          if ($res == false) {
            echo "<p>Errore nell'inserimento dell'utente.</p>";
          } else {
            echo "<p>Utente inserito correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
