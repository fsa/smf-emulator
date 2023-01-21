<?php

namespace Forum\View;

class Topic
{
	const SIZE = 15;

    public static function showNavigator($board_id)
    {
?>
<div id="modbuttons_top" class="modbuttons clearfix margintop">
	<div class="floatleft middletext">Страницы: [<strong>1</strong>] <a class="navPages" href="/index.php?board=<?=$board_id?>.20">2</a> <a class="navPages" href="/index.php?board=<?=$board_id?>.40">3</a></div>
</div>
<?php
    }

    public static function show($topic_info, $topic)
    {
        self::showNavigator($topic_info->id);
?>
<div id="forumposts" class="tborder">
	<h3 class="catbg3">
		<img src="https://web.archive.org/web/20171014075953im_/http://www.club2u.ru/Themes/core/images/topic/normal_post.gif" align="bottom" alt=""/>
		<span>Автор</span>
		<span id="top_subject">Тема: <?=$topic_info->title?></span>
	</h3>
	<div id="whoisviewing" class="smalltext headerpadding windowbg2">0 Пользователей и 1 Гость просматривают эту тему.
	</div>
<?php
		$odd = true;
        foreach($topic as $message) {
			$odd = !$odd;
?>
<div class="bordercolor">
<a id="msg23130"></a>
<div class="clearfix windowbg<?=$odd?'2':''?> largepadding">
	<div class="floatleft poster">
<?php
			$member = $message->member_id?"<a href=\"/index.php?action=profile;u={$message->member_id}\" title=\"Просмотр профиля {$message->poster_name}\">{$message->poster_name}</a>":$message->poster_name;
?>
		<h4><?=$member?></h4>
		<!--<ul class="reset smalltext" id="msg_23128_extra_info">
			<li>Новичок</li>
			<li><img src="/img/star.gif" alt="*"/></li>
			<li class="margintop">Карма: +1/-7</li>
			<li><img src="/img/useroff.gif" alt="Оффлайн" border="0" style="margin-top: 2px;"/><span class="smalltext"> Оффлайн</span></li>
			<li>Сообщений: 24</li>
			<li class="margintop" style="overflow: auto;"><img class="avatar" src="/index.php?action=dlattach;attach=16;type=avatar" alt=""/></li>
			<li class="margintop">
				<ul class="reset nolist">
				</ul>
			</li>
		</ul>-->
	</div>
	<div class="postarea">
		<div class="flow_hidden">
			<div class="keyinfo">
				<div class="messageicon"><img src="/img/post/xx.gif" alt="" border="0"/></div>
				<h5 id="subject_<?=$message->id?>">
					<a href="/index.php/topic,955.msg23128.html#msg23128" rel="nofollow"><?=$message->subject?></a>
				</h5>
				<div class="smalltext">&#171; <strong> :</strong> <?=date('d.m.Y H:i:s', strtotime($message->posted))?> &#187;</div>
			</div>
		</div>
		<div class="post">
			<hr class="hrcolor" width="100%" size="1"/>
			<div class="inner" id="msg_<?=$message->id?>"><?=$message->body?></div>
		</div>
	</div>
	<div class="moderatorbar">
		<div class="smalltext floatleft" id="modified_23128">
		</div>
		<div class="smalltext largepadding floatright">
			<img src="/img/ip.gif" alt="" border="0"/> Записан
		</div>
	</div>
	</div>
</div>
<?php
        }
?>
</div>
<?php
        self::showNavigator($topic_info->id);
    }
}
