<?php
require_once __DIR__ . '/../Core/BaseModel.php'; 

class DriverModel extends BaseModel 
{
    public function getReadyOrders(): array
    {
        $sql = "SELECT DISTINCT
                    o.ordering_id, 
                    o.address, 
                    GROUP_CONCAT(a.name SEPARATOR ', ') AS articles
                FROM ordered_article oa
                JOIN ordering o ON oa.ordering_id = o.ordering_id
                JOIN article a ON oa.article_id = a.article_id
                WHERE oa.status >= 3 AND oa.status < 5
                GROUP BY o.ordering_id
                ORDER BY o.ordering_id ASC";
        
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception("Datenbankabfrage DriverModel fehlgeschlagen: " . $this->db->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // UPDATE-Operation
    public function updateOrderStatus(int $ordering_id, int $new_status): bool
    {
        $stmt = $this->db->prepare("UPDATE ordered_article SET status = ? WHERE ordering_id = ? AND status < 5");
        $stmt->bind_param("ii", $new_status, $ordering_id);
        
        return $stmt->execute();
    }

    // DELETE-Operation
    public function deleteOrder(int $ordering_id): bool
    {
        $this->db->begin_transaction();
        
        try {
            $this->db->query("DELETE FROM ordered_article WHERE ordering_id = $ordering_id");
            $this->db->query("DELETE FROM ordering WHERE ordering_id = $ordering_id");
            
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollback();
            error_log("Löschen der Bestellung $ordering_id fehlgeschlagen: " . $e->getMessage());
            return false;
        }
    }
}