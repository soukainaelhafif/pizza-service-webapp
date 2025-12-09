<?php
require_once __DIR__ . '/../Model/OrderModel.php';

class OrderController extends BaseController 
{
    protected ?OrderModel $orderModel = null;

    public function getData() : array
    {
        $this->orderModel = $this->orderModel ?? new OrderModel(); 
        return $this->orderModel->getArticles();
    }

    public function processData() : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return;
        }

        $address  = trim($_POST['address'] ?? '');
        $pizza_id = filter_input(INPUT_POST, 'pizza_id', FILTER_VALIDATE_INT);
        $amount   = filter_input(INPUT_POST, 'amount',   FILTER_VALIDATE_INT);

        if ($address === '' || $pizza_id === false || $amount === false || $amount < 1) {
            header('Location: index.php?message=error');
            exit;
        }

        $this->orderModel = $this->orderModel ?? new OrderModel();
        $orderingId = $this->orderModel->createOrder($address, $pizza_id, $amount);

        if ($orderingId !== false && $orderingId !== null) {
            $_SESSION['last_ordering_id'] = (int)$orderingId;
            header('Location: customer.php?message=success');
            exit;
        }

        header('Location: index.php?message=error');
        exit;
    }

    public function generateResponse(array $data) : void
    {
        $viewData = [
            'data'  => $data,
            'title' => 'Pizza bestellen'
        ];

        $this->renderHtml(__DIR__ . '/../View/index.view.php', $viewData);
    }
}
