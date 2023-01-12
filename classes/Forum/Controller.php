<?php

namespace Forum;

use App;

class Controller
{
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
        $response = App::response();
        $response->showHeader();
        $response->showNavigator([]);
        //TODO: главная страница
        $response->showNavigator([]);
        $response->showFooter();
    }

    public static function action($action)
    {
        App::initHtml()->returnError(500);
    }
    public static function board($board)
    {
        die("Board: $board");
    }
    public static function topic($topic)
    {
        //$forum = new Structure(App::sql());
        //$tree = $forum->getTopicLinksTree(7);
        //$response->showNavigator($tree);
        die("Topic: $topic");
    }
}
