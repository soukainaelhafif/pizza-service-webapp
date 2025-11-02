<?php
$title = "Bestellbestätigung";
require_once("head.php");
?>

<main>
  <h2>Bestellbestätigung</h2>
  <?php if (!empty($_POST['name']) && !empty($_POST['pizza'])): ?>
      <p>Danke, <?php echo htmlspecialchars($_POST['name']); ?>!</p>
      <p>Du hast eine <strong><?php echo htmlspecialchars($_POST['pizza']); ?></strong> bestellt.</p>
  <?php else: ?>
      <p>Es wurden keine Bestelldaten übermittelt.</p>
  <?php endif; ?>
</main>

<?php require_once("footer.php"); ?>