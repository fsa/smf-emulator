<?php

namespace Forum;

use App;
use Forum\View\Board;
use Forum\View\Category;

class Controller
{
    const TOPIC_SIZE=15;

    public static function route()
    {
        if(count($_GET)==0) {
            self::index();
            exit;
        }
        $action = filter_input(INPUT_GET, 'action');
        if ($action) {
            self::action($action);
            exit;
        }
        $board = filter_input(INPUT_GET, 'board');
        if ($board) {
            self::board($board);
            exit;
        }
        $topic = filter_input(INPUT_GET, 'topic');
        if ($topic) {
            self::topic($topic);
            exit;            
        }
        App::initHtml()->returnError(404);
    }

    public static function index()
    {
        $response = App::initHtml();
        $forum = new Structure(App::sql());
        $boards = $forum->getAllBoards();
        $response->showHeader();
        $response->showNavigator([]);
        Category::show($boards);
        $response->showNavigator([]);
        $response->showFooter();
    }

    public static function action($action)
    {
        App::initHtml()->returnError(500);
    }

    public static function board($board)
    {
        $response = App::initHtml();
        $board = explode('.', $board);
        if (count($board)!=2) {
            $response->returnError(400);
        }
        list($board_id, $board_start) = $board;
        $forum = new Structure(App::sql());
        $tree = $forum->getBoardLinksTree($board_id);
        $board_info = $forum->getBoardInfo($board_id);
        if ($board_info->description) {
            $response->addDescription($board_info->description);
        }
        $board = $forum->getBoard($board_id, $board_start, Board::SIZE);
        $response->showHeader($board_info->name);
        $response->showNavigator($tree);
        Board::show($board_info, $board);
        $response->showNavigator($tree);
        $response->showFooter();
    }

    public static function topic($topic)
    {
        $response = App::initHtml();
        $topic = explode('.', $topic);
        if (count($topic) != 2) {
            $response->returnError(400);
        }
        list($topic_id, $topic_start) = $topic;
        $forum = new Structure(App::sql());
        $tree = $forum->getTopicLinksTree($topic_id);
        $response->showHeader();
        $response->showNavigator($tree);
        echo($topic_id. ' '. $topic_start);
        $response->showNavigator($tree);
        $response->showFooter();
    }
}
