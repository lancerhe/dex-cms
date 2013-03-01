<?php !defined('DEX') && die('Access denied');?>

<div class="container">
    <div class="w1000 white">
        <?php if ($row['art_cate_id'] == 2) :?>
            <img src="<?php echo site_url()?>/resources/images/global/decorate_banner.gif" />
        <?php elseif ($row['art_cate_id'] == 1) :?>
            <img src="<?php echo site_url()?>/resources/images/global/case_banner.gif" />
        <?php endif;?>
        
        <a href="<?php echo $art_first?>" class="detail_page fl">上一篇</a>
        <a href="<?php echo $art_last?>" class="detail_page fr">下一篇</a>
        <div class="clear"></div>
        <div class="detail_content">
            <h1><?php echo $row['art_title']?></h1>
            
            <div class="d_text"><?php echo $row['art_content']?></div>
        </div>
    </div>
</div>