<?php
require_once __DIR__ . '/../Core/BaseModel.php';

class BakerModel extends BaseModel
{
    public function getOpenPizzas(): array
    {
        $sql = "
            SELECT
                oa.ordered_article_id,
                oa.ordering_id,
                oa.status,
                o.address,
                a.name AS pizza_name
            FROM ordered_article oa
            JOIN ordering o ON oa.ordering_id = o.ordering_id
            JOIN article a ON oa.article_id = a.article_id
            WHERE oa.status IN (1,2,3)
            ORDER BY oa.ordering_id, oa.ordered_article_id
        ";
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception('BakerModel getOpenPizzas fehlgeschlagen: ' . $this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStatus(int $orderedArticleId, int $status): bool
    {
        $stmt = $this->db->prepare("
            UPDATE ordered_article
            SET status = ?
            WHERE ordered_article_id = ?
        ");
        if (!$stmt) return false;

        $stmt->bind_param("ii", $status, $orderedArticleId);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
