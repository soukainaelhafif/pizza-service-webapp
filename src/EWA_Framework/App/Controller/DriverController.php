<?php
require_once __DIR__ . '/../Model/DriverModel.php'; 

class DriverController extends BaseController 
{
    protected DriverModel $driverModel;

    public function getData() : array 
    { 
        $this->driverModel = $this->driverModel ?? new DriverModel();
        return $this->driverModel->getReadyOrders();
    }

    public function processData() : void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $this->driverModel = $this->driverModel ?? new DriverModel();
            
            foreach ($_POST as $key => $value) {
                if (str_starts_with($key, 'status_')) {
                    $ordering_id = filter_var(substr($key, 7), FILTER_VALIDATE_INT);
                    $new_status = filter_var($value, FILTER_VALIDATE_INT);
                    
                    if ($ordering_id !== false && $new_status >= 4 && $new_status <= 5) {
                        
                        if ($new_status == 5) {
                            // Status 5 (Ausgeliefert) => LÖSCHEN
                            $this->driverModel->deleteOrder($ordering_id);
                        } else {
                            // Status 4 (Unterwegs) => UPDATE
                            $this->driverModel->updateOrderStatus($ordering_id, $new_status);
                        }
                    }
                }
            }
            
            header('Location: driver.php'); 
            exit;
        }
    }

    public function generateResponse(array $data) : void
    {
        $viewPath = __DIR__ . '/../View/partials/'; 
        $viewData = ['data' => $data, 'title' => 'Fahreransicht'];
        $this->renderHtml($viewPath . 'driver.view.php', $viewData); 
    }
}