<?php

class Forum
{

    public function __construct(private $pdo)
    {
    }

    public function getBoardCategory(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT b.category_id, c.name FROM boards b LEFT JOIN categories c ON c.id=b.category_id WHERE b.id=?');
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    public function getBoardsTree(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT json_agg(q.*) FROM (WITH RECURSIVE r(id, name, parent_id) AS ( SELECT id, name, parent_id FROM boards b WHERE id = ? UNION ALL SELECT bp.id, bp.name, bp.parent_id FROM r, boards bp WHERE r.parent_id = bp.id ) SELECT id AS board_id, name FROM r) q");
        $stmt->execute([$id]);
        $json = $stmt->fetchColumn();
        if ($json) {
            return json_decode($json);
        }
        return null;
    }

    public function getTopic(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM topics WHERE id=?');
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    public function getBoardLinksTree(int $id) {
        $boards = $this->getBoardsTree($id);
        if (is_null($boards)) {
            return null;
        }
        $category = $this->getBoardCategory($id);
        array_unshift($boards, $category);
        return $boards;
    }

    public function getTopicLinksTree(int $id) {
        $topic = $this->getTopic($id);
        if (is_null($topic)) {
            return null;
        }
        $result = $this->getBoardLinksTree($topic->board_id);
        array_push($result, (object)[
            'topic_id' => $topic->id,
            'name' => $topic->title
        ]);
        array_unshift($result, (object)['name'=>'Твой клуб']);
        return $result;
    }
}
