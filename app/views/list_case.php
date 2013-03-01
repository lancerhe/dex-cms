<?php !defined('DEX') && die('Access denied');?>

<div class="container">
    <div class="w1000 white">
        <img src="<?php echo site_url()?>/resources/images/global/case_banner.gif">
        
        <?php foreach ($rows AS $row) :?>
        <div class="case_list">
            <a href="<?php echo $row['art_url']?>"><img src="<?php echo site_url()?>/upload/image/<?php echo $row['art_thumbnails']?>" />
            <span><?php echo $row['art_title']?></span></a>
        </div>
        <?php endforeach;?>
        
        <div class="clear"></div>
        <?php echo $page;?>
        </div>
    </div>
</div>