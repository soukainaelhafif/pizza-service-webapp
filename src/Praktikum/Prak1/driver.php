<?php
$title = "Fahrer";
require_once("head.php");
?>
<main>
  <h2>Fahrer – Lieferstatus melden</h2>

  <form action="echo.php" method="post">

    <p>Lieferstatus auswählen:</p>

    <label>
      <input type="radio" name="delivery_status" value="unterwegs" required>
      Unterwegs
    </label><br>

    <label>
      <input type="radio" name="delivery_status" value="zugestellt">
      Zugestellt
    </label><br>

    <label>
      <input type="radio" name="delivery_status" value="nicht angetroffen">
      Nicht angetroffen
    </label><br><br>
    <input type="submit" value="Lieferung starten">
  </form>
</main>
<?php require_once("footer.php"); ?>


