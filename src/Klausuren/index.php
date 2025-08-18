<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/index.css">
    <script src="/logic.js" defer></script>
    <title>EWA-Altklausuren</title>
</head>
<body>
    <main class="main-container">
        <header>
            <h1>EWA-Altklausuren</h1>
        </header>
        <nav aria-label="Liste vergangener Klausuren">
            <ul class="exam-list">
                <li><a href="17SS/index.php"><span class="date">2017 SS:</span> Quizmeister</a></li>
                <li><a href="18SS/index.php"><span class="date">2018 SS:</span> Wohnzimmer-Deko</a></li>
                <li><a href="19SS/index.php"><span class="date">2019 SS:</span> Nutzerfreundliche Formulare</a></li>
                <li><a href="20SS/index.php"><span class="date">2020 SS:</span> News-Ticker</a></li>
                <li><a href="21SS/index.php"><span class="date">2021 SS:</span> Sportverein – Trapp/Hahn (Erste Klausur am Rechner)</a></li>
                <li><a href="22SS/index.php"><span class="date">2022 SS:</span> Leichte Sprache – Trapp/Hahn/Hofmann (Präsenzklausur am Rechner)</a></li>
                <li><a href="22WS/index.php"><span class="date">2022 WS:</span> H_DA Chatbot – Hofmann (Präsenzklausur am Rechner)</a></li>
                <li><a href="23SS/index.php"><span class="date">2023 SS:</span> OPIs Baumarkt – Hahn/Jung (Präsenzklausur am Rechner)</a></li>
                <li><a href="23WS/index.php"><span class="date">2023 WS:</span> H_DA Electronics – Hofmann (Präsenzklausur am Rechner)</a></li>
                <li><a href="24SS/index.php"><span class="date">2024 SS:</span> H_DA Quiz – Hofmann/Hahn (Präsenzklausur am Rechner)</a></li>
                <li><a href="24WS/index.php"><span class="date">2024 WS:</span> H_DA Passwort – Hofmann (Präsenzklausur am Rechner)</a></li>
                <li><a href="25SS"><span class="date">2025 WS:</span> H_DA Todo-Liste – Hofmann (Papierklausur)</a></li>
            </ul>
        </nav>
        <a href="/">Zurück zur Startseite</a>
        <style>
        .exam-list {
            list-style: none;
            border: 1px solid gray;
            padding: 15px;
            border-radius: 5px;
            margin-top: 0;
        }

        .exam-list li {
            margin: 4px 0;
        }

        .exam-list a {
            display: grid;
            grid-template-columns: 80px auto; /* linke Spalte fix, rechte flexibel */
            text-decoration: none;
            color: #007bff;
        }

        .exam-list a:hover {
            text-decoration: underline;
        }

        .date {
            font-weight: bold;
        }
        </style>
    </main>
</body>
</html>