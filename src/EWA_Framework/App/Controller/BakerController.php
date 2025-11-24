<?php
require_once __DIR__ . '/../Model/BakerModel.php'; 

class BakerController extends BaseController 
{
    protected BakerModel $bakerModel;

    public function getData() : array 
    { 
        $this->bakerModel = $this->bakerModel ?? new BakerModel();
        return $this->bakerModel->getPendingPizzas();
    }

    public function processData() : void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $this->bakerModel = $this->bakerModel ?? new BakerModel();
            
            foreach ($_POST as $key => $value) {
                if (str_starts_with($key, 'status_')) {
                    $pizza_id = filter_var(substr($key, 7), FILTER_VALIDATE_INT);
                    $new_status = filter_var($value, FILTER_VALIDATE_INT);
                    
                    if ($pizza_id !== false && $new_status >= 2 && $new_status <= 3) {
                        $this->bakerModel->updatePizzaStatus($pizza_id, $new_status);
                    }
                }
            }
            
            header('Location: baker.php'); 
            exit;
        }
    }

    public function generateResponse(array $data) : void
    {
        $viewPath = __DIR__ . '/../View/partials/'; 
        $viewData = ['data' => $data, 'title' => 'Bäckeransicht'];
        $this->renderHtml($viewPath . 'baker.view.php', $viewData); 
    }
}