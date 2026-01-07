<?php
$title = "Übersicht";

require_once __DIR__ . "/head.php";
?>
<main>
  <section>
  <h2>Willkommen beim Pizzaservice 🍕</h2>
  <p>Wählen Sie eine Seite:</p>
  <ul>
    <li><a href="order.php">Bestellung</a></li>
    <li><a href="baker.php">Bäcker</a></li>
    <li><a href="driver.php">Fahrer</a></li>
    <li><a href="customer.php">Kunde</a></li>
  </ul>
</section>
</main>
<?php
require_once __DIR__ . "/footer.php";
?>