<?php

namespace Forum;

use Forum\View\Board;
use Forum\View\Topic;

class Structure
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

    public function getBoardsTree(int $id): ?array
    {
        var_dump($id);
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

    public function getBoardLinksTree(int $id)
    {
        $boards = $this->getBoardsTree($id);
        if (is_null($boards)) {
            return null;
        }
        $category = $this->getBoardCategory($id);
        array_unshift($boards, $category);
        return $boards;
    }

    public function getTopicLinksTree(int $id)
    {
        $topic = $this->getTopic($id);
        if (is_null($topic)) {
            return null;
        }
        $result = $this->getBoardLinksTree($topic->board_id);
        array_push($result, (object)[
            'topic_id' => $topic->id,
            'name' => $topic->title
        ]);
        return $result;
    }

    public function getAllBoards()
    {
        $stmt = $this->pdo->query("SELECT json_agg(a.cat) FROM (SELECT json_build_object('id', c.id, 'name', name, 'boards', b.boards) cat FROM (SELECT category_id, json_agg(row_to_json(boards)) AS boards FROM boards WHERE parent_id IS NULL GROUP BY category_id) b LEFT JOIN categories c ON b.category_id=c.id ORDER BY c.category_order) a");
        return json_decode($stmt->fetchColumn());
    }

    public function getBoard($id, $start, $limit = Board::SIZE)
    {
        $stmt = $this->pdo->prepare("SELECT json_agg(b.topics) FROM (SELECT row_to_json(topics) AS topics FROM topics WHERE board_id=? ORDER BY NOT is_sticky, last_modified DESC LIMIT ? OFFSET ?) b");
        $stmt->execute([$id, $limit, $start]);
        return json_decode($stmt->fetchColumn());
    }

    public function getBoardInfo($id)
    {
        $stmt = $this->pdo->prepare("SELECT row_to_json(boards) FROM boards WHERE id=?");
        $stmt->execute([$id]);
        return json_decode($stmt->fetchColumn());
    }

    public function getMessages($id, $start, $limit = Topic::SIZE)
    {
        $stmt = $this->pdo->prepare("SELECT json_agg(b.messages) FROM (SELECT row_to_json(messages) AS messages FROM messages WHERE topic_id=? ORDER BY posted LIMIT ? OFFSET ?) b");
        $stmt->execute([$id, $limit, $start]);
        return json_decode($stmt->fetchColumn());
    }
}