<?php !defined('DEX') && die('Access denied');?>
<script type="text/javascript" src="<?php echo site_url()?>/resources/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>/resources/js/jquery.myScroll.js"></script>

<div class="container">
    <div class="w1000">
        <div class="wrapper">
    
            <div id="focus">
                <ul>
                	<?php foreach($ad AS $row) :?>
                    <li><a href="<?php echo $row['ad_href'] ? $row['ad_href'] : 'javascript:;'?>" target="_blank"><img src="<?php echo site_url() . $row['ad_url']?>" alt="<?php echo $row['ad_desc']?>" /></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
    
        </div>
        <!-- wrapper end -->
        
    </div>
        
    <div class="w1000 white">
        <div class="title"><img src="<?php echo site_url()?>/resources/images/global/decorate_tit.gif" /></div>
        <?php foreach ($material AS $row) :?>
        <div class="w320">
            <a href="<?php echo $row['art_url']?>"><img src="<?php echo site_url()?>/upload/image/<?php echo $row['art_thumbnails']?>" /></a>
            <a href="<?php echo $row['art_url']?>"><h4><?php echo $row['art_title']?></h4></a>
            <p><?php echo strcut($row['art_intro'], 80)?></p>
        </div>
        <?php endforeach; ?>
        
        <div class="clear h20"></div>
    </div>
    
        
    <div class="w1000 bg02">
        <div class="title"><img src="<?php echo site_url()?>/resources/images/global/case_tit.gif" /></div>
        
        <div class="myScroll" id="product">
            <p class="myPrevBtn"></p>
            <p class="myNextBtn"></p>
            <div class="myBlock">
                <ul>
                	<?php foreach ($case AS $row) :?>
                    <li>
                        <dl>
                            <dt><a href="<?php echo $row['art_url']?>"><img src="<?php echo site_url()?>/upload/image/<?php echo $row['art_thumbnails']?>" /></a></dt>
                            <dd><a href="<?php echo $row['art_url']?>"><?php echo strcut($row['art_title'], 20 , '')?></a></dd>
                        </dl>
                    </li>
                	<?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
var len = $("#focus ul li").length; //获取焦点图个数
var index = 0;
var picTimer;

//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
var btn = "<div class='btnBg'></div><div class='btn'>";
for(var i=0; i < len; i++) {
	btn += "<span></span>";
}
btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
$("#focus").append(btn);
$("#focus .btnBg").css("opacity",0.5);

//为小按钮添加鼠标滑入事件，以显示相应的内容
$("#focus .btn span").css("opacity",0.4).mouseenter(function() {
	index = $("#focus .btn span").index(this);
	showPics(index);
}).eq(0).trigger("mouseenter");

//上一页、下一页按钮透明度处理
$("#focus .preNext").css("opacity",0.2).hover(function() {
	$(this).stop(true,false).animate({"opacity":"0.5"},300);
},function() {
	$(this).stop(true,false).animate({"opacity":"0.2"},300);
});

//上一页按钮
$("#focus .pre").click(function() {
	index -= 1;
	if(index == -1) {index = len - 1;}
	showPics(index);
});

//下一页按钮
$("#focus .next").click(function() {
	index += 1;
	if(index == len) {index = 0;}
	showPics(index);
});

//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
$("#focus ul").css("width",sWidth * (len));

//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
$("#focus").hover(function() {
	clearInterval(picTimer);
},function() {
	picTimer = setInterval(function() {
		showPics(index);
		index++;
		if(index == len) {index = 0;}
	},4000); //此4000代表自动播放的间隔，单位：毫秒
}).trigger("mouseleave");

//显示图片函数，根据接收的index值显示相应的内容
function showPics(index) { //普通切换
	var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
	$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
	//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
	$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
}

$("#product").myScroll({visible:5,scroll:3,auto:[true,2000],speed:1000});
</script>