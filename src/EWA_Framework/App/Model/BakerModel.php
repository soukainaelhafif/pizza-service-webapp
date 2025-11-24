<?php
require_once __DIR__ . '/../Core/BaseModel.php'; 

class BakerModel extends BaseModel 
{
    public function getPendingPizzas(): array
    {
        $sql = "SELECT 
                    oa.ordered_article_id, 
                    o.ordering_id, 
                    o.address, 
                    a.name AS pizza_name, 
                    oa.status
                FROM ordered_article oa
                JOIN ordering o ON oa.ordering_id = o.ordering_id
                JOIN article a ON oa.article_id = a.article_id
                WHERE oa.status < 5 
                ORDER BY o.ordering_id ASC, oa.ordered_article_id ASC";
        
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception("Datenbankabfrage BakerModel fehlgeschlagen: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // UPDATE-Operation
    public function updatePizzaStatus(int $pizza_id, int $new_status): bool
    {
        $stmt = $this->db->prepare("UPDATE ordered_article SET status = ? WHERE ordered_article_id = ?");
        $stmt->bind_param("ii", $new_status, $pizza_id);
        
        return $stmt->execute();
    }
}