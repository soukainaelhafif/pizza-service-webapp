<h2>Fahrer-Ansicht: Auslieferung</h2>

<?php
if (empty($data)) {
    echo '<p>Derzeit keine Bestellungen zur Auslieferung bereit.</p>';
} else {
    foreach ($data as $order) {
        $orderingId = $order['ordering_id'];

        echo '<form action="driver.php" method="post">';
        echo '<fieldset>';
        echo '<legend>Auslieferung #' . htmlspecialchars($orderingId) . 
             ' - Adresse: ' . htmlspecialchars($order['address']) . '</legend>';
        
        echo '<p>Enthält: ' . htmlspecialchars($order['articles']) . '</p>';

        echo '<label><input type="radio" name="status_' . $orderingId . '" value="4" required> Unterwegs</label>';
        echo '<label><input type="radio" name="status_' . $orderingId . '" value="5" required> Ausgeliefert (Zum Löschen)</label>';
        
        echo '<button type="submit">Status aktualisieren</button>';
        echo '</fieldset>';
        echo '</form>';
    }
}
?>