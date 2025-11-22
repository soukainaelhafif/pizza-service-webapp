<?php
$title = "Bestellbestätigung";
require_once("head.php");
?>

<main>
  <h2>Bestellbestätigung</h2>

  <?php 
    $name = $_POST['name'] ?? '';
    $pizzas = $_POST['pizza'] ?? [];

    if (!is_array($pizzas)) {
        $pizzas = [$pizzas];
    }
  ?>

  <?php if (!empty($name) && !empty($pizzas)): ?>
      <section>
        <h3>Bestellung</h3>
        <p>Danke, <?php echo htmlspecialchars($name); ?></p>
        <ul>
          <?php foreach ($pizzas as $pizza): ?>
            <li><?php echo htmlspecialchars($pizza); ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
  <?php endif; ?>

  <?php if (!empty($_POST['pizza_status'])): ?>
      <section>
        <h3>Bäcker</h3>
        <p>Status: <?php echo htmlspecialchars($_POST['pizza_status']); ?></p>
      </section>
  <?php endif; ?>

  <?php if (!empty($_POST['delivery_status'])): ?>
      <section>
        <h3>Fahrer</h3>
        <p>Status: <?php echo htmlspecialchars($_POST['delivery_status']); ?></p>
      </section>
  <?php endif; ?>

  <?php if (empty($name) && empty($_POST['pizza_status']) && empty($_POST['delivery_status'])): ?>
      <p>Es wurden keine Bestelldaten übermittelt.</p>
  <?php endif; ?>
</main>

<?php require_once("footer.php"); ?>
