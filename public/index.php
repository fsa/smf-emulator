<?php

require_once '../vendor/autoload.php';
$response = App::initHtml();
$response->showHeader('Тест');

$forum = new Forum(App::sql());
$tree = $forum->getTopicLinksTree(7);
$response->showNavigator($tree);
var_dump($tree);
$response->showNavigator($tree);
$response->showFooter();