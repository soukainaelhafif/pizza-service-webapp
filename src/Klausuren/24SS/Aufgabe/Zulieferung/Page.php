<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

abstract class Page
{
    // --- ATTRIBUTES ---

    protected MySQLi $_database;

    // --- OPERATIONS ---

    protected function __construct()
    {
        error_reporting(E_ALL);

        $host = "localhost";
        /********************************************/
        // This code switches from the the local installation (XAMPP) to the docker installation 
        if (gethostbyname('mariadb') != "mariadb") { // mariadb is known?
            $host = "mariadb";
        }
        /********************************************/

        $this->_database = new MySQLi($host, "public", "public", "2024_hda_quiz");//NOSONAR

        if ($this->_database->connect_errno) {
            throw new Exception("Connect failed: " . $this->_database->connect_errno);
        }

        // set charset to UTF8!!
        if (!$this->_database->set_charset("utf8")) {
            throw new Exception($this->_database->error);
        }
    }

    public function __destruct()
    {
        $this->_database->close();
    }

    protected function generatePageHeader(string $title = ""):void
    {
        $title = htmlspecialchars($title);
        header("Content-type: text/html; charset=UTF-8");
        echo <<< HTML
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="Exam.js"></script>
                <link rel="stylesheet" href="Exam.css">
                <title>$title</title>
            </head>
            <body>
        HTML;
    }

    protected function generatePageFooter():void
    {
        echo <<< HTML
            </body>
            </html>
        HTML;
    }

    protected function processReceivedData():void
    {

    }
} // end of class