<?php !defined('DEX') && die('Access denied');?>

<div class="container">
    <div class="w1000 white">
        <?php if ($row['art_cate_id'] == 2) :?>
            <img src="<?php echo site_url()?>/resources/images/global/decorate_banner.gif" />
        <?php elseif ($row['art_cate_id'] == 1) :?>
            <img src="<?php echo site_url()?>/resources/images/global/case_banner.gif" />
        <?php endif;?>

        <div class="clear"></div>
        <div class="detail_content">
            <h2><?php echo $row['page_title']?></h2>
            
            <div class="d_text"><?php echo $row['page_content']?></div>
        </div>
    </div>
</div>