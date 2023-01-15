<?php

namespace Forum\View;

class Board
{
    public static function showDescription($description)
    {
?>
<div id="description" class="tborder">
	<div class="titlebg2 largepadding smalltext"><?="Description"?></div>
</div>
<?php
    }

    public static function showNavigator($board_id)
    {
?>
<div id="modbuttons_top" class="modbuttons clearfix margintop">
	<div class="floatleft middletext">Страницы: [<strong>1</strong>] <a class="navPages" href="/index.php?board=<?=$board_id?>.20">2</a> <a class="navPages" href="/index.php?board=<?=$board_id?>.40">3</a></div>
</div>
<?php
    }

    public static function show($board)
    {
        var_dump($board);
        self::showDescription('Description');
        self::showNavigator(24);
?>
<div class="tborder" id="messageindex">
	<table cellspacing="1" class="bordercolor boardsframe">
	<thead>
	<tr>
		<th width="9%" colspan="2" class="catbg3 headerpadding">&nbsp;</th>
		<th class="catbg3 headerpadding"><a href="/index.php?board=24.0;sort=subject">Тема</a></th>
		<th class="catbg3 headerpadding" width="11%"><a href="/index.php?board=24.0;sort=starter">Автор</a></th>
		<th class="catbg3 headerpadding" width="4%" align="center"><a href="/index.php?board=24.0;sort=replies">Ответов</a></th>
		<th class="catbg3 headerpadding" width="4%" align="center"><a href="/index.php?board=24.0;sort=views">Просмотров</a></th>
		<th class="catbg3 headerpadding" width="22%"><a href="/index.php?board=24.0;sort=last_post">Последний ответ <img src="/img/sort_down.gif" alt=""/></a></th>
	</tr>
	</thead>
	<tbody>
		<tr class="windowbg2">
			<td colspan="7" class="headerpadding smalltext">0 Пользователей и 1 Гость просматривают этот раздел.</td>
		</tr>
<?php
        foreach($board as $topic) {
?>
        <tr>
			<td class="windowbg2 icon1">
				<img src="/img/topic/veryhot_post.gif" alt=""/>
			</td>
			<td class="windowbg2 icon2">
				<img src="/img/post/xx.gif" alt=""/>
			</td>
			<td class="subject windowbg3">
				<img src="/img/icons/show_sticky.gif" class="floatright" alt="" id="stickyicon17" style="margin: 0;"/>
				<strong><span id="msg_<?=$topic->id?>"><a href="/index.php?topic=<?=$topic->id?>.0"><?=$topic->title?></a></span></strong>
			</td>
			<td class="windowbg2 starter">
				<a href="/index.php?action=profile;u=5" title="Просмотр профиля remalloc">remalloc</a>
			</td>
			<td class="windowbg3 replies">
				720
			</td>
			<td class="windowbg3 views">
				33371
			</td>
			<td class="windowbg2 lastpost">
				<a href="/index.php?topic=17.720#msg23442"><img src="/img/icons/last_post.gif" alt="Последний ответ" title="Последний ответ"/></a>
				<span class="smalltext">
					<?= $topic->last_modified?date('d.m.Y H:i:s', strtotime($topic->last_modified)):''?><br/>
					от <a href="/index.php?action=profile;u=104">FSA</a>
				</span>
			</td>
		</tr>
<?php
        }
?>
	</tbody>
	</table>
</div>
<?php
        self::showNavigator(24);
    }
}
