<?php declare(strict_types=1);

require_once './Page.php';

class ExamAPI extends Page
{
    protected $input = '';

    /**
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    /**
	 * @return array
     */
    protected function getViewData():array
    {
        
        if($this->input) {
            $input = $this->_database->real_escape_string($this->input);
            $sql = "SELECT * FROM article WHERE artikelnummer LIKE '" . $input . "%" . "'";
        }
        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->_database->error);
        }
        
        $result = array();
        $record = $recordset->fetch_assoc();
        while ($record) {
            $result[] = $record;
            $record = $recordset->fetch_assoc();
        }
    
        $recordset->free();
        return $result;
    }

    /**
	 * @return void
     */
    protected function generateView():void
    {
        $data = $this->getViewData();

        $jsonData = json_encode($data);
        
        header('Content-Type: application/json');
        echo $jsonData;
    }

    /**
	 * @return void
     */
    protected function processReceivedData():void
    {
        parent::processReceivedData();
        
        if(isset($_GET['input'])) {
            $this->input = $_GET['input'];
        }
    }

    /**
	 * @return void
     */
    public static function main():void
    {
        try {
            $page = new ExamAPI();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

ExamAPI::main();