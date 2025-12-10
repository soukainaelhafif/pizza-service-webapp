<?php

require_once __DIR__ . '/../Model/StatusApiModel.php';

class StatusApiController extends BaseController
{
    private ?StatusApiModel $model = null;

    private function getModel(): StatusApiModel
    {
        if ($this->model === null) {
            $this->model = new StatusApiModel();
        }
        return $this->model;
    }

    public function getData(): array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // letzte Bestellung aus der Session
        $orderingId = $_SESSION['last_ordering_id'] ?? null;
        if (!$orderingId) {
            // keine Bestellung in dieser Session
            return [];
        }

        return $this->getModel()->getOrderData((int)$orderingId);
    }

    public function processData(): void
    {
        // API-Endpunkt: kein POST zu verarbeiten
    }

    public function generateResponse(array $data): void
    {
        // WICHTIG: JSON statt HTML
        $this->renderJson($data);
    }
}
