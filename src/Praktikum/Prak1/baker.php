<?php
$title = "Bäcker";
require_once("head.php");
?>
<main>
  <h2>Bäcker – Pizza Status bearbeiten</h2>

  <form action="echo.php" method="post">

    <p>Pizza Status wählen:</p>

    <label>
      <input type="radio" name="pizza_status" value="im Ofen" required>
      Im Ofen
    </label><br>

    <label>
      <input type="radio" name="pizza_status" value="fertig">
      Fertig
    </label><br>

    <label>
      <input type="radio" name="pizza_status" value="verbrannt">
      Verbrannt
    </label><br><br>
    <input type="submit" value="Daten abrufen">
  </form>
</main>
<?php require_once("footer.php"); ?>