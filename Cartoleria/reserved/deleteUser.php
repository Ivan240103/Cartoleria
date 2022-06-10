<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Eliminazione utente</title>
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
      //esegue la query di eliminazione prima della stampa del form
      if ($_POST) {
        $server = "127.0.0.1";
        $user = "root";
        $psw = "";
        $db = "Cartoleria";

        $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
        $q = "DELETE FROM autorizzati WHERE idUtente = ".$_POST["u"];
        $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
      }
    ?>
    <header>
      <h1>Eliminazione utente</h1>
    </header>
    <main>
      <form action="deleteUser.php" method="post">
        <label for="u">Utente da eliminare </label>
        <select name="u">
          <?php
            $server = "127.0.0.1";
            $user = "root";
            $psw = "";
            $db = "Cartoleria";

            $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
            $q = "SELECT idUtente, username, password FROM autorizzati WHERE username != 'root'";
            $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
            while ($row = mysqli_fetch_array($res)) {
              echo "<option value='".$row["idUtente"]."'>".$row["username"].", "
                .$row["password"]."</option>";
            }
            mysqli_close($con);
          ?>
        </select>
        <input type="submit" value="Elimina">
      </form>
      <?php
        //scrive l'esito della query
        if ($_POST) {
          if ($res == false) {
            echo "<p>Errore nell'eliminazione dell'utente.</p>";
          } else {
            echo "<p>Utente eliminato correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
