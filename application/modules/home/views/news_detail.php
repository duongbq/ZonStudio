<div class="news_detail">
    <p><h3><span><?php echo $news->title; ?></span></h3></p>
<p>
    <strong>
        <?php echo $news->summary; ?>
    </strong>
</p>
<div class="clear">&nbsp;</div>
<p><?php echo $news->description; ?></p>
<div class="clear">&nbsp;</div>
<p>
    <strong>Tin khác: </strong>
    <ul>
        <?php foreach ($other_news as $other): ?>
            <li><?php echo anchor($this->uri->segment(1) . '/' . mb_strtolower(url_title(removesign($other->title))) . '-i' . $other->id, $other->title); ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
</div>

<div class="clear"></div>

