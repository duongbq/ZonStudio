<div class="wrapper news_detail">

    <h3><?php echo $news->title; ?></h3>

    <div class="summary">
        <?php if ($news->file_id > 0 && isset($file_arr[$news->file_id])) : ?>
            <img src="/uploads/news/<?php echo $file_arr[$news->file_id]; ?>" style="width: 150px; height: 100px;"/>
        <?php endif; ?>
            <div class="text-content">
                   <?php echo $news->summary; ?>
            </div>
            <div class="clear"></div>
    </div>
    
    <div class="clear">&nbsp;</div>
    
    <div class="description"><?php echo $news->description; ?></div>
    
    <div class="clear">&nbsp;</div>
    
    <?php if (count($other_news) > 0): ?>
    <div class="other_news">Tin khác: </div>
    <ul class="other_link">
            <?php foreach ($other_news as $other): ?>
            <li><?php echo anchor($this->uri->segment(1) . '/' . mb_strtolower(url_title(removesign($other->title))) . '-i' . $other->id, '&DoubleLeftRightArrow; '.$other->title); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
</div>

<div class="clear"></div>

