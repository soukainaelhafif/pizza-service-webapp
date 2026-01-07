<?php
require_once __DIR__ . '/../Model/CustomerModel.php';

class CustomerController extends BaseController 
{
    protected ?CustomerModel $customerModel = null;

    public function getData() : array
    {
        $this->customerModel = $this->customerModel ?? new CustomerModel();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $orderingId = $_SESSION['last_ordering_id'] ?? null;
        if ($orderingId === null) {
            return [];
        }

        return $this->customerModel->getOrderByOrderingId((int)$orderingId);
    }

    public function processData() : void
    {
        // Kunde ändert nichts per POST
    }

    public function generateResponse(array $data) : void
    {
        $viewData = [
            'data'  => $data,
            'title' => 'Bestellstatus'
        ];
        $this->renderHtml(__DIR__ . '/../View/customer.view.php', $viewData);
    }
}
