<?php

namespace Templates;

class Main
{

    public $title;
    public $context;
    public $header;
    public $notify;

    public function showHeader()
    {
?>
<!DOCTYPE html>
<html">
<head>
    <title>Проблема с ip адресом</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>

<div id="mainframe" style="width: 90%">
<div class="tborder">
    <div class="catbg">
    <img class="floatright" id="smflogo" src="/img/smflogo.gif" alt="Simple Machines Forum" />
    <h1 id="forum_name">Твой клуб</h1>
    </div>
    <ul id="greeting_section" class="reset titlebg2">
        <li id="time" class="smalltext floatright">
            <?= date('d M Y, H:i:s') ?>
            <img id="upshrink" src="/img/upshrink.gif" alt="*" title="Свернуть/Развернуть" align="bottom" style="display: none;" />
        </li>
        <li id="name">Добро пожаловать, <em>Гость</em></li>
    </ul>
    <div id="news_section" class="titlebg2 clearfix">
        <form class="floatright" id="search_form" action="http://www.club2u.ru/index.php?action=search2" method="post" accept-charset="UTF-8">
            <a href="http://www.club2u.ru/index.php?action=search;advanced" title="Расширенный поиск"><img id="advsearch" src="/img/filter.gif" align="middle" alt="Расширенный поиск" /></a>
            <input type="text" name="search" value="" style="width: 190px;" class="input_text" />&nbsp;
            <input type="submit" name="submit" value="Поиск" style="width: 11ex;" class="button_submit" />
            <input type="hidden" name="advanced" value="0" />
            <input type="hidden" name="topic" value="31" />
        </form>
    </div>
</div>

<div class="main_menu">
    <ul class="reset clearfix">
        <li id="button_home" class="active">
            <a title="Начало" href="http://www.club2u.ru/index.php">
                <span><em>Начало</em></span>
            </a>
        </li>
        <li id="button_help">
            <a title="Помощь" href="http://www.club2u.ru/index.php?action=help">
                <span>Помощь</span>
            </a>
        </li>
        <li id="button_search">
            <a title="Поиск" href="http://www.club2u.ru/index.php?action=search">
                <span>Поиск</span>
            </a>
        </li>
        <li id="button_login">
            <a title="Вход" href="http://www.club2u.ru/index.php?action=login">
                <span>Вход</span>
            </a>
        </li>
        <li id="button_register" class="last">
            <a title="Регистрация" href="http://www.club2u.ru/index.php?action=register">
                <span>Регистрация</span>
            </a>
        </li>
    </ul>
</div>
<?php
    }

    public function showNavigator()
    {
?>
<ul class="linktree" id="linktree_upper">
    <li>
        <a href="http://www.club2u.ru/index.php"><span>Твой клуб</span></a> &gt;
    </li>
    <li>
        <a href="http://www.club2u.ru/index.php#c3"><span>Неофициальная техническая поддержка пользователей</span></a> &gt;
    </li>
    <li>
        <a href="http://www.club2u.ru/index.php?board=12.0"><span>Техническая поддержка: проблемы и решения</span></a> &gt;
    </li>
    <li class="last">Тема:
        <a href="http://www.club2u.ru/index.php?topic=31.0"><span>Проблема с ip адресом</span></a>
    </li>
</ul>
<?php
    }

    public function showFooter()
    {
?>
<div id="footerarea" class="headerpadding topmargin clearfix">
    <ul class="reset smalltext">
        <li class="copyright">
            <span class="smalltext" style="display: inline; visibility: visible; font-family: Verdana, Arial, sans-serif;"><a href="http://www.simplemachines.org" title="Simple Machines Forum" target="_blank" class="new_win">SMF</a></span>
        </li>
    </ul>
</div>
</div>
</body>

</html>
<?php
    }
}
