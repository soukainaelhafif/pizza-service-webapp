<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

require_once './Page.php';

class h_da_quiz extends Page // NOSONAR
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
        $data = array();
        $sql = "SELECT id, text, answerOne, answerTwo FROM question ORDER BY RAND() LIMIT 1";
        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Fehler in Abfrage: " . $this->_database->error);
        }
        while ($record = $recordset->fetch_assoc()) {
            $data[] = $record;
        }
        $recordset->free();
        
        return $data;
    }

    protected function generateView():void
    {
        $data = $this->getViewData();
        $data = $data[0];

        // escape all html-values
        $id = htmlspecialchars($data["id"]);
        $question = htmlspecialchars($data["text"]);
        $answer_1 = htmlspecialchars($data["answerOne"]);
        $answer_2 = htmlspecialchars($data["answerTwo"]);
        
       $score = (int)$_SESSION["score"];

        $this->generatePageHeader("h_da Quiz");
        echo <<<EOT
            <header>
                <h1>h_da Quiz</h1>
            </header>
            <nav class="FlexContainer">
              <a href="Exam.php" class="flexItem">Home</a>
              <a href="Exam.php" class="flexItem">Impressum</a>
              <a href="Exam.php" class="flexItem">Datenschutz</a>
            </nav>
            <section>
            <h2>Statistik</h2>
              <p> Dein Punktestand: $score</p>
              <p> Dein aktueller Platz in der Rangliste: <span id="ranking">-</span></p>
            </section>
            
            <section>
                <h2>$question</h2>
            <form accept-charset="UTF-8" method="post" action="Exam.php">
                  <p>A: <label><input type="radio" name="answer" value="1"/>$answer_1</label></p>
                  <p>B: <label><input type="radio" name="answer" value="2"/>$answer_2</label>
                      <input type="hidden" name="id" value="$id"/>
                  </p>
                  <p><input type="submit" name="submit" value="Frage abschicken"/></p>
             </form>
            </section>
EOT;

if ($score>0){
        echo <<<EOT
            <section>
            <form accept-charset="UTF-8" method="post" action="Exam.php">
                  <p><input type="submit" name="finishGame" value="Quiz fertig"/></p>
             </form>
            </section>
EOT;
}
        $this->generatePageFooter();
    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();
        
        if (!isset($_SESSION["score"])){
          $_SESSION["score"]=0;
        }
        
        if (isset($_POST["submit"])&&isset($_POST["answer"])&&isset($_POST["id"])){
            $answer=(int)$_POST["answer"];
            $id=(int)$_POST["id"];
            if ($this->answerIsCorrect($id,$answer)) {
              $_SESSION["score"]=(int)$_SESSION["score"]+1;
            }
            header('Location:Exam.php');
            die();
        }

          if (isset($_POST["finishGame"])){

            $score = (int)$_SESSION["score"];
            $sql = "INSERT INTO `ranking`(`name`, `score`) VALUES ('Spieler','$score')";
            if (!$this->_database->query($sql)) {
                throw new Exception("Insert failed: " . $this->_database->error);
            }
            session_destroy();
            header('Location:Exam.html');
            die();
        }
    }
    
    public function answerIsCorrect(int $id,int $answer):bool
    {
        $sql = "SELECT COUNT(`id`)  AS `records` FROM `question` WHERE `id`=$id AND `answerCorrect`=$answer";
        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Fehler in Abfrage: " . $this->_database->error);
        }
            $record = $recordset->fetch_assoc();
        $recordset->free();
        if ($record["records"]==1){ // NOSONAR
          return true;
        }else {
          return false;
        }
    }

    public static function main():void
    {
        try {
            session_start();
            $page = new h_da_quiz();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

h_da_quiz::main();

