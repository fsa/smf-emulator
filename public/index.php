<?php

require_once '../vendor/autoload.php';
$response = App::initHtml();
$response->showHeader('Тест');
$response->showNavigator();
$response->showNavigator();
$response->showFooter();