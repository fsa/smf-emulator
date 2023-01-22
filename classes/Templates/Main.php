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
<title><?= $this->title ?: $this->context['title'] . ' - Главная страница'?></title>
<link rel="stylesheet" href="/styles.css">
<?=$this->header?>
</head>

<body>

<div id="mainframe" style="width: 90%">
<div class="tborder">
    <div class="catbg">
    <img class="floatright" id="smflogo" src="/img/smflogo.gif" alt="Simple Machines Forum" />
    <h1 id="forum_name"><?=$this->context['title']?></h1>
    </div>
    <ul id="greeting_section" class="reset titlebg2">
        <li id="time" class="smalltext floatright">
            <?= date('d M Y, H:i:s') ?>
            <img id="upshrink" src="/img/upshrink.gif" alt="*" title="Свернуть/Развернуть" align="bottom" style="display: none;" />
        </li>
        <li id="name">Добро пожаловать, <em>Гость</em></li>
    </ul>
    <div id="news_section" class="titlebg2 clearfix">
        <form class="floatright" id="search_form" action="/index.php?action=search2" method="post" accept-charset="UTF-8">
            <a href="/index.php?action=search;advanced" title="Расширенный поиск"><img id="advsearch" src="/img/filter.gif" align="middle" alt="Расширенный поиск" /></a>
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
            <a title="Начало" href="/index.php">
                <span><em>Начало</em></span>
            </a>
        </li>
        <li id="button_help">
            <a title="Помощь" href="/index.php?action=help">
                <span>Помощь</span>
            </a>
        </li>
        <li id="button_search">
            <a title="Поиск" href="/index.php?action=search">
                <span>Поиск</span>
            </a>
        </li>
        <li id="button_login">
            <a title="Вход" href="/index.php?action=login">
                <span>Вход</span>
            </a>
        </li>
        <li id="button_register" class="last">
            <a title="Регистрация" href="/index.php?action=register">
                <span>Регистрация</span>
            </a>
        </li>
    </ul>
</div>
<?php
    }

    public function showNavigator(array $link_tree = [])
    {
        $tree = ["<a href=\"index.php\"><span>{$this->context['title']}</span></a>"];
        foreach ($link_tree as $link) {
            if (isset($link->topic_id)) {
                $tree[] = "Тема: <a href=\"index.php?topic={$link->topic_id}.0\"><span>{$link->name}</span></a>";
            } else {
                $url = 'index.php';
                if (isset($link->category_id)) {
                    $url = "index.php#c{$link->category_id}";
                }
                if (isset($link->board_id)) {
                    $url = "index.php?board={$link->board_id}.0";
                }
                $tree[] = "<a href=\"{$url}\"><span>{$link->name}</span></a>";
            }
        }
        $last = count($tree) - 1;
?>
<ul class="linktree" id="linktree_upper">
<?php
        for ($i = 0; $i < count($tree); $i++) {
            if ($i!=$last) {
?>
    <li><?=$tree[$i]?> &gt;</li>
<?php
            } else {
?>
    <li class="last"><?=$tree[$i]?></li>
<?php
            }
        }
?>
</ul>
<?php
    }

    public static function showPopup($message, $title, $style = null)
    {
?>
<div id="modalDialog" class="modalDialog modalDialog-target">
    <div>
        <h1><?= $title ?></h1>
        <?= $message ?>
        <a href="#close" title="Закрыть" class="close" onclick="document.getElementById('modalDialog').classList.remove('modalDialog-target'); return false;">X</a>
    </div>
</div>
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
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(92141933, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/92141933" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</div>
</body>

</html>
<?php
    }
}
