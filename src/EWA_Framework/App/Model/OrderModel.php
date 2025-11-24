<?php
require_once __DIR__ . '/../Core/BaseModel.php'; 

class OrderModel extends BaseModel 
{
    // READ-Operation (Pizzen holen)
    public function getArticles(): array 
    {
        $sql = "SELECT article_id, name, price FROM article";
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception("Datenbankabfrage fehlgeschlagen: " . $this->db->error);
        }
        $articles = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        return $articles;
    }
    
    // CREATE-Operation (Bestellung speichern)
    public function createOrder(string $address, int $pizza_id, int $amount): bool
    {
        $this->db->begin_transaction();
        
        try {
            // 1. Bestellung (Ordering) speichern
            $stmt = $this->db->prepare("INSERT INTO ordering (address) VALUES (?)");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            
            $ordering_id = $this->db->insert_id; 
            
            // 2. Bestellen Artikel (Ordered_Article) speichern
            $stmt = $this->db->prepare("INSERT INTO ordered_article 
                                        (ordering_id, article_id, status) 
                                        VALUES (?, ?, 1) "); 
            
            for ($i = 0; $i < $amount; $i++) {
                $stmt->bind_param("ii", $ordering_id, $pizza_id);
                $stmt->execute();
            }
            
            $this->db->commit();
            return true;
            
        } catch (Exception $e) {
            $this->db->rollback();
            error_log("Bestellung konnte nicht gespeichert werden: " . $e->getMessage());
            return false;
        }
    }
}