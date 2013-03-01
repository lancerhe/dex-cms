<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class UploadController extends Controller {
    
    private $upload_path = '';
    private $upload_url  = '';
    
    function __construct() {
        parent::__construct();
        $this->upload_url  = site_url() . '/upload/';
        $this->upload_path = BASE_PATH . 'upload/';
    }

    private function error($msg) {
        ob_clean();
        header('Content-type: text/html; charset=UTF-8');
    	echo json_encode(array('error' => 1, 'message' => $msg));
    	exit;
    }
    
    private function cmp_func($a, $b) {
        $order = $this->order;
    	if ($a['is_dir'] && !$b['is_dir']) {
    		return -1;
    	} else if (!$a['is_dir'] && $b['is_dir']) {
    		return 1;
    	} else {
    		if ($order == 'size') {
    			if ($a['filesize'] > $b['filesize']) {
    				return 1;
    			} else if ($a['filesize'] < $b['filesize']) {
    				return -1;
    			} else {
    				return 0;
    			}
    		} else if ($order == 'type') {
    			return strcmp($a['filetype'], $b['filetype']);
    		} else {
    			return strcmp($a['filename'], $b['filename']);
    		}
    	}
    }
    
    function show() {
        $upload_path = $this->upload_path;
        $upload_url  = $this->upload_url;
        //图片扩展名
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');

        //目录名
        $dir_name = trim($this->request->get('dir'));
        if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
        	echo "Invalid Directory name.";
        	exit;
        }
        if ($dir_name !== '') {
        	$upload_path .= $dir_name . "/";
        	$upload_url  .= $dir_name . "/";
        	if (!file_exists($upload_path)) {
        		mkdir($upload_path);
        	}
        }

        //根据path参数，设置各路径和URL
        if ( ! $this->request->get('path') ) {
        	$current_path = realpath($upload_path) . '/';
        	$current_url = $upload_url;
        	$current_dir_path = '';
        	$moveup_dir_path = '';
        } else {
            $current_path     = realpath($upload_path) . '/' . $this->request->get('path');
            $current_url      = $upload_url . $this->request->get('path');
            $current_dir_path = $this->request->get('path');
            $moveup_dir_path  = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }
        echo realpath($upload_path);
        //排序形式，name or size or type
        $this->order = $this->request->get('order');
        $this->order = empty($this->order) ? 'name' : strtolower($this->order);

        //不允许使用..移动到上一级目录
        if (preg_match('/\.\./', $current_path)) {
        	echo 'Access is not allowed.';
        	exit;
        }
        //最后一个字符不是/
        if (!preg_match('/\/$/', $current_path)) {
        	echo 'Parameter is not valid.';
        	exit;
        }
        //目录不存在或不是目录
        if (!file_exists($current_path) || !is_dir($current_path)) {
        	echo 'Directory does not exist.';
        	exit;
        }

        //遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
        	$i = 0;
        	while (false !== ($filename = readdir($handle))) {
        		if ($filename{0} == '.') continue;
        		$file = $current_path . $filename;
        		if (is_dir($file)) {
        			$file_list[$i]['is_dir'] = true; //是否文件夹
        			$file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
        			$file_list[$i]['filesize'] = 0; //文件大小
        			$file_list[$i]['is_photo'] = false; //是否图片
        			$file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
        		} else {
        			$file_list[$i]['is_dir'] = false;
        			$file_list[$i]['has_file'] = false;
        			$file_list[$i]['filesize'] = filesize($file);
        			$file_list[$i]['dir_path'] = '';
        			$file_ext = strtolower(array_pop(explode('.', trim($file))));
        			$file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
        			$file_list[$i]['filetype'] = $file_ext;
        		}
        		$file_list[$i]['filename'] = $filename; //文件名，包含扩展名
        		$file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
        		$i++;
        	}
        	closedir($handle);
        }

        //排序
        usort($file_list, array($this, "cmp_func"));

        $result = array();
        //相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
        //相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
        //当前目录的URL
        $result['current_url'] = $current_url;
        //文件数
        $result['total_count'] = count($file_list);
        //文件列表数组
        $result['file_list'] = $file_list;

        //输出JSON字符串
        header('Content-type: application/json; charset=UTF-8');
        echo json_encode($result);

    }
    function process() {
        $php_path = dirname(__FILE__) . '/';
        $php_url  = dirname($this->request->server('PHP_SELF')) . '/';

        //文件保存目录路径
        $upload_path = $this->upload_path;
        //文件保存目录URL
        $upload_url = $this->upload_url;
        //定义允许上传的文件扩展名
        $ext_arr = array(
        	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
        	'flash' => array('swf', 'flv'),
        	'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
        	'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
        );
        //最大文件大小
        $max_size = 1000000;

        $upload_path = realpath($upload_path) . '/';
        $files       = $this->request->files();
        //PHP上传失败
        if (!empty($files['error'])) {
        	switch($files['error']){
        		case '1':
        			$error = '超过php.ini允许的大小。';
        			break;
        		case '2':
        			$error = '超过表单允许的大小。';
        			break;
        		case '3':
        			$error = '图片只有部分被上传。';
        			break;
        		case '4':
        			$error = '请选择图片。';
        			break;
        		case '6':
        			$error = '找不到临时目录。';
        			break;
        		case '7':
        			$error = '写文件到硬盘出错。';
        			break;
        		case '8':
        			$error = 'File upload stopped by extension。';
        			break;
        		case '999':
        		default:
        			$error = '未知错误。';
        	}
        	$this->error($error);
        }

        //有上传文件时
        if ( $files ) {
            $file      = $files['imgFile'];
        	//原文件名
        	$file_name = $file['name'];
        	//服务器上临时文件名
        	$tmp_name  = $file['tmp_name'];
        	//文件大小
        	$file_size = $file['size'];
        	//检查文件名
        	if (!$file_name) {
        		$this->error("请选择文件。");
        	}
        	//检查目录
        	if (@is_dir($upload_path) === false) {
        		$this->error("上传目录不存在。");
        	}
        	//检查目录写权限
        	if (@is_writable($upload_path) === false) {
        		$this->error("上传目录没有写权限。");
        	}
        	//检查是否已上传
        	if (@is_uploaded_file($tmp_name) === false) {
        		$this->error("上传失败。");
        	}
        	//检查文件大小
        	if ($file_size > $max_size) {
        		$this->error("上传文件大小超过限制。");
        	}
        	//检查目录名
        	$dir_name = $this->request->get('dir');
            $dir_name = empty($dir_name) ? 'image' : trim($dir_name );
        	if (empty($ext_arr[$dir_name])) {
        		$this->error("目录名不正确。");
        	}
        	//获得文件扩展名
        	$temp_arr = explode(".", $file_name);
        	$file_ext = array_pop($temp_arr);
        	$file_ext = trim($file_ext);
        	$file_ext = strtolower($file_ext);
        	//检查扩展名
        	if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
        		$this->error("上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。");
        	}
        	//创建文件夹
        	if ($dir_name !== '') {
        		$upload_path .= $dir_name . "/";
        		$upload_url  .= $dir_name . "/";
        		if (!file_exists($upload_path)) {
        			mkdir($upload_path);
        		}
        	}
        	$ym = date("Ym");
            
            $thumb_path   = $upload_path . 'thumb/' . $ym . "/";
            
        	$upload_path .= $ym . "/";
        	$upload_url  .= $ym . "/";
        	if ( ! file_exists($upload_path)) mkdir($upload_path);
        	
        	//新文件名
        	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
        	//移动文件
        	$file_path = $upload_path . $new_file_name;
        	if (move_uploaded_file($tmp_name, $file_path) === false) {
        		$this->error("上传文件失败。");
        	}
            
            if ( $dir_name == 'image' ) {
                if ( ! file_exists($thumb_path)) mkdir($thumb_path);
                $thumb_width = $this->config->get('default_thumb_width');
                $thumb_height= $this->config->get('default_thumb_height');
                $this->thumb($file_path, $thumb_path . $new_file_name, $thumb_width, $thumb_height);
            }
            
        	@chmod($file_path, 0644);
        	$file_url = $upload_url . $new_file_name;
            
            ob_clean();
        	header('Content-type: text/html; charset=UTF-8');
        	echo json_encode(array('error' => 0, 'url' => $file_url));
        	exit;
        }
    }
    
    /**
     * 生成缩略图
     * @param string     源图绝对完整地址{带文件名及后缀名}
     * @param string     目标图绝对完整地址{带文件名及后缀名}
     * @param int        缩略图宽{0:此时目标高度不能为0，目标宽度为源图宽*(目标高度/源图高)}
     * @param int        缩略图高{0:此时目标宽度不能为0，目标高度为源图高*(目标宽度/源图宽)}
     * @param int        是否裁切{宽,高必须非0}
     * @param int/float  缩放{0:不缩放, 0<this<1:缩放到相应比例(此时宽高限制和裁切均失效)}
     * @return boolean
     */
    function thumb($src_img, $dst_img, $width = 75, $height = 75, $cut = 0, $proportion = 0) {
        if( ! is_file($src_img) )
            return FALSE;

        $ext = pathinfo($dst_img, PATHINFO_EXTENSION);
        $extfunc = 'image' . ($ext == 'jpg' ? 'jpeg' : $ext);
        $srcinfo = getimagesize($src_img);
        $src_w = $srcinfo[0];
        $src_h = $srcinfo[1];
        $type  = strtolower(substr(image_type_to_extension($srcinfo[2]), 1));
        $createfun = 'imagecreatefrom' . ($type == 'jpg' ? 'jpeg' : $type);

        $dst_h = $height;
        $dst_w = $width;
        $x = $y = 0;

        /**
         * 缩略图不超过源图尺寸（前提是宽或高只有一个）
         */
        if(($width> $src_w && $height> $src_h) || ($height> $src_h && $width == 0) || ($width> $src_w && $height == 0))
            $proportion = 1;

        if($width> $src_w) $dst_w = $width = $src_w;

        if($height> $src_h) $dst_h = $height = $src_h;

        if(!$width && !$height && !$proportion) return false;
        
        if(!$proportion) {
            if($cut == 0) {
                if($dst_w && $dst_h) {
                    if($dst_w/$src_w> $dst_h/$src_h) {
                        $dst_w = $src_w * ($dst_h / $src_h);
                        $x = 0 - ($dst_w - $width) / 2;
                    } else {
                        $dst_h = $src_h * ($dst_w / $src_w);
                        $y = 0 - ($dst_h - $height) / 2;
                    }
                } else if($dst_w xor $dst_h) {
                    if($dst_w && !$dst_h)  { //有宽无高
                        $propor = $dst_w / $src_w;
                        $height = $dst_h  = $src_h * $propor;
                    }  else if(!$dst_w && $dst_h) { //有高无宽
                        $propor = $dst_h / $src_h;
                        $width  = $dst_w = $src_w * $propor;
                    }
                }
            } else {
                if(!$dst_h)  //裁剪时无高
                    $height = $dst_h = $dst_w;
                    
                if(!$dst_w)  //裁剪时无宽
                    $width = $dst_w = $dst_h;
                    
                $propor = min(max($dst_w / $src_w, $dst_h / $src_h), 1);
                $dst_w = (int)round($src_w * $propor);
                $dst_h = (int)round($src_h * $propor);
                $x = ($width - $dst_w) / 2;
                $y = ($height - $dst_h) / 2;
            }
        } else {
            $proportion = min($proportion, 1);
            $height = $dst_h = $src_h * $proportion;
            $width  = $dst_w = $src_w * $proportion;
        }

        $src = $createfun($src_img);
        $dst = imagecreatetruecolor($width ? $width : $dst_w, $height ? $height : $dst_h);
        $white = imagecolorallocate($dst, 255, 255, 255);
        imagefill($dst, 0, 0, $white);

        if(function_exists('imagecopyresampled'))
            imagecopyresampled($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
        else
            imagecopyresized($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
        
        $extfunc($dst, $dst_img);
        imagedestroy($dst);
        imagedestroy($src);
        return true;
    }
}