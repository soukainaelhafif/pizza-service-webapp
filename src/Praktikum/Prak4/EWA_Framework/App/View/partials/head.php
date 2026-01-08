<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($title ?? 'Pizza Service') ?></title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="EWA_Framework/assets/css/style.css">
    <script src="EWA_Framework/assets/js/script.js" defer></script>
    
    </head>
    <body>
    <?php
    $current = basename($_SERVER['PHP_SELF']); // z.B. index.php
    function navActive(string $file, string $current): string {
        return $file === $current ? 'is-active' : '';
    }
    ?>
    <header class="topbar">
        <div class="topbar__inner">
            <a class="brand" href="overview.php">
                <span class="brand__logo">🍕</span>
                <span class="brand__text">Pizza Service</span>
            </a>

            <nav class="nav">
                <a class="nav__link <?= navActive('overview.php', $current) ?>" href="overview.php">Übersicht</a>
                <a class="nav__link <?= navActive('index.php', $current) ?>" href="index.php">Bestellen</a>
                <a class="nav__link <?= navActive('customer.php', $current) ?>" href="customer.php">Kunde</a>
                <a class="nav__link <?= navActive('baker.php', $current) ?>" href="baker.php">Bäcker</a>
                <a class="nav__link <?= navActive('driver.php', $current) ?>" href="driver.php">Fahrer</a>
            </nav>
        </div>
    </header>

    <main class="container">
