<?php
echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
?>
<rss version="2.0">
    
    <channel>
        <title>Zon Studio</title>
        <description>Trang tin Zon Studio</description>
        <image>
            <url><?php echo base_url(); ?>assets/images/logo.png</url>
            <title>Zon Studio</title>
            <link>http://zonstudio.com</link>
        </image>
        <link><?php echo site_url('zonstudio.rss'); ?></link>
        <copyright><?php echo date('Y'); ?> ZonStudio. All rights reserved.</copyright>
        <pubDate><?php echo gmdate("D, d M Y H:i:s \G\M\T", time()); ?></pubDate>
        <lastBuildDate><?php echo gmdate("D, d M Y H:i:s \G\M\T", time()); ?></lastBuildDate>

        <?php foreach ($news as $item): ?>
            <item>
                <title><?php echo xml_convert($item->title); ?></title>
                <description><![CDATA[ <?php echo character_limiter(strip_tags($item->summary)); ?> ]]></description>
                <link><?php echo site_url('tin-tuc/' . mb_strtolower(url_title(removesign($item->title))) . '-i' . $item->id); ?></link>
                <pubDate><?php echo gmdate("D, d M Y H:i:s \G\M\T", strtotime($item->created_at)); ?></pubDate>
            </item>
        <?php endforeach; ?>

    </channel>
</rss>