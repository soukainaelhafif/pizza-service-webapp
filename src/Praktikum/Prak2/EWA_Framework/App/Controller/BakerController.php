<?php
require_once __DIR__ . '/../Model/BakerModel.php';

class BakerController extends BaseController
{
    protected ?BakerModel $bakerModel = null;

    public function getData(): array
    {
        $this->bakerModel = $this->bakerModel ?? new BakerModel();
        return $this->bakerModel->getOpenPizzas();
    }

    public function processData(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $this->bakerModel = $this->bakerModel ?? new BakerModel();

        foreach ($_POST as $key => $value) {
            if (str_starts_with($key, 'status_')) {
                $id = (int)substr($key, 7);
                $status = (int)$value;
                if ($status === 2 || $status === 3) {
                    $this->bakerModel->updateStatus($id, $status);
                }
            }
        }

        header('Location: baker.php');
        exit;
    }

    public function generateResponse(array $data): void
    {
        $viewData = [
            'data'  => $data,
            'title' => 'Bäckeransicht'
        ];
        $this->renderHtml(__DIR__ . '/../View/baker.view.php', $viewData);
    }
}
