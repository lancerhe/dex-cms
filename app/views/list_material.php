<?php !defined('DEX') && die('Access denied');?>

<div class="container">
    <div class="w1000 white">
        <img src="<?php echo site_url()?>/resources/images/global/decorate_banner.gif">
        
        <?php
        $i = 0; 
        foreach ($rows AS $row) :
            $i++;
        ?>
        <div class="decorate_list">
            <a href="<?php echo $row['art_url']?>"><img src="<?php echo site_url()?>/upload/image/<?php echo $row['art_thumbnails']?>" /></a>
            <a href="<?php echo $row['art_url']?>" class="tit"><?php echo $row['art_title']?></a>
            <p><?php echo strcut($row['art_intro'], 100)?></p>
            <a href="<?php echo $row['art_url']?>" class="more">more..</a>
        </div>
        <?php 
            if ( is_int($i / 2) )
                echo '<div class="clear"></div><div class="line"></div>';
        endforeach;
        ?>
    
        <div class="clear"></div>
        <?php echo $page;?>
    </div>
</div>