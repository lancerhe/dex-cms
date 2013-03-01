/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;

CREATE TABLE `dex_ad` (
  `ad_id` int(11) NOT NULL auto_increment,
  `ad_name` varchar(255) NOT NULL default '',
  `ad_apply` varchar(255) default NULL,
  `ad_type` char(1) NOT NULL default 'I' COMMENT 'F:Flash, I:Image',
  `ad_height` smallint(6) default NULL,
  `ad_width` smallint(6) default NULL,
  `ad_desc` varchar(255) NOT NULL default '',
  `ad_url` varchar(50) NOT NULL default '',
  `ad_href` varchar(255) default NULL,
  `ad_target` varchar(10) default NULL,
  `ad_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `dex_ad` VALUES (5,'AD1','index','F',300,1000,'','/upload/ad/20120803113555.jpg','','',1);
INSERT INTO `dex_ad` VALUES (6,'AD2','index','F',300,1000,'','/upload/ad/20120803113652.jpg','','',1);
INSERT INTO `dex_ad` VALUES (7,'AD3','index','F',300,1000,'','/upload/ad/20120803113709.jpg','','',1);
INSERT INTO `dex_ad` VALUES (8,'AD4','index','F',300,1000,'','/upload/ad/20120803113737.jpg','','',1);
INSERT INTO `dex_ad` VALUES (10,'AD5','index','F',300,1000,'','/upload/ad/20120803113805.jpg','','',1);
CREATE TABLE `dex_article_base` (
  `art_id` int(11) NOT NULL auto_increment,
  `art_cate_id` mediumint(5) NOT NULL default '0',
  `art_user_id` int(11) NOT NULL default '1',
  `art_title` varchar(255) default NULL,
  `art_intro` text,
  `art_url` varchar(255) NOT NULL default '',
  `art_createdate` int(10) NOT NULL default '0',
  `art_publishdate` int(10) NOT NULL default '0',
  `art_thumbnails` varchar(255) default '',
  `art_hasattach` tinyint(1) NOT NULL default '0',
  `art_views` int(11) NOT NULL default '0',
  `art_comments` int(11) NOT NULL default '0',
  `art_top` tinyint(3) NOT NULL default '0',
  `art_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

INSERT INTO `dex_article_base` VALUES (119,2,1,'星级酒店装修选择','酒店设计装修中选择装修材料是很重要的一步，在新型材料不断发展更新的年代，对于所有的室内装修来讲可选择性很多，但是也很容易无从选择。选择安全耐用的材料是正确的抉择，即使材料再奢华、再好、用于再好的装饰性...','/html/material/119.html',1343701477,1343664000,'201207/20120731102355_91732.gif',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (120,1,1,'卧榻和书物搁置架的优雅组合','阅读不仅仅是大脑不间断的接收文字的过程，更是一段美妙的经历，通过文字把你带到一个奇特精彩的想象空间（当然这要看你阅读的是什么）。然而，一个令人感到放松和舒适的环境才能够让你全情投入到书中描绘的情景之中...','/html/case/120.html',1343702255,1343664000,'201207/20120731103512_59724.gif',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (121,1,1,'福州润泰集团汽车配件服务有限公司','福州润泰集团汽车配件服务有限公司项目名称：福州润泰集团汽车配件服务有限公司面积：4158㎡主要用材：白樱桃饰面、玻化砖、茶色不锈钢、抛光砖、金刚板、法国木纹大理石设计理念：现代简约','/html/case/121.html',1343717955,1343717955,'201207/20120731145759_80488.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (122,1,1,'东方名城13#1303','','/html/case/122.html',1343718051,1343718051,'201207/20120731150048_77129.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (123,1,1,'北尚新宿16#1405','项目名称：北尚新宿16#1405面积：200㎡主要用材：大理石镜面欧式家具设计理念：纯欧式风格打造了一个奢华的空间，大胆的配色，电视背景墙的大理石，突显出豪气尊贵，以及精致的沙发，欧式的茶几，相映成趣。','/html/case/123.html',1343718126,1343718126,'201207/20120731150146_47084.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (124,1,1,'书香大第9#902','项目名称：书香大第9#902面积：100㎡主要用材:仿古砖红檀面板设计理念：简单的中式风格，柔和的灯光透着一股古色古香的味道。','/html/case/124.html',1343718184,1343718184,'201207/20120731150251_16413.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (125,1,1,'五凤山名居9#101','项目名称：五凤山名居9#101面积：200㎡主要用材：欧式红色仿古砖实木线条软包设计理念：定做整体实木家具，美式风格，打造奢华空间，获得业主及周边好评。','/html/case/125.html',1343718376,1343718376,'201207/20120731150557_13109.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (126,1,1,'金辉伯爵山','','/html/case/126.html',1343718457,1343718457,'201207/20120731150722_12694.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (127,1,1,'海润尊品17#602','','/html/case/127.html',1343718509,1343664000,'201207/20120731150825_49314.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (128,1,1,'津泰路服装店','','/html/case/128.html',1343718562,1343718562,'201207/20120731150916_62632.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (129,1,1,'红海园','','/html/case/129.html',1343718616,1343718616,'201207/20120731151012_61657.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (130,2,1,'欧式品牌床头柜','家具材质说明材料说明：PU发泡+MDF+防尘板+三节钢珠滑轨+描金主材质：PU发泡（床头柜底座）副材质：MDF（企柱、抽筒）；防尘板；三节钢珠滑轨；描金配件：进口五金铰链家具定制定制范围：本产品不可以定制尺寸！因为...','/html/material/130.html',1343718873,1343718873,'201207/20120731151407_95926.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (131,2,1,'温馨韩式田园餐厅5件套装','家具材质说明材料说明：桦木+高密度中纤板主材质：桦木（不生虫，环保健康）副材质：高密度中纤板（抗变形强，承载力强）配件：普通五金件家具定制定制范围：本产品不可以定制尺寸！因为家具需要预定，当您付款后，订...','/html/material/131.html',1343719051,1343719051,'201207/20120731151713_15847.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (132,2,1,'现代家用组合橱柜','家具材质说明材料说明：亚克力+玻面+不锈钢+铝主材质：亚克力（抗变能力强）副材质：玻面；不锈钢；铝家具定制定制范围：本商品可以根据“配件表”定做相关配置及其他，详情请咨询在线客服！物流费用费用情况：产品根...','/html/material/132.html',1343719144,1343719144,'201207/20120731151850_37103.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (133,2,1,'中式推拉门衣柜','家具材质说明材料说明：高密度板+铝框+玻璃主材质：高密度板（抗变能力强）副材质：铝框；玻璃家具定制定制范围：本商品可以根据“配件表”定做相关配置及其他，详情请咨询在线客服！物流费用费用情况：产品根据地区...','/html/material/133.html',1343719223,1343719223,'201207/20120731152010_83624.jpg',0,0,0,0,1);
INSERT INTO `dex_article_base` VALUES (134,2,1,'可卡橡木卫浴柜 浴室柜  JY-946-TZ','家具材质说明材料说明：泰国进口橡木+陶瓷盆主材质：泰国进口橡木（木质坚硬、纹理细腻）副材质：陶瓷（耐划耐磨、耐热、不变形）配件：普通五金件家具尺寸说明长度：柜盆（1.28米）镜子（0.5米）边柜（0.3米）宽度：...','/html/material/134.html',1343719332,1343719332,'201207/20120731152149_50580.jpg',0,0,0,0,1);
CREATE TABLE `dex_article_cate` (
  `art_cate_id` int(11) NOT NULL auto_increment,
  `art_cate_abbr` varchar(20) NOT NULL default '',
  `art_cate_name` varchar(20) NOT NULL default '',
  `art_cate_fid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`art_cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO `dex_article_cate` VALUES (1,'case','装修案例',0);
INSERT INTO `dex_article_cate` VALUES (2,'material','装修材料',0);
CREATE TABLE `dex_article_comment` (
  `art_comment_id` int(11) NOT NULL auto_increment,
  `art_id` int(11) NOT NULL default '0',
  `art_user_id` int(11) default '0',
  `art_comment` text NOT NULL,
  `art_commentdate` int(10) NOT NULL default '0',
  PRIMARY KEY  (`art_comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `dex_article_detail` (
  `art_id` int(11) NOT NULL default '0',
  `art_keyword` varchar(255) default NULL,
  `art_desc` text,
  `art_content` text,
  `art_attach` text,
  PRIMARY KEY  (`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `dex_article_detail` VALUES (119,'装修','星级酒店','<p align=\"center\">\r\n\t<img src=\"/upload/image/201207/20120731102355_91732.gif\" alt=\"\" /> \r\n</p>\r\n<p style=\"text-indent:2em;color:#666666;font-family:微软雅黑;text-align:left;background-color:#FFFFFF;\">\r\n\t酒店设计装修中选择装修材料是很重要的一步，在新型材料不断发展更新的年代，对于所有的室内装修来讲可选择性很多，但是也很容易无从选择。选择安全耐用的材料是正确的抉择，即使材料再奢华、再好、用于再好的装饰性，但是如果不耐用不安全的话还是不行的，安全很重要，耐用可以保证我们不必经常花钱来装修，大家都知道装修一次是何其的麻烦。\r\n</p>\r\n<p style=\"text-indent:2em;color:#666666;font-family:微软雅黑;text-align:left;background-color:#FFFFFF;\">\r\n\t第一、所选材料要能保证酒店装修设计构造自身的强度、刚度和稳定性，不能到最后成为不合格产品。这些强度、稳定性也影响着材料的装饰效果和安全效果，比如现在很多地方装修都会用到玻璃幕墙，如果覆面玻璃和铝合金骨架、连接节点承担外界作用的各种荷载以及它们之间的连接强度刚度等不足的话，可能会导致玻璃破碎，危及生命和财产安全，这时即使有再好的装饰性都是没用的。\r\n</p>\r\n<p style=\"text-indent:2em;color:#666666;font-family:微软雅黑;text-align:left;background-color:#FFFFFF;\">\r\n\t第二、在星级酒店装修装饰时会给整个空间的主体结构带来很大的荷载，也会削弱部分结构构件，这样就很大程度的降低了安全性能，在设计时应该注意到这一点，合理的规划保证整个空间的承重。同时选择材料就要选用那些安全的耐用的，这样才能更久更安全的支撑下去。\r\n</p>\r\n<p style=\"text-indent:2em;color:#666666;font-family:微软雅黑;text-align:left;background-color:#FFFFFF;\">\r\n\t最后，星级酒店装修设计时材料还要与酒店装饰的部位相适应，不同风格、主题、色调的部分对材料在物理、化学上的特性有不同的要求。如在酒店的外部需选用耐久性、风化性较强的花岗石作为饰面；在酒店室内的地面、台阶时，需选用防滑、耐磨、易于清洗及脚踩上去时有种软硬适度感觉的大理石；在酒店的顶棚、天花板时，需选用有一定的反光能力，且质地较轻的石膏板、白色乳胶漆等。虽然这些在装饰上起到了作用，在安全耐用方面同样也起着作用，保证有一定的功能性、装饰性、安全性。\r\n</p>\r\n<p style=\"text-indent:2em;color:#666666;font-family:微软雅黑;text-align:left;background-color:#FFFFFF;\">\r\n\t现在正规店酒店设计公司往往会成立材料供应商渠道，配合材料商的直接供应，然后又配饰部分加以选择，选择好的材料，给酒店设计增添更多的专业风格。\r\n</p>',NULL);
INSERT INTO `dex_article_detail` VALUES (120,'卧榻,书物搁置架,组合','卧榻和书物搁置架的优雅组合','<p style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731103512_59724.gif\" alt=\"\" /> \r\n</p>\r\n<p style=\"text-align:center;\">\r\n\t<br />\r\n</p>\r\n<p style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731103542_75085.gif\" alt=\"\" />\r\n</p>\r\n<p style=\"text-align:left;\">\r\n\t阅读不仅仅是大脑不间断的接收文字的过程，更是一段美妙的经历，通过文字把你带到一个奇特精彩的想象空间（当然这要看你阅读的是什么）。然而，一个令人感到放松和舒适的环境才能够让你全情投入到书中描绘的情景之中，总之，一个完美的阅读空间是需要精心打造和布置的。\r\n</p>',NULL);
INSERT INTO `dex_article_detail` VALUES (121,'','','<p>\r\n\t福州润泰集团汽车配件服务有限公司\r\n</p>\r\n<p>\r\n\t项目名称：福州润泰集团汽车配件服务有限公司 面积：4158㎡ 主要用材：白樱桃饰面、玻化砖、茶色不锈钢、抛光砖、金刚板、 法国木纹大理石 设计理念：现代简约\r\n</p>\r\n<p align=\"center\"><img src=\"/upload/image/201207/20120731145759_80488.jpg\" alt=\"\" /></p>',NULL);
INSERT INTO `dex_article_detail` VALUES (122,'','','<img src=\"/upload/image/201207/20120731150048_77129.jpg\" alt=\"\" />',NULL);
INSERT INTO `dex_article_detail` VALUES (123,'','','<p>\r\n\t项目名称：北尚新宿16#1405 面积：200㎡ 主要用材：大理石 镜面 欧式家具 设计理念：纯欧式风格打造了一个奢华的空间， 大胆的配色，电视背景墙的大理石，突显出豪气 尊贵，以及精致的沙发，欧式的茶几，相映成趣。\r\n</p>\r\n<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731150146_47084.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (124,'','','\r\n<p>\r\n\t项目名称：书香大第9#902 面积：100㎡ 主要用材:仿古砖 红檀面板 设计理念：简单的中式风格，柔和的灯光透着 一股古色古香的味道。\r\n</p>\r\n<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731150251_16413.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (125,'','','<p>\r\n\t项目名称：五凤山名居9#101 面积：200㎡ 主要用材：欧式红色仿古砖 实木线条 软包 设计理念：定做整体实木家具，美式风格， 打造奢华空间，获得业主及周边好评。\r\n</p>\r\n<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731150557_13109.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (126,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731150722_12694.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (127,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731150825_49314.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (128,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731150916_62632.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (129,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731151012_61657.jpg\" alt=\"\" />\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (130,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731151407_95926.jpg\" alt=\"\" />\r\n</div>\r\n<div style=\"margin-left:0px;vertical-align:baseline;color:#545454;\">\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t家具材质说明\r\n\t</h3>\r\n\t<div>\r\n\t\t材料说明：PU发泡+MDF+防尘板+三节钢珠滑轨+描金\r\n\t</div>\r\n\t<div>\r\n\t\t主材质：PU发泡（床头柜底座）\r\n\t</div>\r\n\t<div>\r\n\t\t副材质：MDF（企柱、抽筒）；防尘板；三节钢珠滑轨；描金\r\n\t</div>\r\n\t<div>\r\n\t\t配件：进口五金铰链\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t家具定制\r\n\t</h3>\r\n\t<div>\r\n\t\t定制范围：本产品不可以定制尺寸！因为家具需要预定，当您付款后，订单即生效，进入工厂生产流程，若特殊原因需要更改或取消订单，请与向您服务的客服联系。\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t物流费用\r\n\t</h3>\r\n\t<div>\r\n\t\t费用情况：产品根据地区、体积、重量计费，具体地方运费买家可随时咨询。我们会为您选择最实惠，最快的货运公司发货。\r\n\t</div>\r\n</div>\r\n<div style=\"margin-left:0px;vertical-align:baseline;color:#545454;\">\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t家具特征\r\n\t</h3>\r\n\t<div>\r\n\t\t特点：造型大气、气派、稳重，帮您缔造一个舒适、尊贵、高品位的家。\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t细节说明\r\n\t</h3>\r\n\t<div>\r\n\t\t细节描述：床头柜底座有精美的雕花点缀，各处线条流畅、板面光滑，其高贵的款式诠释着您优雅的品质生活，让您能够享受在其中的每一天。\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t空间面积说明\r\n\t</h3>\r\n\t<div>\r\n\t\t空间参考说明：空间面积大概在6平方米就可放置图中效果。\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t配送周期\r\n\t</h3>\r\n\t<div>\r\n\t\t发货周期：发货周期为30-45天左右，如有断货情况我们会及时与您联系。由于我们无法控制物流公司，偶尔因天气、路况等因素造成货物延误还请买家给予多多理解！\r\n\t</div>\r\n</div>\r\n<div style=\"margin-left:0px;vertical-align:baseline;color:#545454;\">\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t家具所属类型\r\n\t</h3>\r\n\t<div>\r\n\t\t风格：欧式田园\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t家具尺寸说明\r\n\t</h3>\r\n\t<div>\r\n\t\t高度：0.5米\r\n\t</div>\r\n\t<div>\r\n\t\t长度：0.59米\r\n\t</div>\r\n\t<div>\r\n\t\t宽度：0.455米\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t保养说明\r\n\t</h3>\r\n\t<div>\r\n\t\t保养说明：摆放板式家具的地面必须要保持平整，四腿均衡着地，倘若家具安置之后，处于经常摇摆晃动不稳的状态，会损坏家具的平衡性，减少其使用寿命，请不要让家具长期在太阳下照射，以免褪色。\r\n\t</div>\r\n\t<h3 style=\"margin-left:0px;font-size:12px;vertical-align:baseline;\">\r\n\t\t相关提示\r\n\t</h3>\r\n\t<div>\r\n\t\t友情提示：因为灯光效果或者拍摄角度，可能存在少许色差，图片请以实物为准。\r\n\t</div>\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (131,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731151713_15847.jpg\" alt=\"\" />\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t家具材质说明\r\n\t</h3>\r\n\t<div>\r\n\t\t材料说明：桦木+高密度中纤板\r\n\t</div>\r\n\t<div>\r\n\t\t主材质：桦木（不生虫，环保健康）\r\n\t</div>\r\n\t<div>\r\n\t\t副材质：高密度中纤板（抗变形强，承载力强）\r\n\t</div>\r\n\t<div>\r\n\t\t配件：普通五金件\r\n\t</div>\r\n\t<h3>\r\n\t\t家具定制\r\n\t</h3>\r\n\t<div>\r\n\t\t定制范围：本产品不可以定制尺寸！因为家具需要预定，当您付款后，订单即生效，进入工厂生产流程，若特殊原因需要更改或取消订单，请与向您服务的客服联系。\r\n\t</div>\r\n\t<h3>\r\n\t\t物流费用\r\n\t</h3>\r\n\t<div>\r\n\t\t费用情况：产品根据地区、体积、重量计费，具体地方运费买家可随时咨询。我们会为您选择最实惠，最快的货运公司发货。\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t家具特征\r\n\t</h3>\r\n\t<div>\r\n\t\t特点：造型简单、明快，传达着单纯、休闲的设计思想，其迷人之处在于造型、纹路、色调，细腻高贵又耐人寻味。\r\n\t</div>\r\n\t<h3>\r\n\t\t细节说明\r\n\t</h3>\r\n\t<div>\r\n\t\t细节描述：精湛的制作工艺，极致柔美的元素组合经过设计师们专心研究精心设计，搭配纯净的象牙白，让你的餐厅环境更加怡人！\r\n\t</div>\r\n\t<h3>\r\n\t\t空间面积说明\r\n\t</h3>\r\n\t<div>\r\n\t\t空间面积参考：空间面积在16平方米左右就可以放出图中的效果。\r\n\t</div>\r\n\t<h3>\r\n\t\t配送周期\r\n\t</h3>\r\n\t<div>\r\n\t\t发货周期：发货周期为45天左右，详情可咨询在线客服！\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t家具所属类型\r\n\t</h3>\r\n\t<div>\r\n\t\t风格：韩式田园\r\n\t</div>\r\n\t<h3>\r\n\t\t家具尺寸说明\r\n\t</h3>\r\n\t<div>\r\n\t\t产品尺寸：详见列表\r\n\t</div>\r\n\t<h3>\r\n\t\t保养说明\r\n\t</h3>\r\n\t<div>\r\n\t\t如何保养：避免阳光长时间直射，以免造成产品局褪色或泛黄，并保持使用环境清洁、干燥、通风，以免受潮。\r\n\t</div>\r\n\t<h3>\r\n\t\t相关提示\r\n\t</h3>\r\n\t<div>\r\n\t\t友情提示：产品均为实物拍摄，但不排除拍摄环境、光线、显示器分辨率等原因产生的色差，具体颜色请以实物为准。（本套装价格包括：1桌+4椅）\r\n\t</div>\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (132,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731151850_37103.jpg\" alt=\"\" />\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t家具材质说明\r\n\t</h3>\r\n\t<div>\r\n\t\t材料说明：亚克力+玻面+不锈钢+铝\r\n\t</div>\r\n\t<div>\r\n\t\t主材质：亚克力（抗变能力强）\r\n\t</div>\r\n\t<div>\r\n\t\t副材质：玻面；不锈钢；铝\r\n\t</div>\r\n\t<h3>\r\n\t\t家具定制\r\n\t</h3>\r\n\t<div>\r\n\t\t定制范围：本商品可以根据“配件表”定做相关配置及其他，详情请咨询在线客服！\r\n\t</div>\r\n\t<h3>\r\n\t\t物流费用\r\n\t</h3>\r\n\t<div>\r\n\t\t费用情况：产品根据地区、体积、重量计费，具体地方运费买家可随时咨询。我们会为您选择最实惠，最快的货运公司发货。\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t家具特征\r\n\t</h3>\r\n\t<div>\r\n\t\t特点：小巧玲珑，颜色亮丽可爱又不失流行元素，设备齐全，让您能充分感受现代家居生活的方便简单。\r\n\t</div>\r\n\t<h3>\r\n\t\t细节说明\r\n\t</h3>\r\n\t<div>\r\n\t\t细节描述：专门设计了一个平台以及所配备的两把高脚凳，简单时尚，方便主人随时使用。\r\n\t</div>\r\n\t<h3>\r\n\t\t空间面积说明\r\n\t</h3>\r\n\t<div>\r\n\t\t空间面积参考：参考面积大概在8平方米左右，就可放置出图片中的效果。\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t配送周期\r\n\t</h3>\r\n\t<div>\r\n\t\t发货周期：发货周期大概30天左右，详情请咨询在线客服！\r\n\t</div>\r\n\t<h3>\r\n\t\t保养说明\r\n\t</h3>\r\n\t<div>\r\n\t\t如何保养：常用干净的软布擦拭去尘，不要用干布擦拭。如有污渍。可用湿润的软布沾稀释过的中性清洁剂（如：洁而亮等）擦拭或用绘图橡皮擦净。\r\n\t</div>\r\n\t<h3>\r\n\t\t相关提示\r\n\t</h3>\r\n\t<div>\r\n\t\t友情提示：产品均为实物拍摄，但不排除拍摄环境、光线、显示器分辨率等原因产生的色差，具体颜色请以实物为准。\r\n\t</div>\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (133,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731152010_83624.jpg\" alt=\"\" />\r\n</div>\r\n<div>\r\n\t<h3 style=\"text-align:center;\">\r\n\t\t家具材质说明\r\n\t</h3>\r\n\t<div>\r\n\t\t材料说明：高密度板+铝框+玻璃\r\n\t</div>\r\n\t<div>\r\n\t\t主材质：高密度板（抗变能力强）\r\n\t</div>\r\n\t<div>\r\n\t\t副材质：铝框；玻璃\r\n\t</div>\r\n\t<h3>\r\n\t\t家具定制\r\n\t</h3>\r\n\t<div>\r\n\t\t定制范围：本商品可以根据“配件表”定做相关配置及其他，详情请咨询在线客服！\r\n\t</div>\r\n\t<h3>\r\n\t\t物流费用\r\n\t</h3>\r\n\t<div>\r\n\t\t费用情况：产品根据地区、体积、重量计费，具体地方运费买家可随时咨询。我们会为您选择最实惠，最快的货运公司发货。\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t家具特征\r\n\t</h3>\r\n\t<div>\r\n\t\t特征：衣柜门样式新颖独特，衣柜内部结构紧密，实用性强，储物空间大。\r\n\t</div>\r\n\t<h3>\r\n\t\t细节说明\r\n\t</h3>\r\n\t<div>\r\n\t\t细节描述：独特的造型，曲线的线条勾勒，颜色搭配恰当，不夸张喧哗，无处不演译着高调、时尚、温馨的家居生活。\r\n\t</div>\r\n\t<h3>\r\n\t\t空间面积说明\r\n\t</h3>\r\n\t<div>\r\n\t\t空间面积参考：参考面积大概在12平方米左右，就可放置出图片中的效果。\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<h3>\r\n\t\t配送周期\r\n\t</h3>\r\n\t<div>\r\n\t\t发货周期：发货周期为30天左右，详情请咨询在线客服！\r\n\t</div>\r\n\t<h3>\r\n\t\t保养说明\r\n\t</h3>\r\n\t<div>\r\n\t\t保养说明：应防止重物及锐器砸碰轨道、划伤柜体及门板，柜体封边不能碰水及其他液体溶剂，以免封边出现脱落。\r\n\t</div>\r\n\t<h3>\r\n\t\t相关提示\r\n\t</h3>\r\n\t<div>\r\n\t\t友情提示：产品均为实物拍摄，但不排除拍摄环境、光线、显示器分辨率等原因产生的色差，具体颜色请以实物为准。（本商品价格包括：衣柜（7.41平方）+推拉门（6.99平方）+4个抽屉+衣通+衣通托）\r\n\t</div>\r\n</div>',NULL);
INSERT INTO `dex_article_detail` VALUES (134,'','','<div style=\"text-align:center;\">\r\n\t<img src=\"/upload/image/201207/20120731152149_50580.jpg\" alt=\"\" />\r\n</div>\r\n<div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t家具材质说明\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t材料说明：泰国进口橡木+陶瓷盆\r\n\t\t\t</li>\r\n\t\t\t<li>\r\n\t\t\t\t主材质：泰国进口橡木（木质坚硬、纹理细腻）\r\n\t\t\t</li>\r\n\t\t\t<li>\r\n\t\t\t\t副材质：陶瓷（耐划耐磨、耐热、不变形）\r\n\t\t\t</li>\r\n\t\t\t<li>\r\n\t\t\t\t配件：普通五金件\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t家具尺寸说明\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t长度：柜盆（1.28米）镜子（0.5米）边柜（0.3米）\r\n\t\t\t</li>\r\n\t\t\t<li>\r\n\t\t\t\t宽度：柜盆（0.45米）镜子（0.01米）边柜（0.17米）\r\n\t\t\t</li>\r\n\t\t\t<li>\r\n\t\t\t\t高度：柜盆（0.66米）镜子（0.8米）边柜（0.8米）\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t家具产地\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t产地：广东潮洲\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t家具颜色说明\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t颜色：黑白 具体请以实物为准。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t商品起订数量\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t最低起订量 ：1\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t物流费用\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t费用情况：买家承担运费，物流费用按体积计算！\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t家具定制\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t定制范围：本产品不订制尺寸和颜色，详情咨询在线客服！\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n</div>\r\n<div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t细节说明\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t细节描述：高级银镜旁的立体柜设计新颖时尚，洗漱台洁净如镜，美观又大方，让你的家居生活更加的完美，时刻散发着时尚的魅力。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t家具特征\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t特征：台面表面光滑平整、易清洁、吸水率低、寿命长，木质坚硬、纹理细腻、密度高，高级银镜，成像更清晰、精准、真实，是您家居生活的首要选择。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t空间面积说明\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t空间面积参考：空间在5平米的地方就能展示出图中效果。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t配送周期\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t发货周期：发货周期为45天左右，详情可在线咨询客服。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t保养说明\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t保养说明：注意经常用软布为浴室柜去尘，去尘之前，软布上沾点喷洁剂，不要用干布抹擦。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n\t<div>\r\n\t\t<ul>\r\n\t\t\t<h1>\r\n\t\t\t\t相关提示\r\n\t\t\t</h1>\r\n\t\t\t<li>\r\n\t\t\t\t友情提示：标准配置：陶瓷盆+主柜+侧柜+镜子+安装配件（以上产品不配置水龙头，下水，角阀，下水管，镜灯），包装采用珍珠棉、泡沫、纸箱、木架，确保避免运输破损，图片均为实物拍摄，但不排除各方面因素产生色差，请以实物为准。\r\n\t\t\t</li>\r\n\t\t</ul>\r\n\t</div>\r\n</div>',NULL);
CREATE TABLE `dex_link` (
  `link_id` int(11) NOT NULL auto_increment,
  `link_type` char(1) default 'T' COMMENT 'T:Text; I:Image',
  `link_text` varchar(255) default NULL,
  `link_url` varchar(255) default NULL,
  `link_href` varchar(255) default NULL,
  `link_target` varchar(10) default NULL,
  `link_order` tinyint(3) NOT NULL default '0',
  `link_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `dex_link` VALUES (1,'T','测试链接1','','http://local.cms.com/?M=admin/link-add','_blank',2,1);
INSERT INTO `dex_link` VALUES (2,'I','测试链接2','/upload/link/20120719174324.png','http://local.cms.com/?M=admin/link-add','_blank',3,1);
CREATE TABLE `dex_manage` (
  `manage_id` tinyint(3) NOT NULL auto_increment,
  `manage_user` varchar(50) NOT NULL default '',
  `manage_pass` char(32) NOT NULL default '',
  `manage_lastdate` int(10) NOT NULL default '0',
  PRIMARY KEY  (`manage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `dex_manage` VALUES (1,'lancer','08260c2cb53bcc4630d173dd80420f9f',0);
CREATE TABLE `dex_options` (
  `id` int(11) NOT NULL auto_increment,
  `op_name` varchar(50) character set utf8 NOT NULL default '',
  `op_value` varchar(255) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `dex_options` VALUES (1,'site_name','岚岛装饰');
INSERT INTO `dex_options` VALUES (2,'site_descrip','岚岛装饰');
INSERT INTO `dex_options` VALUES (3,'site_copyright','岚岛装饰');
INSERT INTO `dex_options` VALUES (4,'site_icp','闽ICP备 123516665');
INSERT INTO `dex_options` VALUES (5,'article_html','1');
INSERT INTO `dex_options` VALUES (6,'article_html_path','html');
INSERT INTO `dex_options` VALUES (7,'stmp_host','stmp.163.com');
INSERT INTO `dex_options` VALUES (8,'stmp_port','125');
INSERT INTO `dex_options` VALUES (9,'stmp_user','sdaa@126.com');
INSERT INTO `dex_options` VALUES (10,'stmp_pass','asdd');
INSERT INTO `dex_options` VALUES (11,'default_thumb_width','300');
INSERT INTO `dex_options` VALUES (12,'default_thumb_height','240');
INSERT INTO `dex_options` VALUES (13,'upload_image_type','jpg|gif|png');
INSERT INTO `dex_options` VALUES (14,'upload_file_type','zip|gz|rar|iso|doc|xsl|ppt|wps');
INSERT INTO `dex_options` VALUES (15,'upload_media_type','swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov');
INSERT INTO `dex_options` VALUES (16,'page_html_path','page');
CREATE TABLE `dex_singlepage` (
  `page_id` tinyint(3) NOT NULL auto_increment,
  `page_title` varchar(255) NOT NULL default '',
  `page_name` varchar(255) NOT NULL default '',
  `page_keyword` varchar(255) default NULL,
  `page_desc` varchar(255) default NULL,
  `page_content` text,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `dex_singlepage` VALUES (15,'公司简介','intro','岚岛装饰','岚岛装饰','<p>\r\n\t福州岚岛装饰工程有限公司注册于2007年，公司注册资金510万元。是一家专业从事大中型企业办公室、写字楼、商业场所的装修及其配套建设服务公司。公司自成立以来，经过多年的市场洗礼，凝聚了一批资深专业室内设计师，结构、电气、给排水等专业的工程师，网络工程师、布线工程师等技术人才，并且拥有经验丰富、做工精良的装饰装修、综合布线的安装施工团队。\r\n</p>\r\n<p>\r\n\t公司成立多年来一直以\"客户至上，服务第一\"为原则，凭着人性化思维的设计理念，严格按照IS09001质量标准进行管理，秉承\"工作，为了更好的生活\"之理念，本着\"与客户共发展\"的宗旨，竭诚为广大客户提供最优秀的设计、最优美的环境和最优质的服务，以不辜负客户对我们的信任。\r\n</p>\r\n<p>\r\n\t公司自设厂房位于福州新店镇，拥有全自动开料机、封边机、排钻、烤漆房等设备，专业设计生产各种展示专柜及办公家具，为公司的工程提供配套的后勤服务，进一步地完善了业务体系，降低了营运成本，并以低价高质及良好的服务取得了众多客户的信赖！让我们能从容地迎接装修市场的激烈竞争。随着市场的竞争加剧，岚岛人将以更主动完善内部管理体系的实际行动为客户提供更有品味的装修设计，更有竞争力的价格，满意的品质；不断为更多的客户带来满意而努力。\r\n</p>\r\n<p>\r\n\t岚岛装饰现已成为福州市大中型企业办公装修领域的知名装饰企业，这源自于我们合理的价格与优质的施工质量在客户中赢得了良好的信誉。公司以准确的经营定位、独特的经营模式、以人为的管理理念，使公司健康持续发展，使岚岛装饰的品牌形象深入人心。\r\n</p>\r\n<p>\r\n\t岚岛人珍惜来之不易的今天，更憧憬辉煌的明天。我们承诺\"以专业装修经验、合理的价格、优质的施工质量\"为客户创造舒适健康的使用环境。岚岛装饰为您提供专业的服务，是您明智的选择！\r\n</p>\r\n<p>\r\n\t地址：福州市晋安区金鸡山路28号一幢\r\n</p>\r\n<p>\r\n\t电话：87811008&nbsp; 传真：87877028\r\n</p>\r\n<p>\r\n\t网址：<a href=\"http://www.fjdtzs.com\">www.fjdtzs.com</a> \r\n</p>');
INSERT INTO `dex_singlepage` VALUES (16,'联系我们','contact','联系我们','联系我们','<p>福州市晋安区琯尾街金鸡山路28号1幢2层</p>\r\n<p>传真:0591-87877028</p>\r\n<p>电话:0591-87811008</p>\r\n<p>QQ：872545904</p>\r\n<p>黄小姐：13799331008</p>\r\n');
CREATE TABLE `dex_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_email` varchar(255) NOT NULL default '',
  `user_name` varchar(50) NOT NULL default '',
  `user_pass` char(32) NOT NULL default '',
  `user_findcode` char(32) NOT NULL default '',
  `user_confirm` tinyint(1) NOT NULL default '0',
  `user_regdate` int(10) NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO `dex_user` VALUES (1,'admin@admin.com','admin','9819cadf5f80b7042b66580fc9c3797c','9819cadf5f80b7042b66580fc9c3797c',0,0);
INSERT INTO `dex_user` VALUES (3,'adsa@fad.com','dstas','9819cadf5f80b7042b66580fc9c3797c','9819cadf5f80b7042b66580fc9c3797c',0,1262306040);
INSERT INTO `dex_user` VALUES (4,'12sdfad@asd.com','xbcxb','9819cadf5f80b7042b66580fc9c3797c','',0,1980);
INSERT INTO `dex_user` VALUES (12,'asgd@fdsaf.com','acxc','','',0,0);
INSERT INTO `dex_user` VALUES (14,'fdasdaf@dsadf.com','sdgadsg','','',0,0);
INSERT INTO `dex_user` VALUES (15,'fdhasd@fga.com','asdg','','',0,0);
INSERT INTO `dex_user` VALUES (16,'sahas@fsdfsd.com','gasdga','','',0,0);
INSERT INTO `dex_user` VALUES (17,'fgshdg@dsf.com','sagdasd','','',0,0);
INSERT INTO `dex_user` VALUES (24,'sd6192709@126.com','sd6192709','9819cadf5f80b7042b66580fc9c3797c','e9febe0015bbeac0f7183ea2a8350973',1,1337248591);
INSERT INTO `dex_user` VALUES (26,'yong_he@foxitsoftware.com','lancer','9819cadf5f80b7042b66580fc9c3797c','76b36fbd02111e32e7a4d91c0dda65c7',1,1339036106);
INSERT INTO `dex_user` VALUES (27,'yong_he@foxitsoftware.comt','sd6192709t','9819cadf5f80b7042b66580fc9c3797c','',0,1305820800);

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
