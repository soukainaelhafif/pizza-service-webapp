<?php
require_once __DIR__ . '/../Model/CustomerModel.php'; 

class CustomerController extends BaseController 
{
    protected CustomerModel $customerModel;

    public function getData() : array 
    { 
        $this->customerModel = $this->customerModel ?? new CustomerModel();
        return $this->customerModel->getAllOrders();
    }
    
    public function processData() : void {}

    public function generateResponse(array $data) : void
    {
        $viewPath = __DIR__ . '/../View/partials/'; 
        $viewData = ['data' => $data, 'title' => 'Bestellstatus'];
        $this->renderHtml($viewPath . 'customer.view.php', $viewData); 
    }
}