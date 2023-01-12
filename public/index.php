<?php

require_once '../vendor/autoload.php';
$action = filter_input(INPUT_GET, 'action');
if ($action) {
    die ("Action: $action");
}
$board = filter_input(INPUT_GET, 'board');
if ($board) {
    die("Board: $board");
}
$topic = filter_input(INPUT_GET, 'topic');
if ($topic) {
    die("Topic: $topic");
}
$response = App::initHtml();
$response->showHeader('Тест');

$forum = new Forum(App::sql());
$tree = $forum->getTopicLinksTree(7);
$response->showNavigator($tree);
var_dump($tree);
$response->showNavigator($tree);
$response->showFooter();