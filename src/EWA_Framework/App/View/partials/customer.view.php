<h2>Status meiner Bestellungen</h2>

<table>
    <thead>
        <tr>
            <th>Best.-ID</th>
            <th>Pizza</th>
            <th>Preis</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (empty($data)) {
            echo '<tr><td colspan="4">Keine Bestellungen vorhanden.</td></tr>';
        } else {
            foreach ($data as $order) {
                $statusText = match ($order['status']) {
                    '1' => 'Bestellt',
                    '2' => 'Im Ofen',
                    '3' => 'Fertig/Wartet auf Fahrer',
                    '4' => 'Unterwegs',
                    '5' => 'Ausgeliefert',
                    default => 'Unbekannt'
                };
                
                echo '<tr>';
                echo '<td>' . htmlspecialchars($order['ordering_id']) . '</td>';
                echo '<td>' . htmlspecialchars($order['pizza_name']) . '</td>';
                echo '<td>' . htmlspecialchars(number_format($order['price'], 2, ',', '.')) . ' €</td>';
                echo '<td>' . $statusText . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>