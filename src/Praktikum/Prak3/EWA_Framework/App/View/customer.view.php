<?php
$title = 'Status meiner Bestellungen';
require __DIR__ . '/partials/head.php';
?>

<section class="page-card">
    <h2 class="page-title">Status meiner Bestellungen</h2>

    <?php if (empty($data)): ?>
        <p>Sie haben noch keine Bestellung in dieser Session aufgegeben.</p>
    <?php else: ?>
        <table class="status-table">
            <thead>
                <tr>
                    <th>Best-ID</th>
                    <th>Pizzen</th>
                    <th>Anzahl</th>
                    <th>Gesamtpreis</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $row): ?>
                <?php
                    $orderingId  = htmlspecialchars($row['ordering_id']   ?? '', ENT_QUOTES, 'UTF-8');
                    $pizzas      = htmlspecialchars($row['pizzas']        ?? '', ENT_QUOTES, 'UTF-8');
                    $amount      = htmlspecialchars($row['amount']        ?? '', ENT_QUOTES, 'UTF-8');
                    $total       = $row['total_price'] ?? 0;
                    $totalStr    = htmlspecialchars(number_format((float)$total, 2, ',', '.') . ' €', ENT_QUOTES, 'UTF-8');

                    // Einfaches Status-Mapping (anpassen falls du andere Werte nutzt)
                    $minStatus   = (int)($row['min_status'] ?? 0);
                    $maxStatus   = (int)($row['max_status'] ?? 0);

                    if ($minStatus === 1 && $maxStatus === 1) {
                        $statusText = 'Bestellt';
                    } elseif ($minStatus === 2 && $maxStatus === 2) {
                        $statusText = 'Im Ofen';
                    } elseif ($minStatus === 3 && $maxStatus === 3) {
                        $statusText = 'Fertig';
                    } else {
                        $statusText = 'Gemischt';
                    }
                    $statusText = htmlspecialchars($statusText, ENT_QUOTES, 'UTF-8');
                ?>
                <tr>
                    <td><?= $orderingId ?></td>
                    <td><?= $pizzas ?></td>
                    <td><?= $amount ?></td>
                    <td><?= $totalStr ?></td>
                    <td><?= $statusText ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
