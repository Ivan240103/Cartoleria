<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Aggiornamento utente</title>
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
        $q = "UPDATE autorizzati SET password = '".$_POST["psw"]."' WHERE idUtente = ".$_POST["id"];
        $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
      }
    ?>
    <header>
      <h1>Aggiornamento password utente</h1>
    </header>
    <main>
      <form action="updateUser.php" method="post">
        <label for="id">Utente da aggiornare </label>
        <select name="id">
          <?php
            $server = "127.0.0.1";
            $user = "root";
            $psw = "";
            $db = "Cartoleria";

            $con = mysqli_connect($server, $user, $psw, $db) or die(mysqli_connect_error());
            $q = "SELECT idUtente, username FROM autorizzati";
            $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
            while ($row = mysqli_fetch_array($res)) {
              echo "<option value='".$row["idUtente"]."'>".$row["username"]."</option>";
            }
            mysqli_close($con);
          ?>
        </select><br>
        <label for="psw">Nuova password </label>
        <input type="text" name="psw" required>
        <input type="submit" value="Aggiorna">
      </form>
      <?php
        //scrive l'esito della query
        if ($_POST) {
          if ($res == false) {
            echo "<p>Errore nell'aggiornamento dell'utente.</p>";
          } else {
            echo "<p>Utente aggiornato correttamente.</p>";
          }
          mysqli_close($con);
        }
      ?>
    </main>
  </body>
</html>
