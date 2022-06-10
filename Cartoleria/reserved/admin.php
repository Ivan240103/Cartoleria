<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="author" content="Ivan De Simone">
    <meta charset="utf-8">
    <title>Area riservata</title>
    <link rel="icon" href="../images/books.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      div.options {
        width: 250px;
        margin: 40px auto 0;
        text-align: left;
      }
      h3 {
        margin: 0;
      }
      ul {
        margin: 0 auto 40px;
      }
      li {
        margin-top: 10px;
      }
    </style>
    <?php
      function access($u, $p) {
        $con = mysqli_connect("127.0.0.1", "root", "", "Cartoleria") or die(mysqli_connect_error());
        $q = "SELECT username, password FROM autorizzati";
        $res = mysqli_query($con, $q) or die("Errore in fase di esecuzione della query");
        $tr = false;
        while ($row = mysqli_fetch_array($res)) {
          if ($u == $row["username"] && $p == $row["password"]) {
            $tr = true;
            break;
          }
        }
        mysqli_close($con);
        return $tr;
      }
    ?>
  </head>
  <body>
    <?php
      if (access($_POST["user"], $_POST["psw"])) {
    ?>
    <header>
      <h1>Area riservata</h1>
    </header>
    <main>
      <p>
        <?php
          echo "Benvenuto ".$_POST["user"]."! Ecco ciò che puoi fare:";
        ?>
      </p>
      <div class="options">
        <h3>Articolo</h3>
        <ul>
          <li><a href="updateArt.php">Aggiorna prezzo</a></li>
          <li><a href="deleteArt.php">Elimina</a></li>
          <li><a href="insertArt.php">Inserisci</a></li>
        </ul>
        <h3>Produttore</h3>
        <ul>
          <li><a href="updateProd.php">Aggiorna dati</a></li>
          <li><a href="deleteProd.php">Elimina</a></li>
          <li><a href="insertProd.php">Inserisci</a></li>
        </ul>
        <?php
          if ($_POST["user"] == "root") {
        ?>
        <h3>Utente</h3>
        <ul>
          <li><a href="insertUser.php">Inserisci</a></li>
          <li><a href="deleteUser.php">Elimina</a></li>
          <li><a href="updateUser.php">Modifica password</a></li>
        </ul>
        <?php
          }
        ?>
      </div>
      <p><a href='../index.html'>Logout e torna alla home page</a></p>
    </main>
    <?php
      } else {
        echo "<header><h1>Accesso non autorizzato</h1></header>";
        echo "<p><a href='../index.html'>Torna alla home page</a></p>";
      }
    ?>
  </body>
</html>
