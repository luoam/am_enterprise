<?php
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; 
?>
<rss version="2.0">
<channel>
<title><?=$site['name'];?></title><!--设定网站Title-->
<link><?=$site_url;?>rss</link>
<description><?=$site['description']?></description>
<copyright><?=$site['copyright'];?></copyright>
<managingEditor><?=$site['name'];?></managingEditor> 
<language>zh-cn</language> 
<docs><?=$url;?></docs>
<generator></generator> 
<ttl>10</ttl> 
<?php foreach ($article_list as $value):?>
<item>
    <title><?=  xml_convert($value['title']);?></title>
    <link><?=$base_url?>index/article/<?=$value['id']?></link>
    <description><![CDATA[ <?php echo character_limiter($value['degest'], 200); ?> ]]></description>
</item>
<?php endforeach;?>
</channel>
</rss>




