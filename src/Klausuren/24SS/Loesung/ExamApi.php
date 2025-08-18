<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
require_once './Page.php';

class ExamApi extends Page
{
    protected function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function getViewData():array
    {
        $myScore=0;
        if (isset($_SESSION["score"])){
          $myScore=$_SESSION["score"];
        }
        $sql = "SELECT COUNT(`id`)  AS `records` FROM `ranking` WHERE `score`>$myScore";
        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Fehler in Abfrage: " . $this->_database->error);
        }
            $record = $recordset->fetch_assoc();
        $recordset->free();
        
        $result["rank"]=$record["records"]+1;
        return $result;
    }

    protected function generateView():void
    {
		$data = $this->getViewData();
		header("Content-Type: application/json; charset=UTF-8");
        $serializedData = json_encode($data);
        echo $serializedData;
    }

    protected function processReceivedData():void
    {

    }

    public static function main():void
    {
        try {
          session_start();
            $page = new ExamApi();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/html; charset=UTF-8");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($e->getMessage());
        }
    }
}


// This call is starting the creation of the page. 
// That is input is processed and output is created.
ExamApi::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >