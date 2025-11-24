<?php
require_once __DIR__ . '/../Core/BaseModel.php'; 

class CustomerModel extends BaseModel 
{
    public function getAllOrders(): array
    {
        $sql = "SELECT 
                    oa.ordered_article_id, 
                    o.ordering_id, 
                    o.address, 
                    a.name AS pizza_name, 
                    a.price,
                    oa.status
                FROM ordered_article oa
                JOIN ordering o ON oa.ordering_id = o.ordering_id
                JOIN article a ON oa.article_id = a.article_id
                ORDER BY o.ordering_id DESC"; 
        
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception("Datenbankabfrage CustomerModel fehlgeschlagen: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}