<?php
$title = "Fahrer";
require_once("head.php");
?>
<main>
  <section>
  <h2>Fahrer – Lieferstatus melden</h2>

  <form action="https://echo.hofmann-thomas.de/" method="post">

    <p>Lieferstatus auswählen:</p>

    <table>

        <tr>
          <th>Bestellung</th>
          <th>fertig</th>
          <th>unterwegs</th>
          <th>geliefert</th>
        </tr>
        <tr>
          <td>Schulz, Hauptstr. 5 – Salami, Hawaii (20,00€)</td>
          <td><input type="radio" name="lieferung_1" value="fertig"></td>
          <td><input type="radio" name="lieferung_1" value="unterwegs"></td>
          <td><input type="radio" name="lieferung_1" value="geliefert"></td>
        </tr>
        <tr>
          <td>Müller, Rheinstr. 11 – Margherita (8,50€)</td>
          <td><input type="radio" name="lieferung_2" value="fertig"></td>
          <td><input type="radio" name="lieferung_2" value="unterwegs"></td>
          <td><input type="radio" name="lieferung_2" value="geliefert"></td>
        </tr>

    </table>
    
    <input type="submit" value="Lieferung starten">
  </form>
</section>
</main>
<?php require_once("footer.php"); ?>


