<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class Exam for the exercises of the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 7.4
 *
 * @file     Exam.php
 * @package  Page Templates
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @version  3.1
 */

// to do: change name 'Exam' throughout this file
require_once './Page.php';

/**
 * This is a template for top level classes, which represent
 * a complete web page and which are called directly by the user.
 * Usually there will only be a single instance of such a class.
 * The name of the template is supposed
 * to be replaced by the name of the specific HTML page e.g. baker.
 * The order of methods might correspond to the order of thinking
 * during implementation.
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
class Exam extends Page
{
    // to do: declare reference variables for members 
    // representing substructures/blocks

    /**
     * Instantiates members (to be defined above).
     * Calls the constructor of the parent i.e. page class.
     * So, the database connection is established.
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
    }

    /**
     * Cleans up whatever is needed.
     * Calls the destructor of the parent i.e. page class.
     * So, the database connection is closed.
     */
    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * Fetch all data that is necessary for later output.
     * Data is returned in an array e.g. as associative array.
	 * @return array An array containing the requested data. 
	 * This may be a normal array, an empty array or an associative array.
     */
    protected function getViewData():array
    {
        return [];
    }

    /**
     * First the required data is fetched and then the HTML is
     * assembled for output. i.e. the header is generated, the content
     * of the page ("view") is inserted and -if available- the content of
     * all views contained is generated.
     * Finally, the footer is added.
	 * @return void
     */
    protected function generateView():void
    {
        $this->generatePageHeader('Registrierung');

        $infoText = '';
        if (isset($_GET['error'])) {
            $infoText = "<p>Benutzerbereits vergeben!</p>";
        }
        if (isset($_GET['success'])) {
            $infoText = "<p>Benutzer erfolgreich registriert!</p>";
        }

        echo <<< HTML
            <div class="container">
                <header>
                    <h1>H_DA - Registrierung</h1>
                    <nav>
                        <a href="#">Home</a>
                        <a href="#">Impressum</a>
                        <a href="#">Datenschutz</a>
                    </nav>
                </header>
                <section class="main-section">
                    <h2>Benutzer anlegen</h2>
                        <form method="post" action="Exam.php">
                            <div class="flex-container"> 
                                <input class="flex-item-1" type="text" id="userName" name="userName" value="" placeholder="Benutzername" required>
                                <input class="flex-item-2" autocomplete="new-password" type="password" name="password" id="password" value="" placeholder="Passwort" required>
                                <input class="flex-item-3" type="submit" value="Anlegen" id="submit-button" disabled="true">
                            </div>
                        </form>
                        $infoText
                        <p id="output"></p>
                </section>
                <section>
                    <h2>Passwortstärke</h2>
                    <p id="outputStrength" class="week">Schwach</p>
                </section>
            </div>
        HTML;

        $this->generatePageFooter();
    }

    /**
     * Processes the data that comes via GET or POST.
     * If this page is supposed to do something with submitted
     * data do it here.
	 * @return void
     */
    protected function processReceivedData():void
    {
        if (isset($_POST['userName']) && isset($_POST['password'])) {
            $userName = $this->_database->real_escape_string($_POST['userName']);
            $password = $this->_database->real_escape_string($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $checkQuery = "SELECT COUNT(*) AS count FROM user WHERE name = '$userName'";
            $result = $this->_database->query($checkQuery);
            $row = $result->fetch_assoc();
        
            if ($row['count'] == 0) {
                $SQLabfrage = "INSERT INTO user (name, password) VALUES ('$userName', '$password')";
                $this->_database->query($SQLabfrage);
        
                header('Location: Exam.php?success=true');
                exit();
            } else {
                header('Location: Exam.php?error=true');
                exit();
            }
        }
    }

    /**
     * This main-function has the only purpose to create an instance
     * of the class and to get all the things going.
     * I.e. the operations of the class are called to produce
     * the output of the HTML-file.
     * The name "main" is no keyword for php. It is just used to
     * indicate that function as the central starting point.
     * To make it simpler this is a static function. That is you can simply
     * call it without first creating an instance of the class.
	 * @return void
     */
    public static function main():void
    {
        try {
            $page = new Exam();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

// This call is starting the creation of the page. 
// That is input is processed and output is created.

Exam::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >