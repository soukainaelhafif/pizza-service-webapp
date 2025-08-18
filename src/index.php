<?php
header('Content-Type: text/html; charset=UTF-8');
$year = date("Y");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EWA Repository</title>
    <meta name="description" content="EWA Serverumgebung: Apache, PHP, MariaDB, phpMyAdmin sowie Ordner für Praktikum, Demos u.v.m.">
    <link rel="stylesheet" href="index.css">
    <script src="logic.js" defer></script>
</head>

<body>
    <main class="main-container">
        <div class="main-wrapper">
            <header>
                <h1>EWA Repository</h1>
                <button class="dark-toggle" id="darkToggleBtn" onclick="toggleDarkMode()" title="Dark Mode umschalten" aria-label="Dark Mode umschalten">
                    <svg id="sun" viewBox="0 0 30 30" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <line id="ray" stroke="currentColor" stroke-width="2" stroke-linecap="round" x1="15" y1="1" x2="15" y2="4" />
                        </defs>
                        <circle cx="15" cy="15" r="6" fill="currentColor" />
                        <use href="#ray" transform="rotate(0 15 15)" />
                        <use href="#ray" transform="rotate(45 15 15)" />
                        <use href="#ray" transform="rotate(90 15 15)" />
                        <use href="#ray" transform="rotate(135 15 15)" />
                        <use href="#ray" transform="rotate(180 15 15)" />
                        <use href="#ray" transform="rotate(225 15 15)" />
                        <use href="#ray" transform="rotate(270 15 15)" />
                        <use href="#ray" transform="rotate(315 15 15)" />
                    </svg>
                    <svg id="moon" viewBox="0 0 30 30" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M 23, 5 A 12 12 0 1 0 23, 25 A 12 12 0 0 1 23, 5" />
                    </svg>
                </button>
            </header>
            <hr>
            <p>
                Diese Serverumgebung basiert auf
                <a href="https://httpd.apache.org/" target="_blank">Apache</a>
                und stellt Ihnen unter anderem
                <a href="https://www.php.net/" target="_blank">PHP</a>,
                <a href="https://mariadb.org/" target="_blank">MariaDB</a>
                und
                <a href="https://www.phpmyadmin.net/" target="_blank">phpMyAdmin</a>
                zur Verfügung.
            </p>
            <p>Die folgenden Ordner helfen Ihnen beim Arbeiten mit den bereitgestellten Inhalten:</p>
            <ul>
                <li><strong>Praktikum</strong> – Hier bearbeiten Sie die Praktikumsaufgaben.</li>
                <li><strong>Klausuren</strong> – Enthält frühere Prüfungsaufgaben.</li>
                <li><strong>Spielwiese</strong> – Zum Ausprobieren und Testen eigener Ideen.</li>
                <li><strong>Demos</strong> – Zum Experimentieren mit den Vorlesungsdemos.</li>
                <li><strong>EWA_Framework</strong> – MVC-Architektur inkl. „Getting started“-Anleitung.</li>
            </ul>

            <p>Viel Erfolg und Spaß beim Programmieren!</p>
            <div class="flex-container">
                <a class="flex-item flex-item--warning" href="./Praktikum">Praktikum</a>
                <a href="https://ewa-lab.h-da.io/" target="_blank" class="flex-item">Praktikumsaufgaben <span aria-hidden="true">↗</span></a>
            </div>
            <div class="flex-container">
                <a class="flex-item" href="./EWA_Framework">EWA_Framework &copy;</a>
                <a href="./Klausuren" class="flex-item">Altklausuren</a>
            </div>
            <div class="flex-container">
                <a href="https://lernen.h-da.de/course/view.php?id=18875" class="flex-item" target="_blank">Moodlekurs <span aria-hidden="true">↗</span></a>
                <a href="http://localhost/phpmyadmin" class="flex-item" target="_blank">Datenbanken <span aria-hidden="true">↗</span></a>
            </div>
            <div class="flex-container">
                <a href="./Spielwiese" class="flex-item">Spielwiese</a>
                <a href="./Demos" class="flex-item">Demos</a>
            </div>
            <footer>
                &copy; <?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8'); ?> Hochschule Darmstadt
            </footer>
            <noscript>
                <p><em>Hinweis:</em> Für den Dark Mode und einige Interaktionen ist JavaScript erforderlich.</p>
            </noscript>
        </div>
    </main>
</body>

</html>