<?php
require_once __DIR__ . '/../Model/OrderModel.php'; 

class OrderController extends BaseController 
{
    protected OrderModel $orderModel;

    public function getData() : array
    {
        $this->orderModel = $this->orderModel ?? new OrderModel(); 
        return $this->orderModel->getArticles();
    }

    public function processData() : void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $address = trim($_POST['address'] ?? '');
            $pizza_id = filter_input(INPUT_POST, 'pizza_id', FILTER_VALIDATE_INT);
            $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);

            if (empty($address) || $pizza_id === false || $amount === false || $amount < 1) {
                header('Location: index.php?message=error'); 
                exit;
            }
            
            $this->orderModel = $this->orderModel ?? new OrderModel();
            $success = $this->orderModel->createOrder($address, $pizza_id, $amount);
            
            // PRG-Pattern
            if ($success) {
                header('Location: customer.php?message=success'); 
                exit; 
            } else {
                header('Location: index.php?message=error'); 
                exit;
            }
        }
    }

    public function generateResponse(array $data) : void
    {
        $viewPath = __DIR__ . '/../View/partials/'; 
        $viewData = [
            'data' => $data, 
            'title' => 'Pizza bestellen' 
        ];
        $this->renderHtml($viewPath . 'order.view.php', $viewData); 
    }
}