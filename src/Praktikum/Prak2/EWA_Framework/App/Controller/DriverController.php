<?php
require_once __DIR__ . '/../Model/DriverModel.php';

class DriverController extends BaseController
{
    protected ?DriverModel $driverModel = null;

    public function getData(): array
    {
        $this->driverModel = $this->driverModel ?? new DriverModel();
        return $this->driverModel->getDeliveries();
    }

    public function processData(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $this->driverModel = $this->driverModel ?? new DriverModel();

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'status_')) {
                $orderingId = (int)substr($key, 7);
                $status     = (int)$value;

                if ($status === 4 || $status === 5) {
                    $this->driverModel->updateOrderStatus($orderingId, $status);

                    if ($status === 5) {
                        // Optional: komplett löschen
                        $this->driverModel->deleteDelivered($orderingId);
                    }
                }
            }
        }

        header('Location: driver.php');
        exit;
    }

    public function generateResponse(array $data): void
    {
        $viewData = [
            'data'  => $data,
            'title' => 'Fahreransicht'
        ];
        $this->renderHtml(__DIR__ . '/../View/driver.view.php', $viewData);
    }
}
