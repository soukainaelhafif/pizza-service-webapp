<?php
$title = "Bäcker";
require_once("head.php");
?>

<main>
  <section>
  <h2>Bäcker – Pizza Status bearbeiten</h2>

  <form action="https://echo.hofmann-thomas.de/" method="post">

    <table>
        <tr>
          <th>Pizza</th>
          <th>bestellt</th>
          <th>im Ofen</th>
          <th>fertig</th>
        </tr>
        <tr>
          <td>Salami</td>
          <td><input type="radio" name="status_1" value="bestellt"></td>
          <td><input type="radio" name="status_1" value="im Ofen"></td>
          <td><input type="radio" name="status_1" value="fertig"></td>
        </tr>
        <tr>
          <td>Margherita</td>
          <td><input type="radio" name="status_2" value="bestellt"></td>
          <td><input type="radio" name="status_2" value="im Ofen"></td>
          <td><input type="radio" name="status_2" value="fertig"></td>
        </tr>
        <tr>
          <td>Hawaii</td>
          <td><input type="radio" name="status_3" value="bestellt"></td>
          <td><input type="radio" name="status_3" value="im Ofen"></td>
          <td><input type="radio" name="status_3" value="fertig"></td>
        </tr>
      </table>
    <br>
    <input type="submit" value="Daten abrufen">
  </form>
  </section>
</main>

<?php 
require_once("footer.php"); 
?>