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
            </table>
        </div>
<?php
        }
    }
}
