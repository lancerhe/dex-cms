<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class LandingController extends AdminController {
	
	function htmlindex() {
        $content = file_get_contents( site_url() . '/index.php' );

        $file = 'index.html';
        if ( create_file($file, $content) ) {
			$this->load->library('Message');
			$message = "主页成功生成！";
			$return  = site_url('admin/landing');
			$buttons = array( '返回' => $return );
			
			$this->Message->success($message, $buttons, $return);
		}

	}
	
    function index() {
        parent::index();
        
        $data = array();
        $data['manage_name'] = $this->MManage->getUser();
        
        $this->load->model('MArt');
        $data['art_counts']         = $this->MArt->getCounts();
        $data['art_publish_counts'] = $this->MArt->getCounts( array('art_status=1') );
        
        $this->load->model('MAd');
        $data['ad_counts']          = $this->MAd->getCounts();
        $data['ad_publish_counts']  = $this->MAd->getCounts( array('ad_status=1') );
        
        $this->load->model('MUser');
        $data['user_counts']          = $this->MUser->getCounts();
        $data['user_confirm_counts']  = $this->MUser->getCounts( array('user_confirm=1') );
        
        $this->load->library('Dir');
        $data['cache_size']  = $this->Dir->getRealSize($this->Dir->getDirSize(APP_PATH . 'cache'));
        $data['attach_size'] = $this->Dir->getRealSize($this->Dir->getDirSize(BASE_PATH . 'upload'));
        
        if (@ini_get('file_uploads')) {
        	$data['file_upload'] = '允许 '.ini_get('upload_max_filesize');
        } else {
        	$data['file_upload'] = '<font color="red">禁止</font>';
        }
        
        $data['register_globals']  = $this->getphpcfg('register_globals');
        $data['safe_mode']         = $this->getphpcfg('safe_mode');
        $data['gd_version']        = $this->gd_version() ? '版本：' . $this->gd_version() : '不支持';
        $data['server_time'] = date('Y-m-d H:i:s', mktime() );
        $data['software']    = $this->request->server('SERVER_SOFTWARE');
        
        if (function_exists('memory_get_usage')) {
        	$data['memory_info'] = $this->Dir->getRealSize(memory_get_usage());
        }
        $this->load->viewAdmin('landing', $data);
    }
    
    private function getfun($funName) {
    	return (function_exists($funName)) ? '支持' : '不支持';
    }
    
    private function gd_version() {	
    	if (function_exists('gd_info')) {
    		$GDArray = gd_info(); 
    		$gd_version_number = $GDArray['GD Version'] ? $GDArray['GD Version'] : 0;
    		unset($GDArray);
    	} else {
    		$gd_version_number = 0;
    	}
    	return $gd_version_number;
    }
    
    private function getphpcfg($varname) {
    	switch($result = get_cfg_var($varname)) {
    		case 0:
    			return '关闭';
    			break;
    		case 1:
    			return '打开';
    			break;
    		default:
    			return $result;
    			break;
	}
}
}
?>