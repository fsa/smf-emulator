<?php

namespace Forum\View;

class Category
{
    public static function show($categories)
    {
        foreach($categories as $category) {
?>
<div class="categoryframe tborder clearfix">
<h3 class="catbg"><a id="c<?=$category->id?>"></a><?=$category->name?></h3>
<table cellspacing="1" class="bordercolor boardsframe">
<?php
            foreach($category->boards as $board) {
?>
<tr>
    <td class="windowbg icon">
        <a href="/index.php?board=<?=$board->id?>.0">
            <img src="/img/off.gif" alt="Нет новых сообщений" title="Нет новых сообщений" />
        </a>
    </td>
    <td class="windowbg2 info">
        <h4><a href="/index.php?board=<?=$board->id?>.0" name="b<?=$board->id?>"><?=$board->name?></a></h4>
        <p><?=$board->description?></p>
    </td>
    <td class="windowbg stats smalltext">
        <?=$board->num_posts?> Сообщений <br />
        <?=$board->num_topics?> Тем
    </td>
</tr>
<?php
            }
?>
                <!--tr>
                    <td rowspan="2" class="windowbg icon">
                        <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=4.0">
                            <img src="https://web.archive.org/web/20110814020647im_/http://www.club2u.ru/Themes/core/images/off.gif" alt="Нет новых сообщений" title="Нет новых сообщений" />
                        </a>
                    </td>
                    <td class="windowbg2 info">
                        <h4><a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=4.0" name="b4">"Домашний интернет" от Utel</a>
                        </h4>
                        <p>Общий форум по услуге "Домашний интернет от Utel". Пинги, скорость, трейсы - <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php/board,13.0.html">сюда</a>; Технические вопросы задаём <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php/board,12.0.html">здесь</a>.</p>
                    </td>
                    <td rowspan="2" class="windowbg stats smalltext">
                        3432 Сообщений <br />
                        97 Тем
                    </td>
                    <td rowspan="2" class="windowbg2 smalltext lastpost">
                        <strong>Последний ответ</strong> от <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?action=profile;u=596">boooka</a><br />
                        в <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?topic=148.msg23390#new" title="Re: Обсуждения ">Re: Обсуждения </a><br />
                        <strong>Сегодня</strong> в 03:51:34
                    </td>
                </!--tr>
                <tr>
                    <td class="windowbg3 smalltext largepadding"><strong>Подразделы</strong>: <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=9.0" title="Нет новых сообщений (Тем: 25, Сообщений: 1521)">Тарифы, опции, бонусы, подключение</a>, <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=8.0" title="Нет новых сообщений (Тем: 11, Сообщений: 388)">Оплата услуг, личный кабинет</a>, <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=7.0" title="Нет новых сообщений (Тем: 19, Сообщений: 572)">Льготные и бесплатные ресурсы</a>, <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=3.0" title="Нет новых сообщений (Тем: 11, Сообщений: 135)">Вопросница по услуге</a></td>
                </tr>
                <tr>
                    <td class="windowbg icon">
                        <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=5.0">
                            <img src="https://web.archive.org/web/20110814020647im_/http://www.club2u.ru/Themes/core/images/off.gif" alt="Нет новых сообщений" title="Нет новых сообщений" />
                        </a>
                    </td>
                    <td class="windowbg2 info">
                        <h4><a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=5.0" name="b5">Utel.TV для дома</a>
                        </h4>
                        <p></p>
                    </td>
                    <td class="windowbg stats smalltext">
                        1549 Сообщений <br />
                        32 Тем
                    </td>
                    <td class="windowbg2 smalltext lastpost">
                        <strong>Последний ответ</strong> от <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?action=profile;u=3297">Aleks8862</a><br />
                        в <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?topic=722.msg23363#new" title="Re: Новый плейлист - 2010!">Re: Новый плейлист - 201...</a><br />
                        09 Август 2011, 01:04:53
                    </td>
                </tr>
                <tr>
                    <td class="windowbg icon">
                        <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=6.0">
                            <img src="https://web.archive.org/web/20110814020647im_/http://www.club2u.ru/Themes/core/images/off.gif" alt="Нет новых сообщений" title="Нет новых сообщений" />
                        </a>
                    </td>
                    <td class="windowbg2 info">
                        <h4><a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=6.0" name="b6">Интернет для бизнеса</a>
                        </h4>
                        <p>Раздел для корпоративных пользователей данной услуги</p>
                    </td>
                    <td class="windowbg stats smalltext">
                        37 Сообщений <br />
                        4 Тем
                    </td>
                    <td class="windowbg2 smalltext lastpost">
                        <strong>Последний ответ</strong> от <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?action=profile;u=11">Александр</a><br />
                        в <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?topic=103.msg17466#new" title="Хостинг">Хостинг</a><br />
                        06 Ноябрь 2010, 07:05:51
                    </td>
                </tr>
                <tr>
                    <td class="windowbg icon">
                        <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=31.0">
                            <img src="https://web.archive.org/web/20110814020647im_/http://www.club2u.ru/Themes/core/images/off.gif" alt="Нет новых сообщений" title="Нет новых сообщений" />
                        </a>
                    </td>
                    <td class="windowbg2 info">
                        <h4><a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=31.0" name="b31">Wi-Fi Utel</a>
                        </h4>
                        <p>Обсуждение услуги беспроводного доступа в Интернет от Utel</p>
                    </td>
                    <td class="windowbg stats smalltext">
                        106 Сообщений <br />
                        3 Тем
                    </td>
                    <td class="windowbg2 smalltext lastpost">
                        <strong>Последний ответ</strong> от <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?action=profile;u=4181">Лебедев</a><br />
                        в <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?topic=39.msg23156#new" title="Re: WiFi от Utel">Re: WiFi от Utel</a><br />
                        13 Июль 2011, 16:56:25
                    </td>
                </tr>
                <tr>
                    <td class="windowbg icon">
                        <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=10.0">
                            <img src="https://web.archive.org/web/20110814020647im_/http://www.club2u.ru/Themes/core/images/off.gif" alt="Нет новых сообщений" title="Нет новых сообщений" />
                        </a>
                    </td>
                    <td class="windowbg2 info">
                        <h4><a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?board=10.0" name="b10">Другие интернет провайдеры</a>
                        </h4>
                        <p>Обсуждение сторонних интернет-провайдеров</p>
                    </td>
                    <td class="windowbg stats smalltext">
                        259 Сообщений <br />
                        26 Тем
                    </td>
                    <td class="windowbg2 smalltext lastpost">
                        <strong>Последний ответ</strong> от <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?action=profile;u=2423">Royksoop</a><br />
                        в <a href="https://web.archive.org/web/20110814020647/http://www.club2u.ru/index.php?topic=908.msg23203#new" title="Re:ЕвроТел">Re:ЕвроТел</a><br />
                        15 Июль 2011, 10:12:20
                    </td>
                </tr>-->
            </table>
        </div>
<?php
        }
    }
}
