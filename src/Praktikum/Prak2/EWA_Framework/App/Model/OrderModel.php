<?php
require_once __DIR__ . '/../Core/BaseModel.php';

class OrderModel extends BaseModel
{
    public function getArticles(): array
    {
        $sql = "SELECT article_id, name, price, picture FROM article";
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception("Datenbankabfrage fehlgeschlagen: " . $this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Bestellung anlegen, gibt ordering_id oder false zurück
     */
    public function createOrder(string $address, int $pizzaId, int $amount)
    {
        $db = $this->getDb();

        // ordering eintragen
        $stmtOrder = $db->prepare("INSERT INTO ordering (address) VALUES (?)");
        if (!$stmtOrder) {
            return false;
        }
        $stmtOrder->bind_param("s", $address);
        if (!$stmtOrder->execute()) {
            $stmtOrder->close();
            return false;
        }
        $orderingId = $db->insert_id;
        $stmtOrder->close();

        // einzelne Pizzen in ordered_article
        $stmtPizza = $db->prepare("
            INSERT INTO ordered_article (ordering_id, article_id, status)
            VALUES (?, ?, 1)
        ");
        if (!$stmtPizza) {
            return false;
        }

        for ($i = 0; $i < $amount; $i++) {
            $stmtPizza->bind_param("ii", $orderingId, $pizzaId);
            if (!$stmtPizza->execute()) {
                $stmtPizza->close();
                return false;
            }
        }

        $stmtPizza->close();
        return $orderingId;
    }
}
